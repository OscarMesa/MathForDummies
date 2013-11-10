<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Cursos</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#" id="nuevo_curso"><i class="icon-pencil"></i> Nuevo</a></li>
    <li><a href="#"><i class="icon-search"></i> Buscar</a></li>
  </ul>
</div>

<table class="table table-hover">
	<thead> 
	  	<tr>
	  		<th>#</th>
	  		<th>Nombre</th>
	  		<th>Descripción</th>
	  		<th>Eliminar</th>
	  	</tr>
	</thead>
	<tbody>
		<?php foreach ($cursos as $key=>$value) {
			echo "<tr id='row_".$value['id']."'><td>".$value['id']."</td><td>".$value['nombre']."</td><td>".$value['descripcion']."</td><td><a href='javascript:void(0);' class='delete_curso' id=".$value['id']."><i class='icon-trash'></i></a></td></tr>";
		}
		?>
	</tbody>
</table>