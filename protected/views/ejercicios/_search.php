<?php
/* @var $this EjerciciosController */
/* @var $model Ejercicios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_ejercicio'); ?>
		<?php echo $form->textField($model,'id_ejercicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state_ejercicios'); ?>
		<?php echo $form->textField($model,'state_ejercicios',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idMateria'); ?>
		<?php echo $form->textField($model,'idMateria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ejercicio'); ?>
		<?php echo $form->textArea($model,'ejercicio',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idusuariocreador'); ?>
		<?php echo $form->textField($model,'idusuariocreador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idDificultad'); ?>
		<?php echo $form->textField($model,'idDificultad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visible'); ?>
		<?php echo $form->textField($model,'visible',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->