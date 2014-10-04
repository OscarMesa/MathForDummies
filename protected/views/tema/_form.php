<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tema-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => false
    ),
        ));
?>

<p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>


<?php echo $form->textFieldRow($model, 'titulo', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php echo $form->dropDownListRow($model, 'idperiodo', CHtml::listData(Periodo::model()->findAll(), 'id_periodo', 'valor_textual'), array('options' => array($model->idperiodo => array('selected' => true)))) ?>

<?php echo $form->textAreaRow($model, 'descripcion', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo CHtml::hiddenField('Tema[idcurso]', $curso->id); ?>

    <?php echo CHtml::hiddenField('Tema[idtema]', $model->idtema); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
