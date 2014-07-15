<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_curso')); ?>:</b>
	<?php echo CHtml::encode($data->state_curso); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_docente')); ?>:</b>
	<?php echo CHtml::encode($data->id_docente); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('idmateria')); ?>:</b>
	<?php echo CHtml::encode($data->idmateria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_curso')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_curso')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_cierre')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_cierre); ?>
	<br />

	*/ ?>

</div>