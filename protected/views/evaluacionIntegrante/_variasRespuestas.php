<div class="opciones" id="op-<?php echo $id;?>">
    <div class="chk">
<?php
    $disable = count($respuestasHechas)>0?'disabled':'';
    foreach ($data as $repuesta) {
        $r = EjerciciosRespuestaUsuario::model()->find('id_respuesta=?',array($repuesta->idRespuestaEjercicio));
        echo "<label>".CHtml::checkBox('respuesta['.$repuesta->id_ejercicio.']['.$repuesta->idRespuestaEjercicio.']',(!is_null($r)?true:false),array($disable=>$disable,'name'=>'respuesta['.$repuesta->id_ejercicio.']['.$repuesta->idRespuestaEjercicio.']')).$repuesta->respuesta_ejercicio."</label>";
    }
?>
    </div>    
<?php        
echo CHtml::hiddenField('user_id',  Yii::app()->user->id);
echo CHtml::hiddenField('tipo',  'v');
echo CHtml::hiddenField('evaluacion_integrante_id',  $evaluacion_integrante_id);
?>
</div>