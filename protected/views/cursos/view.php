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
		'state_curso',
		'id_docente',
		'idmateria',
		'nombre_curso',
		'descripcion_curso',
		'fecha_cierre',
	),
)); ?>


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
