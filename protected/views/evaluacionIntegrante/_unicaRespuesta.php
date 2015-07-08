<div class="opciones" id="op-<?php echo $id;?>">
    <div class="chk">
<?php
    $disable = count($respuestasHechas)>0?'disabled':'';
    $rand = rand();
    foreach ($data as $repuesta) {
        $r = EjerciciosRespuestaUsuario::model()->find('id_respuesta=?',array($repuesta->idRespuestaEjercicio));
        echo "<label>".CHtml::radioButton('respuesta['.$repuesta->id_ejercicio.']['.$rand.']',(!is_null($r)?true:false),array('value'=>$repuesta->idRespuestaEjercicio,$disable=>$disable)).$repuesta->respuesta_ejercicio."</label>";
    }
?>
    </div>
<?php
    echo CHtml::hiddenField('user_id',  Yii::app()->user->id);
    echo CHtml::hiddenField('tipo',  'u');
    echo CHtml::hiddenField('evaluacion_integrante_id',  $evaluacion_integrante_id);
?>
</div>