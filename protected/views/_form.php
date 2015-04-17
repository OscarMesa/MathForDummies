<?php
/* @var $this SeguimientoUsuarioCursoController */
/* @var $model SeguimientoUsuarioCurso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seguimiento-usuario-curso-_form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_curso'); ?>
		<?php echo $form->textField($model,'id_curso'); ?>
		<?php echo $form->error($model,'id_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_nota'); ?>
		<?php echo $form->textField($model,'id_tipo_nota'); ?>
		<?php echo $form->error($model,'id_tipo_nota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nota'); ?>
		<?php echo $form->textField($model,'nota'); ?>
		<?php echo $form->error($model,'nota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentaje'); ?>
		<?php echo $form->textField($model,'porcentaje'); ?>
		<?php echo $form->error($model,'porcentaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion'); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->