<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idmaterias')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmaterias),array('view','id'=>$data->idmaterias)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_materia')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_materia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_materia')); ?>:</b>
	<?php echo CHtml::encode($data->state_materia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idarea')); ?>:</b>
	<?php echo CHtml::encode($data->idarea); ?>
	<br />


</div>