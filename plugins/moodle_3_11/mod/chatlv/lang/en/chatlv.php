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
 * Strings for component 'chatlv', language 'pt_br', branch 'MOODLE_34_STABLE'
 *
 * @package   chatlv
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Você tem sessões de chatlv se aproximando';
$string['ajax'] = 'Versão usando Ajax';
$string['autoscroll'] = 'Rolagem automática';
$string['beep'] = 'Bip';
$string['bubble'] = 'Bolha';
$string['cantlogin'] = 'Não foi possível logar na sala de chatlv!!';
$string['chatlv:addinstance'] = 'Adicionar novo chatlv';
$string['chatlv:chatlv'] = 'Acessar o chatlv';
$string['chatlv:deletelog'] = 'Excluir logs do chatlv';
$string['chatlv:exportparticipatedsession'] = 'Exportar sessão de chatlv em que você tenha participado';
$string['chatlv:exportsession'] = 'Exportar qualquer sessão de chatlv';
$string['chatlvintro'] = 'Descrição';
$string['chatlvname'] = 'Nome desta sala';
$string['chatlv:readlog'] = 'Ver logs do chatlv';
$string['chatlvreport'] = 'Sessões de chatlv';
$string['chatlv:talk'] = 'Bater papo no chatlv';
$string['chatlvtime'] = 'Data do próximo chatlv';
$string['chatlv:view'] = 'Ver atividade chatlv';
$string['compact'] = 'Compacto';
$string['composemessage'] = 'Compor uma mensagem';
$string['configmethod'] = 'O método de chatlv ajax fornece uma interface de chatlv baseada em Ajax, que contata o servidor regularmente para atualização. O método de chatlv normal envolve os clientes em contato constante com o servidor para atualizações. Este não requer configuração e funciona em todos os lugares, mas pode criar uma grande carga sobre o servidor com muitos usuários. Utilizar um servidor daemon requer um acesso shell no Unix, mas resulta em um ambiente de chatlv rápido e escalável.';
$string['confignormalupdatemode'] = 'Normalmente a atualização das salas de chatlv são eficientes quando se utiliza <em>Keep-Alive</em> em HTTP 1.1 mas isto não reduz a sobrecarga do servidor. O melhor método consiste no uso da estratégia <em>Stream</em> para comunicar as atualizações aos usuários. Este método oferece maior escalabilidade, como o método chatlvd, mas não é compatível com alguns tipos de servidor.';
$string['configoldping'] = 'Depois de quanto tempo de silêncio do usuário temos que considerar que abandonou a sala (em segundos)?';
$string['configrefreshroom'] = 'Qual é o intervalo de atualização da sala do chatlv (em segundos)? Um intervalo breve faz com que a chatlv pareça mais veloz mas isto pode aumentar muito a carga de trabalho do servidor quando muitas pessoas estiverem participando. Se você estiver usando atualizações <em>Stream</em>, você pode aumentar a freqüência de atualização escolhendo, por exemplo, o valor 2.';
$string['configrefreshuserlist'] = 'De quanto em quanto tempo a lista dos usuários tem que ser atualizada (em segundos)?';
$string['configserverhost'] = 'O hostname do computador que hospeda o servidor daemon';
$string['configserverip'] = 'O endereço IP correspondente ao hostname acima';
$string['configservermax'] = 'Número máximo de clientes permitido';
$string['configserverport'] = 'Porta do servidor a ser usada pelo daemon';
$string['coursetheme'] = 'Tema do curso';
$string['currentchatlvs'] = 'Sessões de chatlv ativas';
$string['currentusers'] = 'Usuários atuais';
$string['deletesession'] = 'Excluir esta sessão';
$string['deletesessionsure'] = 'Confirmar a exclusão desta sessão?';
$string['donotusechatlvtime'] = 'Não publicar os horários dos chatlvs';
$string['enterchatlv'] = 'Clique aqui para entrar no chatlv agora';
$string['entermessage'] = 'Digite sua mensagem';
$string['errornousers'] = 'Não foi encontrado nenhum usuário!';
$string['eventmessagesent'] = 'Mensagem enviada';
$string['eventsessionsviewed'] = 'Sessões visualizadas';
$string['explaingeneralconfig'] = 'Estas configurações estão sempre ativas';
$string['explainmethoddaemon'] = 'Estas configurações são importantes apenas se você selecionou o método "server daemon"';
$string['explainmethodnormal'] = 'Estas configurações são importantes apenas se você selecionou o método "normal"';
$string['generalconfig'] = 'Configuração geral';
$string['idle'] = 'Idle';
$string['indicator:cognitivedepth'] = 'Indicador cognitivo do chatlv';
$string['indicator:cognitivedepth_help'] = 'Este indicador baseia-se na profundidade cognitiva alcançada pelo estudante em uma atividade chatlv.';
$string['indicator:socialbreadth'] = 'Indicador social do chatlv';
$string['indicator:socialbreadth_help'] = 'Este indicador baseia-se na amplitude social alcançada pelo estudante em uma atividade chatlv.';
$string['inputarea'] = 'Área de entrada de dados';
$string['invalidid'] = 'Sala de chatlv não foi encontrada!';
$string['list_all_sessions'] = 'Mostrar todas as sessões.';
$string['list_complete_sessions'] = 'Mostrar apenas sessões completas.';
$string['listing_all_sessions'] = 'Mostrando todas as sessões.';
$string['messagebeepseveryone'] = '{$a}';
$string['messagebeepsyou'] = '{$a} está bipando você!';
$string['messageenter'] = '{$a} entrou no chatlv';
$string['messageexit'] = '{$a} abandonou este chatlv';
$string['messages'] = 'Mensagens';
$string['messageyoubeep'] = 'Você chamou {$a}';
$string['method'] = 'Método do chatlv';
$string['methodajax'] = 'Método ajax';
$string['methoddaemon'] = 'Servidor chatlv daemon';
$string['methodnormal'] = 'Método normal';
$string['modulename'] = 'chatlv';
$string['modulename_help'] = 'O módulo de atividade chatlv permite que os participantes possam conversar em tempo real.

A conversa pode ser uma atividade de uma só vez ou pode ser repetida na mesma hora todos os dias ou todas as semanas. Sessões de chatlv são salvas e podem ser disponibilizadas para que todos possam visualizar ou restritas a usuários com a capacidade de visualizar os logs de sessão do chatlv.

chatlvs são especialmente úteis quando um grupo de bate-papo não é capaz de se encontrar cara-a-cara, como:

* Reuniões regulares dos estudantes participantes de cursos online para que possam compartilhar experiências com outros no mesmo curso, mas em um local diferente
* Um estudante temporariamente impossibilitado de comparecer pessoalmente conversar com seu professor para acompanhar o trabalho
* Estudantes na experiência de trabalho se reúnem para discutir suas experiências entre si e com seu professor
* Crianças mais jovens que usam chatlv em casa à noite como uma introdução controlada (monitorada) para o mundo das redes sociais
* A sessão de perguntas e respostas com um orador convidado em um local diferente
* Sessões para ajudar os estudantes a se prepararem para testes em que o professor ou outros estudantes, colocariam exemplos de perguntas';
$string['modulename_link'] = 'mod/chatlv/view';
$string['modulenameplural'] = 'chatlvs';
$string['neverdeletemessages'] = 'Nunca excluir as mensagens';
$string['nextsession'] = 'Próxima sessão programada';
$string['nochatlv'] = 'Nenhum chatlv encontrado';
$string['no_complete_sessions_found'] = 'Nenhuma sessão completa encontrada.';
$string['noguests'] = 'O chatlv não pode ser acessado por visitantes';
$string['nomessages'] = 'Nenhuma mensagem ainda';
$string['nopermissiontoseethechatlvlog'] = 'Você não tem permissão para ver os logs do chatlv.';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'Nenhuma sessão planejada';
$string['notallowenter'] = 'Você não tem permissão para entrar nesta sala.';
$string['notlogged'] = 'Você não está autenticado!';
$string['oldping'] = 'Tempo para disconecção';
$string['page-mod-chatlv-x'] = 'Qualquer página de chatlv';
$string['pastchatlvs'] = 'Sessões encerradas';
$string['pluginadministration'] = 'Administração do chatlv';
$string['pluginname'] = 'chatlv';
$string['refreshroom'] = 'Recarregar o texto';
$string['refreshuserlist'] = 'Recarregar a lista de usuários';
$string['removemessages'] = 'Remover todas as mensagens';
$string['repeatdaily'] = 'Na mesma hora todos os dias';
$string['repeatnone'] = 'Não repetir - publicar apenas o horário especifico';
$string['repeattimes'] = 'Repetir sessões';
$string['repeatweekly'] = 'No mesmo horário cada semana';
$string['saidto'] = 'disse para';
$string['savemessages'] = 'Salvar as sessões encerradas';
$string['search:activity'] = 'chatlv - informações da atividade';
$string['seesession'] = 'Ver esta sessão';
$string['send'] = 'Enviar';
$string['sending'] = 'Enviando';
$string['serverhost'] = 'Nome do servidor';
$string['serverip'] = 'IP do servidor';
$string['servermax'] = 'Máximo de usuários';
$string['serverport'] = 'Porta do Servidor';
$string['sessions'] = 'Sessões de chatlv';
$string['sessionstart'] = 'A próxima sessão de chatlv irá começar em {$a->date}, ({$a->fromnow} a partir de agora)';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Todos podem ver as sessões encerradas';
$string['studentseereports_help'] = 'Se for definido como não, somente os usuários que possuirem a permissão mod/chatlv:readlog serão capazes de ver as logs de chatlvs
';
$string['talk'] = 'Falar';
$string['updatemethod'] = 'Método de atualização';
$string['updaterate'] = 'porcentagem de atualização:';
$string['userlist'] = 'Lista de usuários';
$string['usingchatlv'] = 'Usando chatlv';
$string['usingchatlv_help'] = 'O módulo chatlv tem alguma funcionalidades que tornam o bate-papo um pouco mais agradável.

*Carinhas - Todas as carinhas (emoticons) que você usa nos editores de texto podem ser utilizadas no chatlv. Por exemplo  :-)
* Links - Endereços web são automaticamente transformados em links
* Emoções - Você pode iniciar uma frase com  "/me" or ":" para representar emoções.  Por exemplo, se o seu nome é Kim e você digita  ":laughs!" or "/me laughs!" todos vão ler "Kim laughs!"
* Bips - Você pode tocar um som para outras pessoas clicando o link  "beep" ao lado do nome delas.  Escrevendo "beep all", todas as pessoas vão ouvir o bip.
* HTML - Você pode usar código html para inserir imagens no texto do chatlv e mudar a cor e o tamanho das letras.';
$string['viewreport'] = 'Ver sessões encerradas';
