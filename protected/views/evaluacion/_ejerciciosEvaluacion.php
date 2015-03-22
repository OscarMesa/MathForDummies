<div class="panel panel-success ejercicio" style="">
    <div class="panel-heading">
    <?php if(isset($model->ejercicios) && count($model->ejercicios)>0){;?>
        <?php if(array_search($data->id_ejercicio,$model->ejercicios) !== false){?>
                     <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][]', 1, array('value'=>$data->id_ejercicio))?> 
        <?php }else{ ?>
                      <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][]', 0, array('value'=>$data->id_ejercicio))?> 
       <?php } ?>
    <?php }else{ ?>    
      <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][]', 0, array('value'=>$data->id_ejercicio))?>
    <?php } ?>      
          <a class="full-scream-ejercicio" href="#" onclick="AbrirModal('Ejercico #<?php echo $data->id_ejercicio;?>','500px','90%','<?php echo Yii::app()->createAbsoluteUrl('ejercicios/view', array('id'=>$data->id_ejercicio)); ?>')"><i class="icon-fullscreen"></i></a>  </div>
    </div>
    <div class="panel-body">
       <?php echo $data->ejercicio;?>
    </div>
          </div>