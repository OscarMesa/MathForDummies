
$(document).live('ready',start);

function start(){

	$('#cursos').live('click',LoadViewCursos);

	$('.delete_curso').live('click',DeleteCurso);

	$('#nuevo_curso').live('click',NewCurso);

	$('#usuarios').live('click', LoadViewUsuarios);

	$('#profesiones').live('click',LoadViewProfessions);

	$('#universidades').live('click',LoadViewUniversities);

	$('#tipo_cursos').live('click',LoadViewTypeCourse);

	$('#tipo_contenidos').live('click',LoadViewTypeContenten);
	StartFieldEdit();
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
	imageLoad = document.createElement('img');
	$(imageLoad).attr('src', base_url + 'public/images/loading.gif');
	return $(imageLoad);
}

function DeleteCurso(e){
	id = $(this).attr('id');
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		url: 'cursos/DeleteCurso',
		data: 'id=' + id,
		success: function(response){
			if(response.col_afetada>0){
				$('#row_'+id).hide('slow', function(){ $('#row_'+id).remove(); });
			}else{
				alert('Se presento un error durante la eliminación');
				console.log(response);
			}
		},
		error: function(response){
			console.log(response);
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
			alert('Ocurrio un error durante la creación');
			console.log(response);
		}
	});
}

function StartFieldEdit(){

	LoadJQueryAutoSave();
	$('.edit').editable('edit/Update', {
	 textarea_rows: "15",
	 textarea_cols: "35",
     type     : 'text',
     submit   : 'OK',
     saving   : null,
     callback : function(value, response) {
          if(!response.rpt){
          	//console.log(response.error);
          	document.getElementById('error_'+this.extraParams.table).innerHTML = response.error.value;
          	// document.getElementById(this.extraParams.table).style.border = '2px dotted #F00';
          	// document.getElementById(this.extraParams.table).style.float = 'left:5px';
          	// document.getElementById(this.extraParams.table).style.height= '30px';
          	//document.getElementById(this.extraParams.table).innerHTML = '';
          }
          if(response.message == '')
          	document.getElementById(this.extraParams.table).innerHTML = 'Inválido';
          else
          	document.getElementById(this.extraParams.table).innerHTML = response.message;
      	  	
     }
	});


}
