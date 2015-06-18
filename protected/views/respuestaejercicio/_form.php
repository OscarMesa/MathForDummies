<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'respuestaejercicio-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php if($model->guardo){?>
<?php 
    Yii::app()->clientScript->registerScript('recargarListaRespuestas',''
            . 'if(window.parent != undefined){
                    window.parent.$.fn.yiiListView.update("list-respuestas-items");
                }');
?>
<?php } ?>

<p class="help-block"><?php echo Yii::t('polimsn', 'Fields with <span class="required">*</span> are required.');?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'id_ejercicio'); ?>

	<?php echo $form->textAreaRow($model,'respuesta_ejercicio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'ordenposicion',array('class'=>'span5')); ?>

	<?php echo $form->radioButtonListRow($model,'es_verdadero',array('v'=>'Si','f'=>'No'),array('class'=>'span5','maxlength'=>1)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<?php
    Yii::app()->clientScript->registerCss('input-respuesta-radio', '@media (max-width: 767px) {
        .input-large, .input-xlarge, .input-xxlarge, input[class*="span"], select[class*="span"], textarea[class*="span"], .uneditable-input {
          min-height: 13px;
        }
        .radio{
                width: 72px;
        }
    }');
?>