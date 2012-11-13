<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Profesiones</a>
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
	  		<th>Descripción</th>
	  	</tr>
	</thead>
	<tbody>
		<?php foreach ($profession as $value) {
			echo "<tr id='row_".$value['id_profesion']."'><td>".$value['id_profesion']."</td><td>".$value['descripcion']."</td><td><a href='javascript:void(0);' class='delete_profession' id=".$value['id_profesion']."><i class='icon-trash'></i></a></td></tr>";
		}
		?>
	</tbody>
</table>