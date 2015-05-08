<?php
$this->breadcrumbs=array(
	'Ejercicioses'=>array('index'),
	$model->id_ejercicio,
);

$this->menu=array(
array('label'=>'List Ejercicios','url'=>array('index')),
array('label'=>'Create Ejercicios','url'=>array('create')),
array('label'=>'Update Ejercicios','url'=>array('update','id'=>$model->id_ejercicio)),
array('label'=>'Delete Ejercicios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ejercicio),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Ejercicios','url'=>array('admin')),
);
?>


<div class="well span6">
	<span class="label label-info" style='position:absolute; margin-left:67.7%; margin-top:-15px'> Estado: <?php echo CHtml::encode($model->state_ejercicios); ?></span>
	<b>Breve resumen del ejericio:</b>
	<?php echo CHtml::encode($model->ejercicio); ?>
	<br />

	<b>Materia asociada:</b>
	<?php echo CHtml::encode($model->idMateria0->nombre_materia); ?>
	<br />


	<b><?php echo CHtml::encode($model->getAttributeLabel('idDificultad')); ?>:</b>
	<?php echo CHtml::encode($model->idDificultad0->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode($model->visible); ?>
	<br />

	<b>Autor: </b>
	<?php echo CHtml::encode($model->idusuariocreador0->username); ?>
	<br />

</div>
