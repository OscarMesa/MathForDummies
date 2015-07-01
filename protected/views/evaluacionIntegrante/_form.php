<?php
/**
 * @var EvaluacionIntegrante model
 */
if(strtotime(date('Y-m-d H:i:s')) < strtotime($model->idEvaluacion->fecha_fin)){
Yii::app()->clientScript->registerScriptFile(Yii::app()->getBaseUrl() . "/js/tree/file-tree.js");
Yii::app()->clientScript->registerCssFile(Yii::app()->getBaseUrl() . "/css/tree/file-tree.min.css");
if (count($model->idEvaluacion->ejerciciosEvaluacion) > 0) {
    if (is_null($model->fecha_inicio)) {
        ?>
        <div id="sec-realizar-evaluacion"class="alert">
            <strong><h1>Atención!</h1></strong> <h4>Esta a punto de iniciar esta evaluación del curso, una ves acepte tendrá <?php echo ceil((strtotime($model->idEvaluacion->fecha_fin) - strtotime($model->idEvaluacion->fecha_inicio)) / 60); ?> miniutos para realizarla.El exámen se compone de preguntas de multiple selección o de unica respuesta.</h4>
            <div class="sec-realizar-evaluacion-btn" style="text-align: center;padding-top: 4px">
                <input type="button" value="Aceptar" id="btn-aceptar-evaluacion" class="btn btn-primary">
                <input type="button" value="Cancelar" id="btn-cancelar-evaluacion" class="btn btn-danger">
            </div>
        </div
        <?php
        Yii::app()->clientScript->registerScript("registroCurso", "$(document).on('click','#btn-aceptar-evaluacion',function(e){
        $(\"#sec-realizar-evaluacion\").hide('slow',function(){
            $.post('" . Yii::app()->createAbsoluteUrl('evaluacionIntegrante/iniciarEvaluacion', array('id' => $model->evaluacion_integrante_id)) . "',function(){
                $(\"#sec-form-evaluacion\").show(\"slow\"); 
            });
        });
    });
    
    $(document).on('click','#btn-cancelar-evaluacion',function(e){
        window.history.back();
    });");
        ?>
    <?php } ?>
       <?php 
       Yii::import('application.vendors.Utilidades');
//           echo $model->idEvaluacion->fecha_fin.'<br/>';
//           echo $model->idEvaluacion->fecha_inicio.'<br/>';
//           echo "<pre>"; print_r(Utilidades::timestampToHuman(strtotime($model->idEvaluacion->fecha_fin)-strtotime($model->idEvaluacion->fecha_inicio)));echo"</pre>";
       $this->renderPartial('_relojEvaluacion',array());
        
        ?> 

    <div id="sec-form-evaluacion" style="display: <?php echo is_null($model->fecha_inicio) ? 'none' : 'inline-block' ?>">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'evaluacion-integrante-form',
            'enableAjaxValidation' => false,
        ));
        
        ?>

        <p class="help-block"><?php echo Yii::t('polimsn', 'Fields with <span class="required">*</span> are required.'); ?></p>
        <div class="">
            <?php echo $form->errorSummary($model); ?>

            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'id' => 'list-ejecrcicios-evaluacion',
                'dataProvider' => $model->cargarEjercicosEvaluacion(),
                'itemView' => '_ejerciciosEvaluacion',
                'viewData' => array('model' => $model),
                'sortableAttributes' => array(
                    'name',
                ),
            ));
            ?>
        </div>

        <?php echo $form->hiddenField($model, 'evaluacion_integrante_id', array('class' => 'span5')); ?>

        <?php echo $form->hiddenField($model, 'id_evaluacion', array('class' => 'span5')); ?>

        <?php echo $form->hiddenField($model, 'state_evalucacion_integrante', array('class' => 'span5', 'maxlength' => 8)); ?>

        <?php echo $form->hiddenField($model, 'id_integrante_curso', array('class' => 'span5')); ?>

        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => $model->isNewRecord ? 'Crear' : 'Guardar',
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>

    <script type="text/javascript">
        $('.btn-editarRepuesta').click(function () {
            var bt = $(this);
            $.each(bt.parent().parent().find('.opciones .chk :input'), function (i, e) {
                $(e).removeAttr("disabled");
            });
            bt.css('display', 'none');
            bt.parent().find('.btn-envioRepuesta').css('display', 'inline-block');
        });

        $('.btn-envioRepuesta').click(function (e) {
            var bt = $(this);
            var normalMsn = '<?php echo Yii::t('polimsn', 'You must select an option'); ?>';
            bt.parent().parent().find('.errorEnvio').css('display', 'none');
            $(this).parent().find('.img-load').css('display', 'inline-block');
            if (bt.parent().parent().find('.opciones .chk :input').serializeArray().length > 0) {
                $.post('<?php echo Yii::app()->createAbsoluteUrl('evaluacionIntegrante/guardarEjercicio'); ?>', bt.parent().parent().find('.opciones :input').serialize(), function (data) {
                    bt.parent().find('.img-load').css('display', 'none');
                    bt.parent().parent().find('.errorEnvio').html(data.mensaje);
                    if (data.error == 0) {
                        $.each(bt.parent().parent().find('.opciones .chk :input'), function (i, e) {
                            $(e).attr("disabled", true);
                        });
                        bt.css('display', 'none');
                        bt.parent().find('.btn-editarRepuesta').css('display', 'inline-block');
                        mensajError(data.mensaje, bt, '.exitoMsn');
                    } else {
                        mensajError(data.mensaje, bt, '.errorEnvio');
                    }
                }, 'json')
            } else {
                mensajError(normalMsn, bt, '.errorEnvio');
                bt.parent().find('.img-load').css('display', 'none');
            }
        });

        function mensajError(mensaje, bt, clase)
        {
            var e = bt.parent().parent().find(clase);
            bt.parent().parent().find(clase).html(mensaje);
            bt.parent().parent().find(clase).css('display', 'block');
            setTimeout(function () {
                e.fadeOut('fast');
            }, 3000);
        }
    </script>
<?php } else { ?>
    <div class="alert alert-block">
        <h4>Atención</h4>
        <?php echo Yii::t('polimsn', 'There is no exercise associated with this evaluation') ?>
    </div>
<?php }
}else{ ?>
    <div class="alert alert-warning" style="  background-color: #777777!important;text-shadow: none">
        <h4 style="color: rgb(187, 32, 32);">Lo sentimos :(</h4>
        <br/><?php echo  "La fecha de esta evaluacón ya expiro. Su programación se diseño en el siguiente horario ".$model->idEvaluacion->fecha_inicio." y ".$model->idEvaluacion->fecha_fin;?>
    </div>
<?php } ?>