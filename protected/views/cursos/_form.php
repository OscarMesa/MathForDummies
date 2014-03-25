<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cursos-form',
    'enableAjaxValidation' => false,
        ));
?>

<div id="form_curso">
    <p class="help-block">Los campos identificados con <span class="required">*</span> son queridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    echo $form->dropDownListRow($model, 'state_curso', array('true' => 'active', 'false' => 'inactive'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
    ?>

    <?php echo $form->textFieldRow($model, 'idmateria', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'nombre_curso', array('class' => 'span5', 'maxlength' => 45)); ?>

    <?php echo $form->textAreaRow($model, 'descripcion_curso', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

    <?php
    $this->widget(
            'bootstrap.widgets.TbDatePicker', array(
        'name' => 'fecha_inicio',
        'options' => array(
            'language' => 'es'
        )
            )
    );
    $this->widget(
            'bootstrap.widgets.TbDatePicker', array(
        'name' => 'fecha_cierre',
        'options' => array(
            'language' => 'es'
        )
            )
    );
    ?>

    <div class="form-actions">
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => $model->isNewRecord ? 'Create' : 'Save',
));
?>
    </div>
</div>
<?php $this->endWidget(); ?>
