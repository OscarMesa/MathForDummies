<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'codigo-ingreso-curso-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php  echo Yii::t('polimsn', 'Fields with <span class="required">*</span> are required.');?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'codigo_verficacion',array('class'=>'span5','maxlength'=>15)); ?>

        <?php echo $form->hiddenField($model,'id_curso',array('class'=>'span3', 'value'=> $curso->id)); ?>

        <?php echo CHtml::ajaxButton('Edit','',array('ajax' => array(
                                        'type'=>'POST',
                                        'dataType'=>'json',                                                                                     
                                        'data'=>array('counter'=>$itemFormInfo['counter'],'server'=>$itemFormInfo['server'],'productType'=>$itemFormInfo['productType']),
                                        'url'=>CController::createUrl('sell/loadDialog'),       
                                        'success'=>'function(data){                                             
                                                 $("#uploadBox").dialog("open");
                                        }',                                     
                                        'async' => true,
                                        ),                                                              
                                ),array('id'=>'some-unique-id'))?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
