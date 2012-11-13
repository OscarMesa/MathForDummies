<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Cursos</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#" id="nuevo_usuario"><i class="icon-pencil"></i> Nuevo</a></li>
    <li><a href="#"><i class="icon-search"></i> Buscar</a></li>
  </ul>
</div>

<table class="table table-hover">
	<thead> 
	  	<tr>
	  		<th>#</th>
	  		<th>Nombres</th>
	  		<th>Apellido1</th>
	  		<th>Apellido2</th>
	  		<th>Teléfono</th>
	  		<th>Celular</th>
	  		<th>Correo</th>
	  		<th>Profesión</th>
	  		<th>Perfil</th>
	  	</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key=>$value) {
			echo "<tr id='row_".$value['id_usuario']."'><td>".$value['id_usuario']."</td><td>".$value['nombre']."</td><td>".$value['apellido1']."</td>
														<td>".$value['apellido2']."</td><td>".$value['telefono']."</td><td>".$value['celular']."</td>
														<td>".$value['correo']."</td><td>".$value['profesion_name']."</td><td>".$value['perfil_name']."</td><td><a href='javascript:void(0);' class='delete_curso' id=".$value['id_usuario']."><i class='icon-trash'></i></a></td></tr>";
		}
		?>
	</tbody>
</table>