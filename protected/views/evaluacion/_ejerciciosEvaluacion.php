<div class="panel panel-success ejercicio" style="">
    <div class="panel-heading">
    
  
      <div class="checkbox"><?php echo CHtml::checkBox('Evaluacion[ejercicio][]', 0, array())?>
          <a class="full-scream-ejercicio" href="#" onclick="AbrirModal('Ejercico #<?php echo $data->id_ejercicio;?>','500px','90%','<?php echo Yii::app()->createAbsoluteUrl('ejercicios/view', array('id'=>$data->id_ejercicio)); ?>')"><i class="icon-fullscreen"></i></a>  </div>
    </div>
    <div class="panel-body">
       <?php echo $data->ejercicio;?>
    </div>
          </div>