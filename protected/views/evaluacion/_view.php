<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('cursos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cursos_id),array('view','id'=>$data->cursos_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_limite')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo_limite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_evaluación')); ?>:</b>
	<?php echo CHtml::encode($data->estado_evaluación); ?>
	<br />


</div>