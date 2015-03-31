<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idmaterias',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'nombre_materia',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'state_materia',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldRow($model,'idarea',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
