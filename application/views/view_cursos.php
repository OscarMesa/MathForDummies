<script type="text/javascript">
 var swTecher = false;
 var TypeCurcesLoad = false;
  ccurses = new CollectionCurces();
 $('#btn-savecurse').click(SaveCurse);
 $('#Techer').focusout(function(){
    if($('#Techer').val()=='' || mode_save_to_update == 'edit' || !SWindowModal)return;if(Curses['id_teacher'] == undefined)OpenMessagesErrorModal('Error','Este docente no existe.');});
 $('#TypeCurcesLoad').focusout(function(){if($('#TypeCurcesLoad').val()=='' || !SWindowModal)return;console.log(Curses);if(Curses['id_typecurse'] == undefined)OpenMessagesErrorModal('Error','Este curso no existe.');});
 $('#serach-curse').click(SearchFilterCurse);
</script>
<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Usuarios</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a data-toggle="modal" href="#mcurces" id="nuevo_curso"><i class="icon-pencil"></i> Nuevo</a></li>
  </ul>
</div>


<form class="form-search frm-search-math" id="frm-search-curse">
  <div class="input-append">
    <input type="text" class="span2 search-query" id="input-search-curse" placeholder="Buscar curso">
    <button type="submit" id="serach-curse" class="btn">Buscar</button>
  </div>
</form>
<article id="sec-table-search">
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
</article>
               

<div id="mcurces" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        <a href="#" id="btn-savecurse" class="btn btn-success">Guardar</a>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
    </div>
</div>

<div id="message-delte-curse" class="modal hide fade" style="display: none;" >
    <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="message-label-delete">Eliminar Curso</h3>
     </div>
      <div class="modal-body">
        <p>¿Realmente desea eliminar este curso?</p>
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0)" id="btn-deletecurse" class="btn btn-success">Aceptar</a>
        <a href="javascript:void(0)" data-dismiss="modal" class="btn">Cancelar</a>
      </div>
</div>

<script type="text/javascript">
var dataSource = new kendo.data.DataSource({
    transport: {
        read: {
            url: base_url + "cursos/LoadAllCursesFilter",
            type: 'POST',
            dataType: "JSON",
            data: {
                value: $("#TypeCurcesLoad").val() // sends the value of the input as the orderId
            }
        }
    }
});

 auto = $("#TypeCurcesLoad").kendoAutoComplete({
    minLength: 0,
    filter: "contains",
    dataTextField: "nombre",
    dataValueField: "id_tipo_curso",
    template:       '<article class="auto-TypeCurce" id="${ data.id_tipo_curso }">${ data.nombre }</article>',
    select: function(e) {
        var DataItem = this.dataItem(e.item.index());
        Curses['id_typecurse'] = DataItem.id_tipo_curso;
        TypeCurcesLoad=true;
    },
    dataSource:dataSource
});

 autoM = $("#Techer").kendoAutoComplete({
    minLength: 0,
    filter: "contains",
    dataTextField: "nombre",
    dataValueField: "id_usuario",
  template:       '<article class="auto-TypeCurce" id="${ data.id_usuario }">${ data.nombre } &nbsp;${ data.apellido1 } &nbsp;${ data.apellido2 } </article>',
  select: function(e) {
      var DataItem = this.dataItem(e.item.index());
      Curses['id_teacher'] = DataItem.id_usuario;
      swTecher=true;
  },
    dataSource: {
        serverPaging: true,
        pageSize: 10,
        transport: {
            read: {
                url: base_url + "profesores/getAllTeacher",
                dataType: "json",
                type: "POST"
            },
            parameterMap: function(options) {
                return $.extend(options, {'value':$("#Techer").val()});
            }
        }
    }
}); 
</script>
