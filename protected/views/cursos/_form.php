<?php
if (Yii::app()->controller->action->id == 'update') {
    $url = "/cursos/update/" . $model->id;
} else {
    $url = "/cursos/create";
}
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cursos-form',
    'action' => Yii::app()->getBaseUrl('true') . $url,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
        'validateOnType' => false
    ),
        ));
?>

<div id="form_curso">
    <p class="help-block">Los campos con <span class="required">*</span> son queridos.</p>

    <?php #echo $form->errorSummary($model); ?>

    <?php
    echo $form->dropDownListRow($model, 'state_curso', array('active' => 'Activo', 'inactive' => 'Inactivo'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
    ?>

    <?php echo $form->dropDownListRow($model, 'idmateria', CHtml::listData(Materias::model()->findAll('state_materia=?', array('active')), 'idmaterias', 'nombre_materia'), array('style' => '')) ?>

    <?php echo $form->textFieldRow($model, 'nombre_curso', array('class' => 'span5', 'maxlength' => 45)); ?>

    <?php echo $form->textAreaRow($model, 'descripcion_curso', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

    <?php
    $this->widget('bootstrap.widgets.TbDateRangePicker', array(
        'name' => 'Cursos[rango_fecha]',
        'value' => ($model->fecha_inicio != '' ? $model->fecha_inicio . ' - ' . $model->fecha_cierre : ''),
        'options' => array(
            'language' => 'es',
            'format' => 'YYYY-MM-DD',
            'minDate' => date('Y-m-d'),
            'locale' => array(
                'cancelLabel' => 'Cancelar',
                'applyLabel' => 'Aplicar',
                'fromLabel' => 'Desde',
                'toLabel' => 'Hasta',
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
        'label' => $model->isNewRecord ? 'Crear' : 'Guardar',
    ));
    ?>
    </div>
</div>
<?php $this->endWidget(); ?>
