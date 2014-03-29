<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'img-videos-sonido-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'state_img_videos',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'nombre',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'idUsiario',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
