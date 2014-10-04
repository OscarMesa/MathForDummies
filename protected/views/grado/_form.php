<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'grado-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'desc_numerica',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'desc_verbal',array('class'=>'span5','maxlength'=>100)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
