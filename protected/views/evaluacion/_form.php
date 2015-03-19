<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'evaluacion-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'afterValidate' => "js: function(form, data, hasError) {
            return hasError;
        }"
    ),
     
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
        'showDropdowns' => true,
        'showDropdowns' => false,
        'timePickerIncrement' => 5,
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
        'id' => 'Evaluacion_fecha_inicio'
    ),
        )
);
?>

<?php echo $form->error($model, 'fecha_inicio', array('class' => 'help-block error', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'porcentaje', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'tiempo_limite', array('class' => 'span5')); ?>

<?php echo $form->radioButtonListRow($model, 'tipo_evaluacion_id', CHtml::listData(TipoEvaluacion::model()->findAll(),'tipoid','tipo_evaluacion'), array('data-toggle'=>"tooltip", 'data-placement'=>"top", 'data-original-title'=>""),array()); ?>

<?php // echo $form->textFieldRow($model, 'estado_evaluación', array('class' => 'span5')); ?>
<div id="contenidos-virtuales" style="display: none">
<label for="ejercicios[]">Ejercicios</label>
<div class="row-fluid">
    <div class="bql-evaluacion-content">
        <?php 
        $this->widget('bootstrap.widgets.TbListView',array(
                'id'=>'list-evaluaciones-items',
                'dataProvider'=>$Mejercicios->searchForEvaluacion(),
                'itemView'=>'_ejerciciosEvaluacion',
                'sortableAttributes'=>array(
                    'name',
                ),
            ));
        ?>
    </div>
</div>
<?php echo $form->error($model, 'ejercicios', array('class' => 'help-block error', 'maxlength' => 10)); ?>
</div>

<label for="temas[]">Temas</label>
<div class="row-fluid">
    <div class="span-6 bql-evaluacion-content">
        <?php
        echo CHtml::checkBoxList('temas', $select_array, CHtml::listData($temas, 'idtema', 'titulo'), array('class' => '',
            'template' => '<label class="checkbox">{input}{label}</label>',
//                                                              
        ));
        ?>
    </div>
</div>

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
<script type="text/javascript">
    $("#Evaluacion_tipo_evaluacion_id_1").change(function(e){
       $("#contenidos-virtuales").show('slow'); 
    });
    $("#Evaluacion_tipo_evaluacion_id_0").change(function(e){
       $("#contenidos-virtuales").hide('slow');
    });
</script>
<?php $this->endWidget(); ?>
<?php
$script = Yii::app()->getClientScript();
$script->registerScript('tooltip','(function($){'
        . '$("#Evaluacion_tipo_evaluacion_id_0").attr("data-original-title","Esta evaluación aplica cuando solo se va a evaluar dentro del aula mediante un método tradicional.");
            $("#Evaluacion_tipo_evaluacion_id_1").attr("data-original-title","Esta evaluación será realizada por el estudiante a través de la plataforma. De igual manera se habilitará una sección para agregar contenidos.");'
        . '})(jQuery)');
?>

<script type="text/javascript">
    //$(".full-scream-ejercicio")
</script>