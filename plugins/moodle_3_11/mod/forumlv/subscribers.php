<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file is used to display and organise forumlv subscribers
 *
 * @package   mod_forumlv
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../../config.php");
require_once("lib.php");

$id    = required_param('id',PARAM_INT);           // forumlv
$group = optional_param('group',0,PARAM_INT);      // change of group
$edit  = optional_param('edit',-1,PARAM_BOOL);     // Turn editing on and off

$url = new moodle_url('/mod/forumlv/subscribers.php', array('id'=>$id));
if ($group !== 0) {
    $url->param('group', $group);
}
if ($edit !== 0) {
    $url->param('edit', $edit);
}
$PAGE->set_url($url);

$forumlv = $DB->get_record('forumlv', array('id'=>$id), '*', MUST_EXIST);
$course = $DB->get_record('course', array('id'=>$forumlv->course), '*', MUST_EXIST);
if (! $cm = get_coursemodule_from_instance('forumlv', $forumlv->id, $course->id)) {
    $cm->id = 0;
}

require_login($course, false, $cm);

$context = context_module::instance($cm->id);
if (!has_capability('mod/forumlv:viewsubscribers', $context)) {
    print_error('nopermissiontosubscribe', 'forumlv');
}

unset($SESSION->fromdiscussion);

$params = array(
    'context' => $context,
    'other' => array('forumlvid' => $forumlv->id),
);
$event = \mod_forumlv\event\subscribers_viewed::create($params);
$event->trigger();

$forumlvoutput = $PAGE->get_renderer('mod_forumlv');
$currentgroup = groups_get_activity_group($cm);
$options = array('forumlvid'=>$forumlv->id, 'currentgroup'=>$currentgroup, 'context'=>$context);
$existingselector = new mod_forumlv_existing_subscriber_selector('existingsubscribers', $options);
$subscriberselector = new mod_forumlv_potential_subscriber_selector('potentialsubscribers', $options);
$subscriberselector->set_existing_subscribers($existingselector->find_users(''));

if (data_submitted()) {
    require_sesskey();
    $subscribe = (bool)optional_param('subscribe', false, PARAM_RAW);
    $unsubscribe = (bool)optional_param('unsubscribe', false, PARAM_RAW);
    /** It has to be one or the other, not both or neither */
    if (!($subscribe xor $unsubscribe)) {
        print_error('invalidaction');
    }
    if ($subscribe) {
        $users = $subscriberselector->get_selected_users();
        foreach ($users as $user) {
            if (!\mod_forumlv\subscriptions::subscribe_user($user->id, $forumlv)) {
                print_error('cannotaddsubscriber', 'forumlv', '', $user->id);
            }
        }
    } else if ($unsubscribe) {
        $users = $existingselector->get_selected_users();
        foreach ($users as $user) {
            if (!\mod_forumlv\subscriptions::unsubscribe_user($user->id, $forumlv)) {
                print_error('cannotremovesubscriber', 'forumlv', '', $user->id);
            }
        }
    }
    $subscriberselector->invalidate_selected_users();
    $existingselector->invalidate_selected_users();
    $subscriberselector->set_existing_subscribers($existingselector->find_users(''));
}

$strsubscribers = get_string("subscribers", "forumlv");
$PAGE->navbar->add($strsubscribers);
$PAGE->set_title($strsubscribers);
$PAGE->set_heading($COURSE->fullname);
if (has_capability('mod/forumlv:managesubscriptions', $context) && \mod_forumlv\subscriptions::is_forcesubscribed($forumlv) === false) {
    if ($edit != -1) {
        $USER->subscriptionsediting = $edit;
    }
    $PAGE->set_button(forumlv_update_subscriptions_button($course->id, $id));
} else {
    unset($USER->subscriptionsediting);
}
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('forumlv', 'forumlv').' '.$strsubscribers);
if (empty($USER->subscriptionsediting)) {
    $subscribers = \mod_forumlv\subscriptions::fetch_subscribed_users($forumlv, $currentgroup, $context);
    if (\mod_forumlv\subscriptions::is_forcesubscribed($forumlv)) {
        $subscribers = mod_forumlv_filter_hidden_users($cm, $context, $subscribers);
    }
    echo $forumlvoutput->subscriber_overview($subscribers, $forumlv, $course);
} else {
    echo $forumlvoutput->subscriber_selection_form($existingselector, $subscriberselector);
}
echo $OUTPUT->footer();

/**
 * Filters a list of users for whether they can see a given activity.
 * If the course module is hidden (closed-eye icon), then only users who have
 * the permission to view hidden activities will appear in the output list.
 *
 * @todo MDL-48625 This filtering should be handled in core libraries instead.
 *
 * @param stdClass $cm the course module record of the activity.
 * @param context_module $context the activity context, to save re-fetching it.
 * @param array $users the list of users to filter.
 * @return array the filtered list of users.
 */
function mod_forumlv_filter_hidden_users(stdClass $cm, context_module $context, array $users) {
    if ($cm->visible) {
        return $users;
    } else {
        // Filter for users that can view hidden activities.
        $filteredusers = array();
        $hiddenviewers = get_users_by_capability($context, 'moodle/course:viewhiddenactivities');
        foreach ($hiddenviewers as $hiddenviewer) {
            if (array_key_exists($hiddenviewer->id, $users)) {
                $filteredusers[$hiddenviewer->id] = $users[$hiddenviewer->id];
            }
        }
        return $filteredusers;
    }
}
