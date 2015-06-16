<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('evaluacion_integrante_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->evaluacion_integrante_id),array('view','id'=>$data->evaluacion_integrante_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_evalucacion_integrante')); ?>:</b>
	<?php echo CHtml::encode($data->state_evalucacion_integrante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_integrante_curso')); ?>:</b>
	<?php echo CHtml::encode($data->id_integrante_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />


</div>