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

                
            <?php 
                $check = false;
            ?>
            <div class="panel panel-success ejercicio" style="">
                <div class="panel-heading">
                <?php if( property_exists($model,"ejercicios") && isset($model->ejercicios) && count($model->ejercicios)>0){ ?>
                    <?php if(array_search($data->id_ejercicio,$model->ejercicios['check']) !== false){ $check = true;?>
                                 <div class="checkbox"><?php echo CHtml::checkBox('Taller[ejercicios][check]['.$data->id_ejercicio.']', 1, array('value'=>$data->id_ejercicio))?> 
                    <?php }else{ ?>
                                  <div class="checkbox"><?php echo CHtml::checkBox('Taller[ejercicios][check]['.$data->id_ejercicio.']', 0, array('value'=>$data->id_ejercicio))?> 
                   <?php } ?>
                <?php }else{ ?>    
                  <div class="checkbox"><?php echo CHtml::checkBox('Taller[ejercicios][check]['.$data->id_ejercicio.']', 0, array('value'=>$data->id_ejercicio))?>
                <?php } ?>      
                      <a class="full-scream-ejercicio" href="#" onclick="AbrirModal('Ejercico #<?php echo $data->id_ejercicio;?>','500px','90%','<?php echo Yii::app()->createAbsoluteUrl('ejercicios/view', array('id'=>$data->id_ejercicio)); ?>','left: 13%')"><i class="icon-fullscreen"></i></a>  </div>
                </div>
                <div class="panel-body">
                   <?php echo $data->ejercicio;?>
                    <?php if($check){?>
                    <div class="porcentaje-ejercicio-evaluacion">
                        <label><span>Porcentaje</span>
                            <input type="text" name="Taller[ejercicios][porcentaje][<?php echo $data->id_ejercicio; ?>]" value="<?php echo $model->ejercicios['porcentaje'][$data->id_ejercicio]?>"><span class="spn-porcentaje">%</span>
                        </label>
                    </div>
                    <?php } ?>
                </div>
            </div>
    

    <?php endif; ?>
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


