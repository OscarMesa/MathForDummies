<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'ejercicios-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->dropDownListRow($model, 'state_ejercicios', array('active'=>'Activo','inactive'=>'Inactivo'),array('style'=> 'width:100%')) ?> 

	<?php echo $form->dropDownListRow($model, 'idMateria', CHtml::listData(Materias::model()->findAll(), 'idMateria', 'nombre_materia')); ?>

	<?php echo $form->textAreaRow($model,'ejercicio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->hiddenField($model,'idusuariocreador',array('class'=>'span5', 'value'=> Yii::app()->user->getId() )); ?>

	<?php echo $form->dropDownListRow($model, 'idDificultad', CHtml::listData(Dificultad::model()->findAll(), 'idDificultad', 'descripcion')); ?>

	<?php echo $form->dropDownListRow($model, 'visible', array('Publico'=>'publico','Privado'=>'privado'),array('style'=> 'width:100%')) ?> 


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
