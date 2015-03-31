<?php 
    $check = false;
?>
<div class="panel panel-success ejercicio" style="">
    <div class="panel-heading">
    <?php if( property_exists($model,"ejercicios") && isset($model->ejercicios) && count($model->ejercicios)>0){ ?>
        <?php if(array_search($data->id,$model->ejercicios['check']) !== false){ $check = true;?>
                     <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][check]['.$data->id.']', 1, array('value'=>$data->id))?> 
        <?php }else{ ?>
                      <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][check]['.$data->id.']', 0, array('value'=>$data->id))?> 
       <?php } ?>
    <?php }else{ ?>    
      <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicios][check]['.$data->id.']', 0, array('value'=>$data->id))?>
    <?php } ?>      
          <a class="full-scream-ejercicio" href="#" onclick="AbrirModal('Ejercico #<?php echo $data->id;?>','500px','90%','<?php echo Yii::app()->createAbsoluteUrl('ejercicios/view', array('id'=>$data->id)); ?>')"><i class="icon-fullscreen"></i></a>  </div>
    </div>
          </div>