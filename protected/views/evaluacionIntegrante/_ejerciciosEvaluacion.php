<div class="ejercicio-evaluacion well well-small" style="">
    <?php echo $data->ejercicio; ?><span class="required"> *</span>

    <div class="accordion" id="accordion<?php echo $data->id_ejercicio; ?>">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion<?php echo $data->id_ejercicio; ?>" href="#collapseEjercios<?php echo $data->id_ejercicio; ?>">
                    Contenidos
                </a>
            </div>
            <div id="collapseEjercios<?php echo $data->id_ejercicio; ?>" class="accordion-body collapse">
                <div class="accordion-inner">
                    <?php
                    $i = 1;
                    foreach ($data->contenidos_ejercicios as $contenido) {
                        ?><?php
                        $this->renderPartial('_contenidosEvaluacion', array('data' => $contenido->contenido));
                        ?><?php
                    }
                    ?>
                </div>
            </div> 
        </div>  
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion<?php echo $data->id_ejercicio; ?>" href="#collapseRespuestas<?php echo $data->id_ejercicio; ?>">
                    Respuestas
                </a>
            </div>
            <div id="collapseRespuestas<?php echo $data->id_ejercicio; ?>" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <?php 
                        $b = 'v';
                        if(isset($data->respuestas) && isset($data->respuestas[0])){
                           if($data->respuestas[0]->cantidad > 1){
                               $b = 'v';$respuestasHechas = $this->buscarRespuestasActivas($data->respuestas);
                               $this->renderPartial('_variasRespuestas',array(
                                   'data'=>$data->respuestas,
                                   'id' =>$data->id_ejercicio,
                                   'respuestasHechas' => $respuestasHechas,
                                   'evaluacion_integrante_id' => $model->evaluacion_integrante_id
                               ));
                               echo "<div class='errorEnvio alert alert-error' style='display:none'>".Yii::t('polimsn', 'You must select one or more of the options')."</div>";
                               echo "<div class='exitoMsn alert alert-success' style='display:none'>".Yii::t('polimsn', 'You must select an option')."</div>";
                           }else{
                               $b = 'u';$respuestasHechas = $this->buscarRespuestasActivas($data->respuestas);
                               $this->renderPartial('_unicaRespuesta',array(
                                   'data'=>$data->respuestas,
                                   'id' =>$data->id_ejercicio,
                                   'respuestasHechas' => $respuestasHechas,
                                   'evaluacion_integrante_id' => $model->evaluacion_integrante_id
                               ));
                               echo "<div class='errorEnvio alert alert-error' style='display:none'>".Yii::t('polimsn', 'You must select an option')."</div>";
                               echo "<div class='exitoMsn alert alert-success' style='display:none'>".Yii::t('polimsn', 'You must select an option')."</div>";
                           }
                           echo "<div class='ctn-envioRepuesta'>".CHtml::button('Enviar respuesta', array('class'=>'btn btn-success btn-envioRepuesta','tipoEnvio'=>$b,'style'=>'display:'.(count($respuestasHechas)<=0?'inline-block':'none'))).CHtml::button('Editar respuesta', array('class'=>'btn btn-warning btn-editarRepuesta','style'=>'display:'.(count($respuestasHechas)>0?'inline-block':'none'),'tipoEnvio'=>$b))."<img src='".Yii::app()->getBaseUrl()."/themes/OzAuLink/images/ajax-loader.gif' style='display:none;margin-left: 10px;' class='img-load'/></div>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    Yii::app()->clientScript->registerScript('acordeon',''
        . '$("#accordion'.$data->id_ejercicio.'").collapse();'
        ,CClientScript::POS_END);
    
//    Yii::app()->clientScript->registerScript('btn-envioRepuesta',''
//        . ''
//        ,CClientScript::POS_END);
?>