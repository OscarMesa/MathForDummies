<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'talleres-form',
	'enableAjaxValidation'=>false,
)); ?>

<div id="form_taller">
    <p class="help-block">Los campos idenfitifcados con <span class="required">*</span> son requeridos.</p>

    <?php #echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldRow($model,'id_materia',array('class'=>'span5')); ?>

            <?php echo $form->textFieldRow($model,'id_curso',array('class'=>'span5')); ?>

            <?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

            <?php echo $form->textAreaRow($model,'descripcion',array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

    <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType'=>'submit',
                            'type'=>'primary',
                            'label'=>$model->isNewRecord ? 'Create' : 'Save',
                    )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

