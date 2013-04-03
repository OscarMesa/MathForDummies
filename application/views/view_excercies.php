<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Usuarios</a>
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
	  		<th>Ejercicio</th>
	  		<th>Solución</th>
	  		<th>Dificultad</th>
	  		<th>Valoración</th>
	  		<th>Ecuaciones</th>
	  		<th>Eliminar</th>
	  	</tr>
	</thead>
	<tbody>
		<?php foreach ($excercices as $key=>$value) {
			echo "<tr id='row_".$value['id_ejercicio']."'><td>".$value['id_ejercicio']."</td><td>".$value['ejercicio']."</td><td>".$value['solucion']."</td><td>".$value['dificultada']."</td><<td>".$value['valoracion_porcentaje']."</td>
														  <td><a href='javascript:void(0);' class='view_equations' id=".$value['id_ejercicio']."><i class='icon-zoom-in'></i></a></td>
														  <td><a href='javascript:void(0);' class='delete_curso' id=".$value['id_ejercicio']."><i class='icon-trash'></i></a></td></tr>";
		}
		?>
	</tbody>
</table>