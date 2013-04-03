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
<?php if($table == 'usuarios'):?>
	<script type="text/javascript">
 		cusuarios = new CollectionUsuarios;
 	</script>
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
            <th>Eliminar</th>
            <th>Editar</th> 
    	  	</tr>
    	</thead>
    	<tbody>
    		<?php foreach ($users as $key=>$value) {
          echo "<script>
          cusuarios.add([{id_usuario:'".$value['id_usuario']."',nombre:'".$value['nombre'].
                                                "',apellido1:'".$value['apellido1']."',apellido2:'".$value['apellido2'].
                                                "',telefono:'".$value['telefono']."',celular:'".$value['celular'].
                                                "',correo:'".$value['correo']."',id_profesion:'".$value['id_profesion'].
                                                "',id_perfil:'".$value['id_perfil']."',name_profesion:'".$value['profesion_name'].
                                                "',name_perfil:'".$value['perfil_name']."'}]);
         </script>";
    			echo "<tr id='row_".$value['id_usuario']."'><td>".$value['id_usuario']."</td><td>".$value['nombre']."</td><td>".$value['apellido1']."</td>
    														<td>".$value['apellido2']."</td><td>".$value['telefono']."</td><td>".$value['celular']."</td>
    														<td>".$value['correo']."</td><td>".$value['profesion_name']."</td><td>".$value['perfil_name']."</td><td><a href='javascript:void(0);' class='delete_user' id=".$value['id_usuario']."><i class='icon-trash'></i></a></td>
                                                                                                                                    <td><a href='javascript:void(0);' class='edit_user' id=".$value['id_usuario']."><i class='icon-edit'></i></a></td></tr>";
    		}
    		?>
    	</tbody>
    </table>
<?php endif; ?>
<?php if($table == 'profesiones'):?>
    <script type="text/javascript">
        cusuarios = new CollectionUsuarios;
    </script>
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
            <th>Eliminar</th>
            <th>Editar</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key=>$value) {
          echo "<script>
          cusuarios.add([{id_usuario:'".$value['id_usuario']."',nombre:'".$value['nombre'].
                                                "',apellido1:'".$value['apellido1']."',apellido2:'".$value['apellido2'].
                                                "',telefono:'".$value['telefono']."',celular:'".$value['celular'].
                                                "',correo:'".$value['correo']."',id_profesion:'".$value['id_profesion'].
                                                "',id_perfil:'".$value['id_perfil']."',name_profesion:'".$value['profesion_name'].
                                                "',name_perfil:'".$value['perfil_name']."'}]);
         </script>";
                echo "<tr id='row_".$value['id_usuario']."'><td>".$value['id_usuario']."</td><td>".$value['nombre']."</td><td>".$value['apellido1']."</td>
                                                            <td>".$value['apellido2']."</td><td>".$value['telefono']."</td><td>".$value['celular']."</td>
                                                            <td>".$value['correo']."</td><td>".$value['profesion_name']."</td><td>".$value['perfil_name']."</td><td><a href='javascript:void(0);' class='delete_user' id=".$value['id_usuario']."><i class='icon-trash'></i></a></td>
                                                                                                                                    <td><a href='javascript:void(0);' class='edit_user' id=".$value['id_usuario']."><i class='icon-edit'></i></a></td></tr>";
            }
            ?>
        </tbody>
    </table>    
<?php endif; ?>