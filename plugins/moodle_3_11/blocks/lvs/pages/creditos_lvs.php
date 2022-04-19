<?php
include_once('../../../config.php');

$course_id = optional_param('curso', 0, PARAM_INT);

if(!$course = $DB->get_record('course', array('id'=>$course_id))) {
	print_error("Invalid course id");
}

require_login($course);

$creditosLV = get_string('creditos', 'block_lvs');

$PAGE->set_course($course);
$PAGE->set_url("/blocks/lvs/pages/creditos_lvs.php?curso=$course->id");
$PAGE->set_title(format_string($course->fullname . ' : ' . $creditosLV));
$PAGE->set_heading($course->fullname . ' : ' . $creditosLV);

$PAGE->navbar->add($creditosLV);

$idealizacaoModelagem = "
    <table>
	    <tr>
		    <td>Gilvandenys Leite Sales</td>
			<td>
			    <a target='blank' href='http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4133871J0'>
				    Lattes
				</a>
			</td>
			<td>
			    <a target='blank' href='https://orcid.org/0000-0002-6060-2535'>
				    Orcid
				</a>
			</td>
			<td>
			    <a target='blank' href='http://professordenyssales.blogspot.com.br/'>
				    Projeto
				</a>
			</td>
			<td>
			    Contato: denyssales@ifce.edu.br
			</td>
		</tr>
	    <tr>
		    <td>Giovanni Cordeiro Barroso</td>
			<td>
				<a target='blank' href='#'>
					Lattes
				</a>
			</td>
			<td>
				<a target='blank' href='#'>
					Orcid
				</a>
			</td>
			<td>
				<a target='blank' href='#'>
					Projeto
				</a>
			</td>
			<td>
				Contato: gcb@fisica.ufc.br
			</td>
		</tr>
	    <tr>
		    <td>Jos&eacute; Marques Soares</td>
			<td>
				<a target='blank' href='#'>
					Lattes
				</a>
			</td>
			<td>
				<a target='blank' href='#'>
					Orcid
				</a>
			</td>
			<td>
				<a target='blank' href='#'>
					Projeto
				</a>
			</td>
			<td>
				Contato: marques@ufc.br
			</td>
		</tr>
	</table>
";

$desenvolvedores = "
<table>
	<tr>
		<td>Allyson Bonetti Fran&ccedil;a</td>
		<td>
			Contato: - allysonbonetti@gmail.com
		</td>
	</tr>
	<tr>
		<td>Antonio Rodrigo dos Santos Silva</td>
		<td>
			Contato: - antonio.silva@ifce.edu.br
		</td>
	</tr>
	<tr>
		<td>Carlos Mauricio J. M. Dourado Junior</td>
		<td>
			Contato: - mauriciodourado@ifce.edu.br
		</td>
	</tr>
	<tr>
		<td>Manoel Fiuza Lima Junior</td>
		<td>
			Contato: -
		</td>
	</tr>
	<tr>
		<td>Ricky Paz Persivo Cunha</td>
		<td>
			Contato: - rickypaz@gmail.com
		</td>
	</tr>
</table>
";
		

$designGrafico = "
<table>
	<tr>
		<td>David Jucimon</td>
		<td>
			Contato: jucimon@gmail.com
		</td>
	</tr>
	<tr>
		<td>Luana Cavalcante Crisóstomo</td>
		<td></td>
	</tr>
</table>
";
	

$instituicoesEnvolvidas = "
<table>
	<tr>
		<td>Universidade Federal do Cear&aacute</td>
		<td><a href='http://www.uece.br/'>http://www.uece.br/</a></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Instituto Federal de Educa&ccedil;&atilde;o, Ci&ecirc;ncia e Tecnologia do Cear&aacute;</td>
		<td><a href='http://www.ifce.edu.br'>http://www.ifce.edu.br/</a></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
";

$observacao = "
Este trabalho &eacute; o produto da tese de doutorado do professor:<br/>
Dr. Gilvandenys Leite Sales<br/>
Desenvolvida no Departamento de Engenharia de Teleinform&aacute;tica da Universidade Federal do Cear&aacute;.<br/>
Coordenado pelo Instituto Federal de Educação, Ciência e Tecnologia do Ceará (IFCE).<br/>
Subsidiado por bolsas do MEC/SETEC e CAPES.";

$table = new html_table();

$table->head = array("&nbsp;", '');
$table->align = array('right','left');

$table->data[] = array('<b>Idealiza&ccedil;&atilde;o e modelagem:</b> ', $idealizacaoModelagem);
$table->data[] = array('<b>Design Gr&aacute;fico:</b> ', $designGrafico);
$table->data[] = array('<b>Desenvolvimento:</b> ', $desenvolvedores);
$table->data[] = array('<b>Institui&ccedil;&otilde;es envolvidas:</b> ', $instituicoesEnvolvidas);
$table->data[] = array('<b>Observa&ccedil;&atilde;o:</b> ', $observacao);

echo $OUTPUT->header();
echo html_writer::table($table);
echo '<br/><hr><br/>';
echo $OUTPUT->footer();