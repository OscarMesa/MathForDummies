<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'respuestaejercicio-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo Yii::t('polimsn', 'Fields with <span class="required">*</span> are required.');?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'id_ejercicio'); ?>

	<?php echo $form->textAreaRow($model,'respuesta_ejercicio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'ordenposicion',array('class'=>'span5')); ?>

	<?php echo $form->radioButtonListRow($model,'es_verdadero',array(1=>'Si',0=>'No'),array('class'=>'span5','maxlength'=>1)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
