<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'talleres-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => false
    ),
        ));
?>

<div id="form_taller">
    <p class="help-block">Los campos idenfitifcados con <span class="required">*</span> son requeridos.</p>

   <?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 45)); ?>
   
   <?php
            echo $form->dropDownListRow($model, 'id_materia', CHtml::listData(Materias::model()->findAll(), 'idmaterias', 'nombre_materia'));
            echo"<br>";
    ?>
    <?php
    echo $form->dropDownListRow($model, 'id_curso', CHtml::listData(Cursos::model()->findAll("id_docente=?", array(Yii::app()->user->getId())), 'id', 'nombre_curso'));
    echo"<br>";
    ?>

    <?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
    <?php if(Yii::app()->controller->action->id=='update'): ?>


                <div id="contenidos-virtuales" style="display: block">
                    <label for="ejercicios[]">Ejercicios</label>
                    <div class="row-fluid">
                        <div class="bql-evaluacion-content">
                            <?php
                            $this->widget('bootstrap.widgets.TbListView', array(
                                'id' => 'list-evaluaciones-items',
                                'dataProvider' => $Mejercicios->searchForEvaluacion(),
                                'itemView' => '_ejerciciosTaller',
                                'viewData' => array('model' => $model),
                                'sortableAttributes' => array(
                                    'name',
                                ),
                            ));
                            ?>
                        </div>
                    </div>
                    <?php echo $form->error($model, 'ejercicios', array('class' => 'help-block error', 'maxlength' => 10, 'style'=>'margin-top: 7px;')); ?>
                </div>

    <?php endif; ?>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Crear' : 'Actualizar',
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>


