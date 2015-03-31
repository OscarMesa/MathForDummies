<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'materias-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="well">
<p class="help-block">Los campos con<span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre_materia',array('class'=>'span5','maxlength'=>45)); ?>
        
	<?php echo $form->dropDownListRow($model, 'state_materia', CHtml::listData(Estados::model()->findAll(), 'id_estado', 'nombre'), array('class' => 'span5')) ?>
	
       <?php echo $form->dropDownListRow($model, 'idarea', CHtml::listData(Area::model()->findAll('idestado=?', array(ACTIVE)), 'id_area', 'descripcion'), array('class' => 'span5')) ?>
                
</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
