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
	  		<th>Apellido 1</th>
	  		<th>Apellido 2</th>
	  		<th>Teléfono</th>
	  		<th>Celular</th>
	  		<th>Correo</th>
	  		<th>Profesión</th>
	  		<th>Perfil</th>
	  	</tr>
	</thead>
	<tbody>
		<?php 
		print_r($users);
		?>
	</tbody>
</table>