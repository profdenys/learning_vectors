var $jq = jQuery.noConflict();

function checkval() {
    1 == $jq("tbody tr:visible").length && "No result found" == $jq("tbody tr:visible td").html() ? $jq("#rowcount").html("0") : $jq("#rowcount").html($jq("tr:visible").length - 1)
}
$jq(document).ready(function () {
    $jq("#rowcount").html($jq(".filterable tr").length - 1), $jq(".filterable .btn-filter").click(function () {
        var t = $jq(this).parents(".filterable"),
            e = t.find(".filters input"),
            l = t.find(".table tbody");
        1 == e.prop("disabled") ? (e.prop("disabled", !1), e.first().focus()) : (e.val("").prop("disabled", !0), l.find(".no-result").remove(), l.find("tr").show()), $jq("#rowcount").html($jq(".filterable tr").length - 1)
    }), $jq(".filterable .filters input").keyup(function (t) {
        if ("9" != (t.keyCode || t.which)) {
            var e = $jq(this),
                l = e.val().toLowerCase(),
                n = e.parents(".filterable"),
                i = n.find(".filters th").index(e.parents("th")),
                r = n.find(".table"),
                o = r.find("tbody tr"),
                d = o.filter(function () {
                    return -1 === $jq(this).find("td").eq(i).text().toLowerCase().indexOf(l)
                });
            r.find("tbody .no-result").remove(), o.show(), d.hide(), d.length === o.length && r.find("tbody").prepend($jq('<tr class="no-result text-center"><td colspan="' + r.find(".filters th").length + '">No result found</td></tr>'))
        }
        $jq("#rowcount").html($jq("tr:visible").length - 1), checkval()
    })
});