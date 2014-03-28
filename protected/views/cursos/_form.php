<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cursos-form',
    'enableAjaxValidation' => false,
        ));
?>

<div id="form_curso">
    <p class="help-block">Los campos identificados con <span class="required">*</span> son queridos.</p>

    <?php #echo $form->errorSummary($model); ?>

    <?php
    echo $form->dropDownListRow($model, 'state_curso', array('true' => 'Activo', 'false' => 'Inactivo'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
    ?>

    <?php echo $form->textFieldRow($model, 'idmateria', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'nombre_curso', array('class' => 'span5', 'maxlength' => 45)); ?>

    <?php echo $form->textAreaRow($model, 'descripcion_curso', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

    <?php
        echo date("dd-mm-yyyy");
        $this->widget('bootstrap.widgets.TbDateRangePicker', array(
            'name' => 'fecha_inicio',
            
            'options' => array(
                'language' => 'es',
                'format'=>'DD-MM-YYYY',
                'minDate'=> date("d-m-Y"),
                'locale' => array(
                    'cancelLabel'=> 'Cancelar', 
                    'applyLabel'=>'Aplicar',
                    'fromLabel'=>'Desde',
                    'toLabel'=>'Hasta',
                 ),
                'callback' => 'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}',
            ),
            'htmlOptions' => array(
                    'placeholder' => 'Fecha Inicio - Fecha Cierre',
                    'style' => 'width:98%;'
             ),

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