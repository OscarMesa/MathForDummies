<?php
$this->breadcrumbs=array(
	'Respuestaejercicios'=>array('index'),
	$model->idRespuestaEjercicio,
);

$this->menu=array(
array('label'=>'List Respuestaejercicio','url'=>array('index')),
array('label'=>'Create Respuestaejercicio','url'=>array('create')),
array('label'=>'Update Respuestaejercicio','url'=>array('update','id'=>$model->idRespuestaEjercicio)),
array('label'=>'Delete Respuestaejercicio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idRespuestaEjercicio),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Respuestaejercicio','url'=>array('admin')),
);
?>

<h1>View Respuestaejercicio #<?php echo $model->idRespuestaEjercicio; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idRespuestaEjercicio',
		'id_ejercicio',
		'respuesta_ejercicio',
		'ordenposicion',
		'es_verdadero',
),
)); ?>
