<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Ecuaciones</a>
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
	  		<th>Ecuación</th>
	  		<th>Eliminar</th>
	  	</tr>
	</thead>
	<tbody>
		<?php foreach ($equations as $value) {
			echo "<tr id='row_".$value['id_ecuacion']."'><td>".$value['id_ecuacion']."</td>
															   <td>".$value['formula_matematica']."</td><td><a href='javascript:void(0);' class='delete_ecuacion' id=".$value['id_ecuacion']."><i class='icon-trash'></i></a></td></tr>";
		}
		?>
	</tbody>
</table>