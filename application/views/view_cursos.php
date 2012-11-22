<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Usuarios</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a data-toggle="modal" href="#mcurces" id="nuevo_curso"><i class="icon-pencil"></i> Nuevo</a></li>
    <li><a href="#"><i class="icon-search"></i> Buscar</a></li>
  </ul>
</div>

<table class="table table-hover">
	<thead> 
	  	<tr>
	  		<th>#</th>
	  		<th>Docente</th>
	  		<th>Nombre</th>
	  		<th>Eliminar</th>
	  	</tr>
	</thead>
	<tbody>
		<?php foreach ($cursos as $key=>$value) {
			echo "<tr id='row_".$value['id']."'><td>".$value['id']."</td><td>".$value['docente']."</td><td>".$value['curso']."</td><td><a href='javascript:void(0);' class='delete_curso' id=".$value['id']."><i class='icon-trash'></i></a></td></tr>";
		}
		?>
	</tbody>
</table>
<div id="mcurces" class="modal hide fade in" style="display: none;" data-toggle="modal" data-target="#mcurces">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h3>Nuevo Curso</h3>
     </div>
     <form id="frm-newcurse">
        <div class="modal-body">

  

             <!--Docenete-->
          <div class="control-group">
              <label class="control-label" for="inputIcon">Docente</label>
                  <span class="add-on"><i class="icon-pencil"></i></span>
                  <input type="text" id="Techer" class="input-xlarge" name="Thachers" list="Thachers" placeholder="Docente" required="required" />
          </div>

          <!--Fin de docente-->


        <!--Tipo de usuario -->
            <div class="control-group">
              <label class="control-label" for="inputIcon">Tipo de Curso</label>
                  <span class="add-on"><i class="icon-pencil"></i></span>
                  <input type="text" class="input-xlarge" id="TypeCurcesLoad" name="TypeCurces" list="TypeCurces" placeholder="Tipo del curso" required="required"/>
            </div>
            <input type="submit" id="btn-validatecurse" style="display:none"/>
             <!--Fin Tipo de usuario -->

        </div>
    </form>
    <div class="modal-footer">
        <a href="index.html" id="btn-savecurse" class="btn btn-success">Guardar</a>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
    </div>
</div>

<script type="text/javascript">
 auto = $("#TypeCurcesLoad").kendoAutoComplete({
    minLength: 3,
    dataTextField: "nombre",
    dataValueField: "Id",
  template:       '<article class="auto-TypeCurce" id="${ data.Id }">${ data.nombre }</article>',
  select: function(e) {
      var DataItem = this.dataItem(e.item.index());
      Curses['id_typecurse'] = DataItem.Id;
  },
    dataSource: {
        serverPaging: true,
        pageSize: 10,
        //Limits result set
        transport: {
            read: {
                url: server + "MathForDummiesModel/MethodAutocomplete.php?method=AllCurses",
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

 autoM = $("#Techer").kendoAutoComplete({
    minLength: 3,
    dataTextField: "nombre",
    dataValueField: "Id",
  template:       '<article class="auto-TypeCurce" id="${ data.Id }">${ data.nombre } &nbsp;${ data.apellido1 } &nbsp;${ data.apellido2 } </article>',
  select: function(e) {
      var DataItem = this.dataItem(e.item.index());
      Curses['id_teacher'] = DataItem.Id;
  },
    dataSource: {
        serverPaging: true,
        pageSize: 10,
        transport: {
            read: {
                url: server + "MathForDummiesModel/MethodAutocomplete.php?method=AllTechers",
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
