<?php
/**
 * @var EvaluacionIntegrante model
 */
if (strtotime(date('Y-m-d H:i:s')) < strtotime($model->idEvaluacion->fecha_fin)) {
    if (strtotime(date('Y-m-d H:i:s')) >= strtotime($model->idEvaluacion->fecha_inicio)) {
        if (is_null($model->fecha_fin)) {
            Yii::app()->clientScript->registerScriptFile(Yii::app()->getBaseUrl() . "/js/tree/file-tree.js");
            Yii::app()->clientScript->registerCssFile(Yii::app()->getBaseUrl() . "/css/tree/file-tree.min.css");
            if (count($model->idEvaluacion->ejerciciosEvaluacion) > 0) {
                if (is_null($model->fecha_inicio)) {
                    ?>
                    <div id="sec-realizar-evaluacion"class="alert">
                        <strong><h1>Atención!</h1></strong> <h4>El horario diseño para esta evaluación es <?php echo $model->idEvaluacion->fecha_inicio . " - " . $model->idEvaluacion->fecha_fin; ?>.<br/>Esta a punto de iniciar esta evaluación del curso, usted cuenta con <?php echo ceil((strtotime($model->idEvaluacion->fecha_fin) - strtotime(date('Y-m-d H:i:s'))) / 60); ?> miniutos para realizarla.El exámen se compone de preguntas de multiple selección o de unica respuesta.</h4>
                        <div class="sec-realizar-evaluacion-btn" style="text-align: center;padding-top: 4px">
                            <input type="button" value="Iniciar" id="btn-aceptar-evaluacion" class="btn btn-primary">
                            <input type="button" value="Cancelar" id="btn-cancelar-evaluacion" class="btn btn-danger">
                        </div>
                    </div>
                    <?php
                    Yii::app()->clientScript->registerScript("registroCurso", "$(document).on('click','#btn-aceptar-evaluacion',function(e){
        $(\"#sec-realizar-evaluacion\").hide('slow',function(){
            $.post('" . Yii::app()->createAbsoluteUrl('evaluacionIntegrante/iniciarEvaluacion', array('id' => $model->evaluacion_integrante_id)) . "',function(data){
                                jQuery('#countdown_dashboard').countDown({
				targetDate: {
					'day': 		data.day, // Put the date here
					'month': 	data.month, // Month
					'year': 	data.year, // Year
					'hour': 	data.hours,
					'min': 		data.minutes,
					'sec': 		data.seconds
				} //,omitWeeks: true
		});
                    $(\"#sec-form-evaluacion\").show(\"slow\"); 
            },'json');
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
                ?> 

                <div id="sec-form-evaluacion" style="display: <?php echo is_null($model->fecha_inicio) ? 'none' : 'inline-block' ?>">
                    <?php
                    if (!is_null($model->fecha_inicio)) {
                        $data = Utilidades::dividirFecha($model->idEvaluacion->fecha_fin);
                        Yii::app()->clientScript->registerScript("registrarReloj", ""
                                . "jQuery('#countdown_dashboard').countDown({
				targetDate: {
					'day': 		" . $data['day'] . ", 
					'month': 	" . $data['month'] . ",
					'year': 	" . $data['year'] . ", 
					'hour': 	" . $data['hours'] . ",
					'min': 		" . $data['minutes'] . ",
					'sec': 		" . $data['seconds'] . "
				},
                                onComplete: function(){
                                  $.post('" . Yii::app()->createAbsoluteUrl('evaluacionIntegrante/terminarEvaluacion', array('id' => $model->evaluacion_integrante_id)) . "',function(data){
                                            $('#sec-form-evaluacion').html('<center><h3><strong>Evaluación finalizada</strong></h3></center><div class=\'\'><div class=\'row\'><div style=\'margin-top: 3px;\' id=\'ejercicios-buenos\' class=\"span10 alert alert-success\">Cantidad de ejercicios buenos: '+data.Nbuenas+'</div></div></div>');
                                            $('#sec-form-evaluacion').append('<div  class=\'row\'><div id=\'ejercicios-malos\' style=\'margin-top: 3px;\' class=\'span10 alert alert-error\'></div></div>');
                                            $('#ejercicios-buenos').append('<ul></ul>');
                                            $.each(data.resultados['buenas'],function(i,e){
                                                for(x in e){
                                                    $('#ejercicios-buenos ul').append('<li>'+e[x].ejercicio+'</li>');
                                                }
                                            });
                                            $('#ejercicios-malos').append('Cantidad de ejercicios malos: '+data.Nmalas+'<br/>');
                                            $('#ejercicios-buenos').append('<ul></ul>');
                                            $.each(data.resultados['malas'],function(i,e){
                                                for(x in e){
                                                    $('#ejercicios-malos').append('<li>'+e[x].ejercicio+'</li>');
                                                }
                                            });                                            
                                           $('#sec-form-evaluacion').append('<div  class=\'row\'><div id=\'nota_final\' style=\'margin-top: 3px;\' class=\'span10 alert alert-info\'><h4 style=\'color: #131313;\'>Nota Final: '+data.notaFinal+'</h4></div></div>');
                                    },'json');
                                }
		});
    ", CClientScript::POS_END);
                    }

                    $this->renderPartial('_relojEvaluacion', array());
                    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id' => 'evaluacion-integrante-form',
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                    <p class="help-block"><?php echo Yii::t('polimsn', 'Fields with <span class="required">*</span> are required.'); ?></p>
                    <div class="">
                        <?php echo $form->errorSummary($model); ?>
                    </div>

                    <div id="temas_evaluar">
                        <?php
                        $this->widget('bootstrap.widgets.TbListView', array(
                            'id' => 'list-ejecrcicios-evaluacion',
                            'dataProvider' => $model->cargarEjercicosEvaluacion(),
                            'itemView' => '_ejerciciosEvaluacion',
                            'viewData' => array('model' => $model, 'evaluacion_id' => $model->id_evaluacion),
                            'enablePagination' => false,
                        ));
                        ?>
                    </div>
                        
                    <div id="list-temas-evaluacion" class="contenido-evaluacion bs-docs-temas">
                        <ul>
                            <?php
                                $this->widget('bootstrap.widgets.TbListView', array(
                                    'id' => 'list-temas-evaluacion',
                                    'dataProvider' => $model->obtenerTemasEvaluacion(),
                                    'itemView' => '_temasEvaluacion',
                                    'viewData' => array('model' => $model),
                                    'enablePagination' => false,
                                ));
                        ?>
                        </ul>
                    </div>

                    <?php echo $form->hiddenField($model, 'evaluacion_integrante_id', array('class' => 'span5')); ?>

                    <?php echo $form->hiddenField($model, 'id_evaluacion', array('class' => 'span5')); ?>

                    <?php echo $form->hiddenField($model, 'state_evalucacion_integrante', array('class' => 'span5', 'maxlength' => 8)); ?>

                    <?php echo $form->hiddenField($model, 'id_integrante_curso', array('class' => 'span5')); ?>

                    <?php echo CHtml::hiddenField('terminar_evaluacion', 0); ?>

                    <div class="form-actions">
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'type' => 'primary',
                            'label' => $model->isNewRecord ? 'Crear' : 'Guardar',
                        ));

                        $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'type' => 'danger',
                            'label' => 'Terminar evaluación',
                            'htmlOptions' => array(
                                'id' => 'btn_terminar_evaluacion',
                                'style' => 'margin-left: 10px;'
                            )
                        ));
                        ?>

                    </div>

                    <?php $this->endWidget(); ?>
                </div>

                <?php
                $this->beginWidget('bootstrap.widgets.TbModal', array(
                    'id' => 'terminar-evaluacion-modal',
                    'autoOpen' => false
                        )
                );
                ?>
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">&times;</a>
                    <h3> <?php echo Yii::t('polimsn', 'end assessment'); ?></h3>
                </div>
                <div class="modal-body">
                    <?php echo Yii::t('polimsn', 'Is about to complete the evaluation, this is what you want to do?'); ?>
                </div>
                <div class="modal-footer">
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'button',
                        'type' => 'primary',
                        'label' => 'Aceptar',
                        'htmlOptions' => array(
                            'id' => 'termnar-evaluacion-aceptar'
                        )
                    ));

                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'button',
                        'type' => 'danger',
                        'label' => 'Cancelar',
                        'htmlOptions' => array(
                            'id' => 'termnar-evaluacion-cancelar'
                        )
                    ));
                    ?>
                </div>
                <?php $this->endWidget(); ?>   


                <script type="text/javascript">
                    $("#btn_terminar_evaluacion").click(function (e) {
                        $("#terminar-evaluacion-modal").modal('show');
                        e.preventDefault();
                    });
                    $('#termnar-evaluacion-cancelar').click(function () {
                        $("#terminar-evaluacion-modal").modal('hide');
                    });
                    $('#termnar-evaluacion-aceptar').click(function () {
                        $('#terminar_evaluacion').val(1);
                        $("#evaluacion-integrante-form").submit();
                    });
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
                <?php Yii::app()->clientScript->registerCss('hideSumary', '.summary{display:none;}'); ?>
            <?php } else { ?>
                <div class="alert alert-block">
                    <h4>Atención</h4>
                    <?php echo Yii::t('polimsn', 'There is no exercise associated with this evaluation') ?>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning" style="">
                <h4 style="color: rgb(0, 0, 0);">Evaluación finalizada</h4>
                <br/><?php echo "Esta evaluación ya finalizo. A continuación podrás visualizar los resultados."; ?>
            </div>
            <?php
            Yii::app()->clientScript->registerScript('cargarResultados', ''
                    . " $.post('" . Yii::app()->createAbsoluteUrl('evaluacionIntegrante/terminarEvaluacion', array('id' => $model->evaluacion_integrante_id)) . "',{'no_guardad':1},function(data){
                                            $('#sec-form-evaluacion').html('<div class=\'\'><div class=\'row\'><div style=\'margin-top: 3px;\' id=\'ejercicios-buenos\' class=\"span10 alert alert-success\">Cantidad de ejercicios buenos: '+data.Nbuenas+'</div></div></div>');
                                            $('#sec-form-evaluacion').append('<div  class=\'row\'><div id=\'ejercicios-malos\' style=\'margin-top: 3px;\' class=\'span10 alert alert-error\'></div></div>');
                                            $('#ejercicios-buenos').append('<ul></ul>');
                                            $.each(data.resultados['buenas'],function(i,e){
                                                for(x in e){
                                                    $('#ejercicios-buenos ul').append('<li>'+e[x].ejercicio+'</li>');
                                                }
                                            });
                                            $('#ejercicios-malos').append('Cantidad de ejercicios malos: '+data.Nmalas+'<br/>');
                                            $('#ejercicios-buenos').append('<ul></ul>');
                                            $.each(data.resultados['malas'],function(i,e){
                                                for(x in e){
                                                    $('#ejercicios-malos').append('<li>'+e[x].ejercicio+'</li>');
                                                }
                                            });                                            
                                           $('#sec-form-evaluacion').append('<div  class=\'row\'><div id=\'nota_final\' style=\'margin-top: 3px;\' class=\'span10 alert alert-info\'><h4 style=\'color: #131313;\'>Nota Final: '+data.notaFinal+'</h4></div></div>');
                                    },'json');",  CClientScript::POS_END);
            ?>
            <div id="sec-form-evaluacion" style="display:inline-block"></div>

                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning" style="">
                <h4 style="color: rgb(0, 0, 0);">Lo sentimos :)</h4>
                <br/><?php echo "Esta evaluación aun no a iniciado. Su programación se diseño en el siguiente horario " . $model->idEvaluacion->fecha_inicio . " - " . $model->idEvaluacion->fecha_fin; ?>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-warning" style="  background-color: #777777!important;text-shadow: none">
            <h4 style="color: rgb(187, 32, 32);">Lo sentimos :(</h4>
            <br/><?php echo "La fecha de esta evaluacón ya expiro. Su programación se diseño en el siguiente horario " . $model->idEvaluacion->fecha_inicio . " - " . $model->idEvaluacion->fecha_fin; ?>
        </div>
    <?php } ?>