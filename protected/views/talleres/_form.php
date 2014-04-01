<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'talleres-form',
    'enableAjaxValidation' => false,
        ));
?>

<div id="form_taller">
    <p class="help-block">Los campos idenfitifcados con <span class="required">*</span> son requeridos.</p>

    <?php #echo $form->errorSummary($model); ?>
    <?php
    $model_materia_v = new Materias();
    echo $form->dropDownListRow($model, 'id_materia', CHtml::listData(Materias::model()->findAll(), 'idmaterias', 'nombre_materia'));
    echo"<br>";
    ?>
    
    
    <?php
    $model_curso_v = new Cursos();
    echo $form->dropDownListRow($model, 'id_curso', CHtml::listData(Cursos::model()->findAll("id_docente=?",array(Yii::app()->user->getId())), 'id', 'nombre_curso'));
    echo"<br>";
    ?>

    <?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 45)); ?>

    <?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

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


