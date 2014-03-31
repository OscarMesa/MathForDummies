<?php
$this->breadcrumbs=array(
	'Cursoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cursos','url'=>array('index')),
	array('label'=>'Create Cursos','url'=>array('create')),
	array('label'=>'Update Cursos','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Cursos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cursos','url'=>array('admin')),
);
?>

<h1>View Cursos #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'state_curso',
		'id_docente',
		'idmateria',
		'nombre_curso',
		'descripcion_curso',
		'fecha_registro',
		'fecha_cierre',
	),
)); ?>


<?php 
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
    
    ?>
