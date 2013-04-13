<form><fieldset style="border-color:#333333"><legend><h1>Cursos del docente</h1></legend></fieldset></form>

<ul class="nav nav-pills nav-stacked">
	<?php
		$i = 0;
		foreach ($cursos as $row) {
			echo "<li class='".(($i++)==0?"active":'')."'><a class='slt-curso' href='javascript:void(0)' id_curso='".$row['id']."' id_tp_curso='".$row['id_tipo_curso']."'>".$row['nombre_curso']."</a></li>";
		}
	?>
</ul>