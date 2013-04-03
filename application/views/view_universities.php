<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Universidades</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#" id="nuevo_universidad"><i class="icon-pencil"></i> Nuevo</a></li>
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
		<?php foreach ($universities as $value) {
			echo "<tr id='row_".$value['id_universidad']."'><td>".$value['id_universidad']."</td><td>".$value['nombre_universidad']."</td><td><a href='javascript:void(0);' class='delete_profession' id=".$value['id_universidad']."><i class='icon-trash'></i></a></td></tr>";
		}
		?>
	</tbody>
</table>