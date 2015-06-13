<?php 
    $check = false;
?>
<div class="panel panel-success ejercicio" style="">
    <div class="panel-heading">
    <?php if( property_exists($model,"ejercicios") && isset($model->ejercicios) && count($model->ejercicios)>0){ ?>
        <?php if(array_search($data->id_ejercicio,$model->ejercicios['check']) !== false){ $check = true;?>
                     <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][check]['.$data->id_ejercicio.']', 1, array('value'=>$data->id_ejercicio))?> 
        <?php }else{ ?>
                      <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][check]['.$data->id_ejercicio.']', 0, array('value'=>$data->id_ejercicio))?> 
       <?php } ?>
    <?php }else{ ?>    
      <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][check]['.$data->id_ejercicio.']', 0, array('value'=>$data->id_ejercicio))?>
    <?php } ?>      
<<<<<<< HEAD
          <a class="full-scream-ejercicio" href="#" onclick="AbrirModal('Ejercico #<?php echo $data->id_ejercicio;?>','500px','90%','<?php echo Yii::app()->createAbsoluteUrl('ejercicios/view', array('id'=>$data->id_ejercicio)); ?>', '15%')"><i class="icon-fullscreen"></i></a>  </div>
=======
          <a class="full-scream-ejercicio" href="#" onclick="AbrirModal('Ejercico #<?php echo $data->id_ejercicio;?>','500px','90%','<?php echo Yii::app()->createAbsoluteUrl('ejercicios/view', array('id'=>$data->id_ejercicio)); ?>','left: 13%')"><i class="icon-fullscreen"></i></a>  </div>
>>>>>>> b76cacec5453549032c80e31961b398134c7c861
    </div>
    <div class="panel-body">
       <?php echo $data->ejercicio;?>
        <?php if($check){?>
        <div class="porcentaje-ejercicio-evaluacion">
            <label><span>Porcentaje</span>
                <input type="text" name="Evaluacion[ejercicios][porcentaje][<?php echo $data->id_ejercicio; ?>]" value="<?php echo $model->ejercicios['porcentaje'][$data->id_ejercicio]?>"><span class="spn-porcentaje">%</span>
            </label>
        </div>
        <?php } ?>
    </div>
</div>
