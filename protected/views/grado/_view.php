<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_grado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_grado),array('view','id'=>$data->id_grado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_numerica')); ?>:</b>
	<?php echo CHtml::encode($data->desc_numerica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_verbal')); ?>:</b>
	<?php echo CHtml::encode($data->desc_verbal); ?>
	<br />


</div>