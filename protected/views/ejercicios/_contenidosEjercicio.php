<?php 
    $check = false;
?>
<div class="panel panel-success contenido span4" style="">
    <div class="panel-heading">
    <?php if( property_exists($model,"contenidos") && isset($model->contenidos) && count($model->contenidos)>0){ ?>
        <?php if(array_search($data->id,$model->contenidos['check']) !== false){ $check = true;?>
                     <div class="checkbox"><?php echo CHtml::checkBox('Ejercicios[contenidos][check]['.$data->id.']', 1, array('value'=>$data->id))?> 
        <?php }else{ ?>
                     <div class="checkbox"><?php echo CHtml::checkBox('Ejercicios[contenidos][check]['.$data->id.']', 0, array('value'=>$data->id))?> 
       <?php } ?>
    <?php }else{ ?>    
      <div class="checkbox"><?php echo CHtml::checkBox('Ejercicios[contenidos][check]['.$data->id.']', 0, array('value'=>$data->id))?>
    <?php } ?>      
          <a class="full-scream-ejercicio" href="#" onclick="AbrirModal('Contenido #<?php echo $data->id;?>','500px','90%','<?php echo Yii::app()->createAbsoluteUrl('contenidos/view', array('id'=>$data->id)); ?>')"><i class="icon-fullscreen"></i></a>  </div>
    </div>
    <div class="panel-body">
       <h5><?php echo $data->titulo; ?></h5>
        <?php if($check){?>
        <div class="order-contenido-ejercicio">
            <label><span>Orden</span>
                <input type="text" name="Ejercicios[contenidos][orden][<?php echo $data->id; ?>]" value="<?php echo $model->contenidos['orden'][$data->id]; ?>">
            </label>
        </div>
        <?php } ?>
    </div>
</div>