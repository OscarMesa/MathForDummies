<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'contenidos-form',
    'enableAjaxValidation' => false,
        ));
?>
<div id="form_contenidos">
    
<p class="help-block">Los campos identificados con <span class="required">*</span> son requeridos.</p>


<?php
echo $form->dropDownListRow($model, 'state_contenido', array('true' => 'Activo', 'false' => 'Inactivo'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
?>
<?php echo $form->textFieldRow($model, 'titulo', array('class' => 'span5', 'maxlength' => 55)); ?>
<?php
$this->widget('bootstrap.widgets.TbHtml5Editor', array(
    'name' => 'texto',
    'width' => '98%',
        )
);
?>   
<?php #echo $form->textAreaRow($model,'texto',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

    <?php echo $form->textAreaRow($model, 'observacion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

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
</div>