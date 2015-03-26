<?php
/* @var $this EjerciciosController */
/* @var $model Ejercicios */

$this->breadcrumbs=array(
	'Ejercicioses'=>array('index'),
	$model->id_ejercicio,
);

$this->menu=array(
	array('label'=>'List Ejercicios', 'url'=>array('index')),
	array('label'=>'Create Ejercicios', 'url'=>array('create')),
	array('label'=>'Update Ejercicios', 'url'=>array('update', 'id'=>$model->id_ejercicio)),
	array('label'=>'Delete Ejercicios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ejercicio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ejercicios', 'url'=>array('admin')),
);
?>

<h1>View Ejercicios #<?php echo $model->id_ejercicio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ejercicio',
		'state_ejercicios',
		'idMateria',
		'ejercicio',
		'idusuariocreador',
		'idDificultad',
		'visible',
	),
)); ?>
