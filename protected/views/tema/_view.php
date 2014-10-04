<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idtema')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtema),array('view','id'=>$data->idtema)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcurso')); ?>:</b>
	<?php echo CHtml::encode($data->idcurso); ?>
	<br />


</div>