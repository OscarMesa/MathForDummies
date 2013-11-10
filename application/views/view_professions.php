<script type="text/javascript">
  cusuarios = new CollectionUsuarios;
  MCRUD = new CRUD;
  MCRUD.set({controller:'Professions'});
  MCRUD.set({search:{'fieldsearch':'input-search-profession','button-search':'serach-profesion','area':'ContentList','method':'SearchProfession'}});
</script>
<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Profesiones</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#" id="nuevo_curso"><i class="icon-pencil"></i> Nuevo</a></li>
  </ul>
</div>
<form class="form-search frm-search-math" id="frm-search-profesiones">
  <div class="input-append">
    <input type="text" class="span2 search-query" id="input-search-profession" placeholder="Buscar profesón">
    <button type="submit" id="serach-profesion" class="btn" title="Filtre por cualquier campo">Buscar</button>
  </div>
</form>
<div id="ContentList">
	<table class="table table-hover">
		<thead> 
		  	<tr>
		  		<th>#</th>
		  		<th>Descripción</th>
		  		<th>Eliminar</th>
		  		<th>Editar</th>
		  	</tr>
		</thead>
		<tbody>
			<?php foreach ($profession as $value) {
				echo "<tr id='row_".$value['id_profesion']."'><td>".$value['id_profesion']."</td><td>".$value['descripcion']."</td><td><a href='javascript:void(0);' class='delete_profession' id=".$value['id_profesion']."><i class='icon-trash'></i></a></td>
																								 									<td><a href='javascript:void(0);' class='edit_profession' id=".$value['id_profesion']."><i class='icon-edit'></i></a></td></tr>";
			}
			?>
		</tbody>
	</table>
</div>