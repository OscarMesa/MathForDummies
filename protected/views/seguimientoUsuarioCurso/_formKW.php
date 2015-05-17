<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'seguimiento-usuario-curso-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo Yii::t('polimsn','Fields with <span class="required">*</span> are required.'); ?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'id_curso',array('class'=>'span5', 'value'=> $id_curso)); ?>

	<?php echo $form->hiddenField($model,'id_usuario',array('class'=>'span5', 'value'=> Yii::app()->user->getId())); ?>

	<?php echo $form->textFieldRow($model,'nombre_seguimiento',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model, 'id_tipo_nota', CHtml::listData(TipoNota::model()->findAll(), 'id', 'descripcion'), array('class' => 'span5','empty'=>'----- Seleccionar -----')); ?>
	
        <?php echo $form->dropDownListRow($model, 'criterio_evaluacion', CHtml::listData(VCriteriosEvaluacion::model()->findAll(), 'id_criterio', 'criterio'), array('empty'=>'----- Seleccionar -----', 'class' => 'span5')); ?>

	<?php echo $form->textFieldRow($model,'porcentaje',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
























