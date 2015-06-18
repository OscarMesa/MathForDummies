<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idRespuestaEjercicio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRespuestaEjercicio),array('view','id'=>$data->idRespuestaEjercicio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ejercicio')); ?>:</b>
	<?php echo CHtml::encode($data->id_ejercicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respuesta_ejercicio')); ?>:</b>
	<?php echo CHtml::encode($data->respuesta_ejercicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordenposicion')); ?>:</b>
	<?php echo CHtml::encode($data->ordenposicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_verdadero')); ?>:</b>
	<?php echo CHtml::encode($data->es_verdadero); ?>
	<br />


</div>