<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_universidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_universidad),array('view','id'=>$data->id_universidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_universidad')); ?>:</b>
	<?php echo CHtml::encode($data->state_universidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_universidad')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_universidad); ?>
	<br />


</div>