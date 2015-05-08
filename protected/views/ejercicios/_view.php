<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_ejercicio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ejercicio),array('view','id'=>$data->id_ejercicio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_ejercicios')); ?>:</b>
	<?php echo CHtml::encode($data->state_ejercicios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMateria')); ?>:</b>
	<?php echo CHtml::encode($data->idMateria0->nombre_materia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ejercicio')); ?>:</b>
	<?php echo CHtml::encode($data->ejercicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuariocreador')); ?>:</b>
	<?php echo CHtml::encode($data->idusuariocreador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDificultad')); ?>:</b>
	<?php echo CHtml::encode($data->idDificultad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode($data->visible); ?>
	<br />


</div>