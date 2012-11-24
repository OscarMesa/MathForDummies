<?php if($table == 'cursos'):?>
	<script type="text/javascript">
  		ccurses = new CollectionCurces();
	</script>
	<table class="table table-hover" id="tbl-curses">
		<thead> 
			<tr>
		  		<th>#</th>
		  		<th>Docente</th>
		  		<th>Nombre</th>
		  		<th>Eliminar</th>
	        <th>Editar</th>
		  	</tr>
		</thead>
		<tbody>
			<?php foreach ($cursos as $value) {    
	      echo "<script>
	        ccurses.add([{Id:'".$value['id']."',id_type:'".$value['id_tipo_curso'].
	                                              "',name_type:'".$value['curso']."',id_tacher:'".$value['id_docente'].
	                                              "',name_tache:'".$value['docente']."'}]);
	      </script>";
				echo "<tr id='row_".$value['id']."'><td>".$value['id']."</td><td>".$value['docente']."</td><td>".$value['curso']."</td><td><a href='javascript:void(0);' class='delete_curso' id=".$value['id']."><i class='icon-trash'></i></a></td>   <td><a href='javascript:void(0);' class='edit_curso' id=".$value['id']."><i class='icon-edit'></i></a></td>  </tr>";
			}
			?>
		</tbody>
	</table>
<?php endif; ?>