<div class="content-examen" style="">
    <div class="content-img-examen">
    <a href="<?php echo Yii::app()->createAbsoluteUrl('evaluacionIntegrante/create',array('id_evaluacion'=>$data->id_evaluacion));?>" class="img-evalucion">
        <img src="<?php echo Yii::app()->createAbsoluteUrl('themes/OzAuLink/images/evaluacion.png')?>"/>
    </a>
    </div><br/>
    <span class="content-description">
        <em>Duración del exámen: <?php echo ceil((strtotime($data->fecha_fin) - strtotime($data->fecha_inicio)) / 60); ?> minutos.</em><br/>
    </span>
</div>