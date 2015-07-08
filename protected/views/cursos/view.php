<?php
$this->breadcrumbs=array(
	'Cursoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Cursos','url'=>array('index')),
	array('label'=>'Crear Curso','url'=>array('create')),
	array('label'=>'Modificar Curso','url'=>array('update/'.$model->id)),
	array('label'=>'Administrador de Cursos','url'=>array('../admin')),
);
?>
<div class="jumbotron">
		<h3>Curso:  <?php echo $model->nombre_curso; ?></h3>
		<p> Descripcion: <?php echo $model->descripcion_curso; ?> </p>
		<p> Estado Curso: <?php echo $model->state_curso; ?> </p>
		<p> Docente Creador del Curso: <?php echo $model->usuario->username; ?> </p>
		<p> Asignatura Asociada: <?php echo $model->materia->nombre_materia; ?> </p>
		<p> Fecha Finalizacion: <?php echo $model->fecha_cierre; ?> </p>	
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
                    "name" => 'state_curso',
                    'type' => 'raw',
                    'value' => function($data){
                        return $data->state_curso=='active'?"Activo":"Inactivo";
                    }
                ),
		'id_docente',
                 array(
                     'name',
                     'type' => 'raw',
//                     'value' => $data->usuario->
                 ),
		'idmateria',
		'nombre_curso',
		'descripcion_curso',
		'fecha_cierre',
	),
)); ?>

<?php if(!$this->validarExitenciaUsuarioEnCurso(Yii::app()->user->id, $model->id)){?>
<div id="sec-registrar-estudante"
     <label>
     <span style="display: inline-block;vertical-align: middle;line-height: normal;  margin-top: -13px;margin-right: 5px;">Ingresar código:</span> 
            <?php echo CHtml::textField('registrarEstudiante'); ?>
     </label>

     <?php echo CHtml::button('Registrar en curso',array('class'=>'btn btn-primary','id'=>'btn-regCurso','style'=>'padding: 5px;margin-left: 7px;margin-top: -9px;')); ?>
     <img style="  margin: 5px; display: none" id="img-load" src="<?php echo "";?>"/>
<div class="h   elp-block error" id="registrar_estudiante_error" style=""></div>
</div>
<?php 
    Yii::app()->clientScript->registerScript('registrarEstudianteXCodigo',''
                .'$("#btn-regCurso").click(function(){
                $("#img-load").css("display","inline-block");    
                $(\'#registrar_estudiante_error\').html("");
                $.post("'.Yii::app()->createAbsoluteUrl('cursos/agregarEstudiantexCodigo').'",{\'codigo\':$(\'#registrarEstudiante\').val(),\'id_curso\':'.$model->id.'},function(data){
                        if(data.respuesta == false){
                            $(\'#registrar_estudiante_error\').html(data.mensaje);
                        }else if(data.respuesta == true){
                            $("#sec-registrar-estudante").hide(\'slow\', function(){ 
                                $("#sec-registrar-estudante").remove(); 
                                $("#messages-app #yw1").html(\'<div class="alert in alert-block fade alert-success"><a href="#" class="close" data-dismiss="alert">×</a>\'+data.mensaje+\'</div>\');
                                $(\'body,html\').animate({scrollTop: 0}, 800);
                            });
                        }
                        $("#img-load").css("display","none");
                    },\'json\');
        });');
?>

<?php } ?>
<h3>Lista de evaluciones pendientes</h3>
<?php 

    $this->widget('bootstrap.widgets.TbListView',array(
        'dataProvider'=>$model->buscarEvaluacionesActivas(),
        'itemView'=>'application.views.evaluacion._realizarEvaluaciones',
        )); 
?>

<?php
    if(isset($contenido)){
    Yii::import('application.controllers.ContenidosController');
   // $contenido = new ContenidosController(-1);
         $this->widget('bootstrap.widgets.TbTabs', array(
        'id' => 'contenidos',
        'type' => 'tabs',
        'tabs' => array(
                array('id' => 'video', 'label' => 'Videos', 'content' => $this->renderPartial('application.views.imgVideosSonido._videos', array('model'=>$contenido->obtenerComonentesMultimedia($model->id,'video')), true), 'active' => true,),
                array('id' => 'img', 'label' => 'Imagenes', 'content' => $this->renderPartial('application.views.imgVideosSonido._imagenes', array('model'=>$contenido->obtenerComonentesMultimedia($model->id,'img')))),
                array('id' => 'sonido', 'label' => 'Imagenes', 'content' => $this->renderPartial('application.views.imgVideosSonido._sonido', array('model'=>$contenido->obtenerComonentesMultimedia($model->id,'sonido')))),
        ),
        'events'=>array('shown'=>'')
    )    
);
   } 
    ?>
<style>
    .help-block, .help-inline{
          color: #b94a48;
    }
</style>
