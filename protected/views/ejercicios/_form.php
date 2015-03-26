<?php
/* @var $this EjerciciosController */
/* @var $model Ejercicios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ejercicios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'state_ejercicios'); ?>
		<?php echo $form->textField($model,'state_ejercicios',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'state_ejercicios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idMateria'); ?>
		<?php echo $form->textField($model,'idMateria'); ?>
		<?php echo $form->error($model,'idMateria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ejercicio'); ?>
		<?php echo $form->textArea($model,'ejercicio',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ejercicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idusuariocreador'); ?>
		<?php echo $form->textField($model,'idusuariocreador'); ?>
		<?php echo $form->error($model,'idusuariocreador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idDificultad'); ?>
		<?php echo $form->textField($model,'idDificultad'); ?>
		<?php echo $form->error($model,'idDificultad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->textField($model,'visible',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->