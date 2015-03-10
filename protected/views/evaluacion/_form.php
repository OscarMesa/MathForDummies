<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'evaluacion-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php Yii::t('polimsn', 'Fields with <span class="required">*</span> are required.'); ?></p>

<?php echo $form->errorSummary($model); ?>

<?php
//    $l = new Cursos();
echo $model->getAttributeLabel('fecha_inicio') . " - " . $model->getAttributeLabel('fecha_fin');
$this->widget('bootstrap.widgets.TbDateRangePicker', array(
    'name' => 'Evaluacion[fecha_inicio]',
    'value' => ($model->fecha_inicio != '' ? $model->fecha_inicio . ' - ' . $model->fecha_fin : ''),
    'options' => array(
        'language' => 'es',
        'format' => 'YYYY-MM-DD h:mm A',
        'timePicker' => true,
        'opens' => 'left',
        'showDropdowns' => true,
        'showDropdowns' => false,
        'minDate' => date('Y-m-d'),
        'locale' => array(
            'cancelLabel' => 'Cancelar',
            'applyLabel' => 'Aplicar',
            'fromLabel' => 'Desde',
            'toLabel' => 'Hasta',
            'close' => false,
        ),
        'callback' => 'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}',
    ),
    'htmlOptions' => array(
        'placeholder' => 'Fecha Inicio - Fecha Cierre',
        'style' => 'width:100%;',
    ),
        )
);
?>

<?php echo $form->textFieldRow($model, 'porcentaje', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'tiempo_limite', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'estado_evaluación', array('class' => 'span5')); ?>

<?php 

//echo CHtml::checkBoxList('temas', 'idtema', CHtml::listData($temas, 'idtema', 'titulo'),array('class' => 'span5', 'template'=>'<label class="checkbox"><spam>{label}</spam>{input}</label>')); ?>

    <?php echo $form->hiddenField($model, 'cursos_id', array()); ?>
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
