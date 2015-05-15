<?php if($model->save){
    Yii::app()->clientScript->registerScript('closeBeforeSave','closeModalSave("seguimiento-curso-usuarios-grid","myModal");');
}?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'nota-seguimiento-usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Los campos marcados <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>
        <div class=""><label><b><?php echo $model->getAttributeLabel('id_usuario');?>: </b><?php echo $model->idUsuario->username;?></label><?php echo $form->hiddenField($model,'id_usuario');?></div>
	
        <div class=""><label><b><?php echo $model->getAttributeLabel('id_seguimiento_usuario_curso');?>: </b><?php echo $model->idSeguimientoUsuarioCurso->nombre_seguimiento;?></label><?php echo $form->hiddenField($model,'id_seguimiento_usuario_curso');?></div>
        
        <div class=""><label><b>Tipo nota: </b><?php echo $model->idSeguimientoUsuarioCurso->idTipoNota->descripcion;?></label></div>
        
	<?php echo $form->textFieldRow($model,'nota',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
