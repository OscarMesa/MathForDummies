<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_codigo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_codigo),array('view','id'=>$data->id_codigo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_verficacion')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_verficacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curso')); ?>:</b>
	<?php echo CHtml::encode($data->id_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>