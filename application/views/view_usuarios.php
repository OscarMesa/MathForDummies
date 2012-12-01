<script type="text/javascript">
  cusuarios = new CollectionUsuarios;
</script>
<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Cursos</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a data-toggle="modal" id="nuevo_usuario" ><i class="icon-pencil"></i> Nuevo</a></li>
  </ul>
</div>
<div id="ContentListUser">
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
          echo "<script>
          cusuarios.add([{id_usuario:'".$value['id_usuario']."',nombre:'".$value['nombre'].
                                                "',apellido1:'".$value['apellido1']."',apellido2:'".$value['apellido2'].
                                                "',telefono:'".$value['telefono']."',celular:'".$value['celular'].
                                                "',correo:'".$value['correo']."',id_profesion:'".$value['id_profesion'].
                                                "',id_perfil:'".$value['id_perfil']."'}]);
         </script>";
    			echo "<tr id='row_".$value['id_usuario']."'><td>".$value['id_usuario']."</td><td>".$value['nombre']."</td><td>".$value['apellido1']."</td>
    														<td>".$value['apellido2']."</td><td>".$value['telefono']."</td><td>".$value['celular']."</td>
    														<td>".$value['correo']."</td><td>".$value['profesion_name']."</td><td>".$value['perfil_name']."</td><td><a href='javascript:void(0);' class='delete_curso' id=".$value['id_usuario']."><i class='icon-trash'></i></a></td></tr>";
    		}
    		?>
    	</tbody>
    </table>
</div>



    <div id="musuarios" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3>Nuevo usuario</h3>
    </div>
    <div class="modal-body">
    <div class="row-fluid">
        <form id="frm-newurse" style=" margin-left: 10em !important">
      <!--nombre usuario-->
      <div class="control-group">
          <label class="control-label" for="inputIcon">Nombre</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="text" id="NameUser" class="input-xlarge" name="NameUser" list="NameUser" placeholder="Nombres" required/>
      </div>

      <!--apellido usuario-->
      <div class="control-group">
          <label class="control-label" for="inputIcon">Apellido 1</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="text" id="LastName1" class="input-xlarge" name="LastName1" list="LastName1" placeholder="Apellido 1" required="required" />
      </div>

      <!--apellido 2 usuario-->
      <div class="control-group">
          <label class="control-label" for="inputIcon">Apellido 2</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="text" id="LastName2" class="input-xlarge" name="LastName2" list="LastName1" placeholder="Apellido 2" />
      </div>

      <!--Telefono de usuario -->
      <div class="control-group">
          <label class="control-label" for="inputIcon">Teléfono</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="number" class="input-xlarge" id="TephoneUser" name="TephoneUser" list="TephoneUser" placeholder="Teléfono"  min="7" required="required"/>
        </div>

        <!--Celular de usuario -->
        <div class="control-group">
          <label class="control-label" for="inputIcon">Celular</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="number" class="input-xlarge" id="CellUser" name="CellUser" list="CellUser" placeholder="Celular"  min="10" required/>
        </div>

        <!--Correo de usuario -->
        <div class="control-group">
          <label class="control-label" for="inputIcon">Correo</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="email" class="input-xlarge" id="EmailUser" name="EmailUser" list="EmailUser" placeholder="Correo" required="required"/>
        </div>

         <!--Profesion-->
        <div class="control-group">
          <label class="control-label" for="inputIcon">Profesión</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="text" id="Profetion" class="input-xlarge" name="Profetion" list="Profetion" placeholder="Profesión" required="required" />
        </div>

        <!--Profile-->
        <div class="control-group">
          <label class="control-label" for="inputIcon">Perfil</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="text" id="Profile" class="input-xlarge" name="Profile" list="Profile" placeholder="Perfil" required="required" />
        </div>

        <!--Contraseña-->
        <div class="control-group">
          <label class="control-label" for="inputIcon">Contraseña</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="password" id="password" class="input-xlarge" name="password" list="password" placeholder="Confirmar contraseña" required="required" />
        </div>

        <!--Confirmar Contraseña-->
        <div class="control-group">
          <label class="control-label" for="inputIcon">Confirmar contraseña</label>
              <span class="add-on"><i class="icon-pencil"></i></span>
              <input type="password" id="cpassword" class="input-xlarge" name="cpassword" list="cpassword" placeholder="Contraseña" required="required" />
        </div>        
        <input type="submit" id="btn-validateuser" style="display:none"/>
         <!--Fin Tipo de usuario -->
    </form>
    </div>
    </div>
      <div class="modal-footer">
         <a href="#" id="btn-saveuser" class="btn btn-success">Guardar</a>
         <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
    </div>
  </div>
<script type="text/javascript">

auto = $("#Profetion").kendoAutoComplete({
    minLength: 3,
    dataTextField: "nombre",
    dataValueField: "id",
  template:       '<article class="auto-TypeCurce" id="${ data.id }">${ data.nombre }</article>',
  select: function(e) {
      var DataItem = this.dataItem(e.item.index());
      Usuarios.set({id_profesion:DataItem.id});
  },
    dataSource: {
        serverPaging: true,
        pageSize: 10,
        //Limits result set
        transport: {
            read: {
                url: base_url + "professions/LoadAutoComplete",
                dataType: "json",
                type: "POST"
            },
            parameterMap: function(options) {
              console.log(options);
                return $.extend(options, {
                    
                });
            }
        }
    }
});

auto1 = $("#Profile").kendoAutoComplete({
    minLength: 3,
    dataTextField: "nombre",
    dataValueField: "id",
  template:       '<article class="auto-TypeCurce" id="${ data.id }">${ data.nombre }</article>',
  select: function(e) {
      var DataItem = this.dataItem(e.item.index());
      Usuarios.set({id_perfil:DataItem.id});
  },
    dataSource: {
        serverPaging: true,
        pageSize: 10,
        //Limits result set
        transport: {
            read: {
                url: base_url + "perfil/LoadAutoComplete",
                dataType: "json",
                type: "POST"
            },
            parameterMap: function(options) {
              console.log(options);
                return $.extend(options, {
                    
                });
            }
        }
    }
});

</script>

<div id="message-delte-user" class="modal hide fade" style="display: none;" >
    <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="message-label-delete">Eliminar Usuario</h3>
     </div>
      <div class="modal-body">
        <p>¿Realmente desea eliminar este usuario?</p>
      </div>
      <div class="modal-footer">
        <a href="#" id="btn-deletecurse" class="btn btn-success">Aceptar</a>
         <a href="#" data-dismiss="modal" class="btn">Cancelar</a>
      </div>
</div>