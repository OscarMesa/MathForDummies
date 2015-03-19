<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'ejercicios-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'state_ejercicios',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'idMateria',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'ejercicio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'idusuariocreador',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idDificultad',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
