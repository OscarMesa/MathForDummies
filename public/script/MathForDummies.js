var Curses = {}, Usuarios;
var id_delete,mode_save_to_update = 'save';
var Win_User;
/**
*	Variables backbound
*/

var CRUD, MCRUD;

var ModelCurces, ModelUsuarios;

var CollectionCurces,CollectionUsuarios;

var ccurses,cusuarios;

$(document).on('ready',start);

function start(){


	$('#cursos').on('click',LoadViewCursos);

	$('#close-message-error').on('click',closeMessagError)

	$('#usuarios').click(LoadViewUsuarios);

	$('#profesiones').click(LoadViewProfessions);

	$('#universidades').click(LoadViewUniversities);

	$('#tipo_cursos').click(LoadViewTypeCourse);

	$('#tipo_contenidos').click(LoadViewTypeContenten);

	$('#content-img img').click(abrir);//login

	$('#ejercicios').click(LoadViewExcercices);

	$('#ecuaciones').click(LoadViewEquations);

	//$('#btn-savecurse').delegate('click',SaveCurse);

	$('#nuevo_usuario').click(OpenWindowUser);

	$('#btn-deleteurse').click(DeleteUser);

	$('#frm-newcurse').click(StopExecute);

	InitElementBackbone();

	InitElementPages();

	InitFunctionNatives();
}

function InitElementPages()
{
	Win_Error = $("#message-error").kendoWindow({
        actions: [ "Minimize", "Close"],
        width: "450px",
        modal: true,
        draggable : false,
        resizable: false,
        title: "Error",
        visible: false
    }).data("kendoWindow");
}
function InitFunctionNatives()
{
	jQuery.fn.reset = function () {
  		$(this).each (function() { this.reset(); });
	}
}
function StopExecute(e){
	e.preventDefault();
}
function OpenWindowDeleteUser(){
	console.log($(this).attr('id'));
	Usuarios.set({id_usuario:$(this).attr('id')});
	$('#message-delte-user').modal('show');
}
function OpenWindowUser(){
	Usuarios = new ModelUsuarios;
	$('.modal-body').scrollTop(0);
	if($(this).attr('id') == 'nuevo_usuario'){
		mode_save_to_update = 'save';
		$('#musuarios .modal-header h3').html('Nuevo Usuario');
	}else{
		mode_save_to_update = 'update';
		$('#musuarios .modal-header h3').html('Editar Usuario');
		element = eval(jQuery.parseJSON(JSON.stringify(cusuarios.where({id_usuario:$(this).attr('id')}))))[0];
		$('#NameUser').val(element.nombre);	
		$('#LastName1').val(element.apellido1);	
		$('#LastName2').val(element.apellido2);	
		$('#TephoneUser').val(element.telefono);	
		$('#CellUser').val(element.celular);	
		$('#EmailUser').val(element.correo);	
		$('#Profetion').val(element.name_profesion);	
		$('#Profile').val(element.name_perfil);
		Usuarios.set({id_usuario:element.id_usuario});	
		Usuarios.set({id_perfil:element.id_perfil});
		$('#EmailUser').attr('disabled', 'disabled');
		Usuarios.set({id_profesion:element.id_profesion});
		$('#musuarios').modal('show');
	}
}
function DeleteUser(e){
	$('#message-delte-user').modal('toggle');
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		url: 'usuario/DeleteUrse',
		data: 'id=' + Usuarios.get('id_usuario'),
		success: function(response){
			if(response.col_afetada>0){
				$('#row_'+Usuarios.get('id_usuario')).hide('slow', function(){ $('#row_'+Usuarios.get('id_usuario')).remove(); });
				//LoadViewCursos();
			}else{
				OpenMessagesErrorModal('Error','Se presento un error durante la eliminación');
				console.log(response);
			}
		},
		error: function(response){
			console.log(response);
		}
	});
}
function Search(e)
{
	if($('#' + MCRUD.get('search').fieldsearch).val()!=''){
		$('#' + MCRUD.get('search').area).html('');
		$('#' + MCRUD.get('search').area).html(CapaLoadImages());
		$.post(base_url + MCRUD.get('controller') + '/' +MCRUD.get('search').method, { valuesearch:$("#" + MCRUD.get('search').fieldsearch).val() },
	 		function(data) {
	   			$('#' + MCRUD.get('search').area).html(data);
	 		}
		);
	}
	e.preventDefault();	
}

function SearchFilterCurse(e){
	field = 'value-search:' + $("#input-search-curse").val();
	//if($('#input-search-curse').val()!=''){
		$('#sec-table-search').html('');
		$('#sec-table-search').html(CapaLoadImages());
		$.post(base_url + 'curses/SearchCurse', { valuesearch:$("#input-search-curse").val() },
	 		function(data) {
	   			$('#sec-table-search').html(data);
	 		}
		);
	//}
	e.preventDefault();
}
function InitElementBackbone(){

	/**
	*	Cursos
	*/
	 ModelCurces = Backbone.Model.extend({
     initialize: function() {
      console.log('Se inicio el modelo de los cursos');
     },
     defaults: {
      Id: 'undefined',
      id_type: 'undefined',
  	  name_type: 'undefined',
  	  id_tacher: 'undefined',
  	  name_tache: 'undefined'
     }
    });
    CollectionCurces = Backbone.Collection.extend({
     initialize: function() {
      //console.log("Se inicio la colecccion de los cursos");
     },
     model: ModelCurces
    });
 
	/**
	*	Usuarios
	*/     

	ModelUsuarios = Backbone.Model.extend({
		initialize: function(){
			console.log("Se inicio el modelo de usuarios");
		},
		defaults:{
			id_usuario: 'undefined',
			nombre: 'undefined',
			apellido1: 'undefined',
			apellido2: 'undefined',
			telefono: 'undefined',
			celular: 'undefined',
			correo: 'undefined',
			id_profesion: 'undefined',
			id_perfil: 'undefined',
			name_profesion: 'undefined',
			name_perfil:'undefined'
		}
	});
	CollectionUsuarios = Backbone.Collection.extend({
		initialize: function(){

		},
		model: ModelUsuarios
	});
	Usuarios = new ModelUsuarios;

	/**
	*	CRUD busqueda
	*/
	CRUD = Backbone.Model.extend({
		initialize: function(){
		//	console.log("Se inicio el modelo de usuarios");
		},
		defaults:{
			controller: 'undefined',
			search: {'field-search':'','buttonsearch':'','area':'','method':''}
		}
	});
}
function SaveCurse(e){
	console.log(Curses)
	if(document.querySelector("#frm-newcurse").checkValidity()){ 
		if(mode_save_to_update == 'save'){
			if($.map(Curses, function(n, i) { return i; }).length==2)
			{
				$.ajax({
					type:"POST",
					dataType: "JSON",
					url: base_url + "curses/NewCurse",
					data: Curses,
					success: function(data){
						if(!data.rpt){
									for(x in data.step_msg){
										$('#error_' + x).html(data.step_msg[x]);
									}
						}else{
							$('#mcurces').modal('hide');
							OpenMessagesModal('Guardado exitoso','El curso se almaceno correctamente');
							LoadViewCursos();
							Curses = {};
						}
					},
					error: function(data){
						console.log(data);
					}
				});
			}else{
				OpenMessagesErrorModal('Error','Se deben seleccionar datos creados.');
			}	
		}else{
			$.ajax({
				type:"POST",
				dataType: "JSON",
				url: base_url + "curses/EditCurse",
				data: Curses,
				success: function(data){
					if(!data.rpt){
								for(x in data.step_msg){
									$('#error_' + x).html(data.step_msg[x]);
								}
					}else{
						$('#mcurces').modal('hide');
						OpenMessagesModal('Edición exitoso','El curso se edito correctamente');
						LoadViewCursos();
					}
				},
				error: function(data){
					console.log(data);
				}
			});
			mode_save_to_update = 'save';
			Curses = {};
		}
	}else{
		document.getElementById("btn-validatecurse").click();
	}
	e.preventDefault();
}
function SaveUser(e){
	if(document.querySelector('#password').value != document.querySelector('#cpassword').value)
	 		document.querySelector('#cpassword').setCustomValidity("Las contraseñas no coinciden");
	 else
	 		document.querySelector('#cpassword').setCustomValidity("");
	if(document.querySelector("#frm-newurse").checkValidity()){ 
		if(mode_save_to_update == 'save')
		{
				$.ajax({
					type:"POST",
					dataType: "JSON",
					url: base_url + "usuario/NewUser",
					data: $('#frm-newurse').serialize() + "&id_profesion=" + Usuarios.get('id_profesion') + "&id_perfil=" + Usuarios.get('id_perfil'),
					success: function(data){
						if(!data.rpt){
									for(x in data.step_msg){
										$('#error_' + x).html(data.step_msg[x]);
									}
						}else{
							$('#musuarios').modal('hide');
 							OpenMessagesModal('Guardado exitoso','El usuario se almaceno correctamente');
							LoadViewUsuarios();
						}
					},
					error: function(data){
						console.log(data);
					}
				});
		}else{
			$('#EmailUser').removeAttr("disabled");
			$.ajax({
					type:"POST",
					dataType: "JSON",
					url: base_url + "usuario/UpdateUser",
					data: $('#frm-newurse').serialize() + "&id_profesion=" + Usuarios.get('id_profesion') + "&id_perfil=" + Usuarios.get('id_perfil') + "&id_user=" + Usuarios.get('id_usuario'),
					success: function(data){
						if(!data.rpt){
									for(x in data.step_msg){
										$('#error_' + x).html(data.step_msg[x]);
									}
						}else{
							$('#musuarios').modal('hide');
							OpenMessagesModal('Edición exitoso','El usuario se modificado correctamente');
							LoadViewUsuarios();
						}
					},
					error: function(data){
						console.log(data);
					}
			});
		}
	}else{
		document.getElementById("btn-validateuser").click();
	}
	//e.preventDefault();
}
function OpenMessagesModal(title,body){
	$('#message .modal-header h3').html(title);
	$('#message .modal-body p').html(body);
	$('#message').modal('show');
}
function OpenMessagesErrorModal(title,body)
{
	$('#message-error .modal-header h3').html(title);
	$('#message-error .modal-body span').html(body);
	Win_Error.center().open();
	Win_Error.wrapper.css({position: 'fixed'});
}

function closeMessagError()
{
	Win_Error.close();
}
function LoadDataTypeCurce(e){
	if(e.keyCode!=8 && $(this).val()!='' && $(this).val().length>2)
	{
		$.ajax({
			type:'POST',
			dataType: 'JSON',
			url: base_url + 'curses/LoadDataTypeCurce',
			data: 'filter=' + $(this).val(),
			success: function(data){
				$('#LayerTypeCurces').html('');
				$.each(data,function(key,value){
					$('#LayerTypeCurces').html($('#LayerTypeCurces').html()+'<option value="'+value.nombre+'">');
					console.log($('#LayerTypeCurces').html());
				});
				
			},
			error: function(data){
				conosle.log(data);
			} 
		});
	}	
}
function LoadViewEquations(){
	$("#homemain").html(CapaLoadImages()).load('equations/getAllEcuations');
}
function LoadViewExcercices(){
	$("#homemain").html(CapaLoadImages()).load('ejercicios/getAllExcrcies');
}
function LoadViewTypeContenten(){
	$("#homemain").html(CapaLoadImages()).load('contents/LoadViewTypeContents');
}
function LoadViewCursos(){
	$("#homemain").html(CapaLoadImages()).load('cursos/LoadViewCursos',null,function(data){
		$(this).html(data);
	});
}
function LoadViewUniversities(){
	$("#homemain").html(CapaLoadImages()).load('university/LoadViewUniversity',null,function(data){
		$(this).html(data);
	}) 	
}
function LoadViewUsuarios(){
	$("#homemain").html(CapaLoadImages()).load('usuario/LoadViewUsers',null,function(data){
		$(this).html(data);
	}) 
}
function LoadViewProfessions(){
	$("#homemain").html(CapaLoadImages()).load('professions/LoadViewProfessions');
}
function LoadViewTypeCourse(){
	$("#homemain").html(CapaLoadImages()).load('curses/LoadViewTypeCourse')
}
function CapaLoadImages(){
	imageLoad = document.createElement('div');
	$(imageLoad).attr('id','content-loading');
	$(imageLoad).html('<div class="circle"></div><div class="circle1"></div>');
	return $(imageLoad);
}
function OpenWindowDeleteCurse(){
	id_delete = $(this).attr('id');
	$('#message-delte-curse').modal('show');
}
function OpenWindowCurse(){
	if($(this).attr('class') == 'edit_curso'){
		mode_save_to_update = 'edit';
		element = eval(jQuery.parseJSON(JSON.stringify(ccurses.where({Id:$(this).attr('id')}))))[0];
		$('#Techer').val(element.name_tache);
		$('#TypeCurcesLoad').val(element.name_type);
		Curses['id'] = element.Id;
		Curses['id_teacher'] = element.id_tacher;
		Curses['id_typecurse'] = element.id_type;
		$('#mcurces').modal('show');
	}
}
function DeleteCurso(e){
	$('#message-delte-curse').modal('toggle');
	console.log(id_delete);
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		url: 'curses/DeleteCurse',
		data: 'id=' + id_delete,
		success: function(response){
			if(response.col_afetada>0){
				$('#row_'+id_delete).hide('slow', function(){ $('#row_'+id_delete).remove(); });
				LoadViewCursos();
			}else{
				OpenMessagesErrorModal('Error','Se presento un error durante la eliminación');
				console.log(response);
			}
		},
		error: function(response){
			console.log(response);
		}
	});
}
function clear_form_elements(ele) {

	ele.find(':input').each(function() {
        switch(this.type) {
            case 'password':
			case 'select-multiple':
			case 'select-one':
            case 'text':
			case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':	
                this.checked = false;
        }
	});

}
function NewCurso(){
	$.ajax({
		type:'POST',
		dataType: 'JSON',
		url: 'cursos/NewCurso',
		success: function(response){
			id = response.id_new_curso;
			// row = '<tr id="row_'+id+'">
			// 	<td>'+id+'</td>
			// 	<td>
			// 		<div class="edit" id="'+id+':'+CryptoJS.SHA1("nombre")+':'+CryptoJS.SHA1("tipo_curso")+'">Diligenciar campo</div>
			// 		<span class="message_error" id="error_'+id+':'+CryptoJS.SHA1('nombre')+':'+CryptoJS.SHA1("tipo_curso")+'"></span>
			// 		</td><td><div class="edit" id="'+id+':'+CryptoJS.SHA1('descripcion')+':'+CryptoJS.SHA1('tipo_curso')+'">Diligenciar campo</div>
			// 		<span class="message_error" id="error_'+id+':'+CryptoJS.SHA1('descripcion')+':'+CryptoJS.SHA1("tipo_curso")+'"></span>
			// 		</td><td><a href="javascript:void(0);" class="delete_curso" id='+id+'><i class="icon-trash"></i></a></td></tr>"';
			
			$("#homemain table").append(row).show('slow');

		},
		error: function function_name (response) {
			OpenMessagesErrorModal('Error','Ocurrio un error durante la creación');
			console.log(response);
		}
	});
}

//Diego
function abrir(){
	var alto=50;
	if($("#content-img #content-login").height() == 50){
		alto=0; 
		$(this).css("background","url("+base_url+"public/images/iconos/abrir.png) no-repeat center");
	}else{
		$(this).css("background","url("+base_url+"public/images/iconos/abajo.png) no-repeat center");
	}
	$("#content-img #content-login").animate({
		height:alto+"px"
	});
}
