<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'contenidos-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
        'validateOnType' => false
    ),
        ));
?>
<div id="form_contenidos">

    <p class="help-block">Los campos identificados con <span class="required">*</span> son requeridos.</p>
    <?php
    echo $form->dropDownListRow($model, 'state_contenido', array('active' => 'Activo', 'inactive' => 'Inactivo'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
    ?>
    <?php echo $form->textFieldRow($model, 'titulo', array('class' => 'span5', 'maxlength' => 55)); ?>
        <?php echo  $form->labelEx($model,'texto');?>
        <?php
        $this->widget('bootstrap.widgets.TbHtml5Editor', array(
            'name' => 'Contenidos[texto]',
            'width' => '98%',
            'value' => $model->texto
                )
        );
        ?> 
        <?php echo $form->error($model, 'texto'); ?>
    <?php #echo $form->textAreaRow($model,'texto',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

    <?php echo $form->textAreaRow($model, 'observacion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
    <div id="contenidos_cursos">
        <?php
        // $contenido = new ContenidosController(-1);
        $this->widget('bootstrap.widgets.TbTabs', array(
            'id' => 'contenidos',
            'type' => 'tabs',
            'tabs' => array(
                array('id' => 'contenidos', 'label' => 'Contenidos Multimedia', 'content' => $this->renderPartial('application.views.imgVideosSonido._contenido', array('model' => new ImgVideosSonido(), 'id_contenido' => $model->id), true), 'active' => true,),
            ),
            'events' => array('shown' => '')
                )
        );
        ?>
        <?php echo CHtml::hiddenField('Contenidos[id]', $model->id); ?>
        <?php 
            if(isset($_GET['idTaller']))
                echo CHtml::hiddenField('idTaller', $_GET['idTaller']); ?>
    </div>
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

<!-- Modal -->
<div id="contenidos-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Nuevo contenido</h3>
    </div>
    <div class="modal-body-contenidos">
        <?php
        $model2 = new ImgVideosSonido();
        $model2->type = 'video';
        echo $this->renderPartial('application.views.imgVideosSonido.create', array('model' => $model2, 'cursoSeccion' => true, 'Contenidomodel' => $model), true);
        ?>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <button class="btn btn-primary" id="guargar-contenido">Guardar</button>
    </div>
</div>



<script>
    $(document).on('ready', function() {
        // $('#field-imagen').prev().prev().css('display', 'none');
    });
    $(document).on('click', '#agregarContenido', function(e) {
        change(this);
        $('#contenidos-modal').modal('show');
        e.preventDefault();
    });
    $(document).on('click', '#guargar-contenido', function(e) {
        console.log('entro');
        $('#img-videos-sonido-form').submit();
        e.preventDefault();
    });

    $(document).on('submit', '#img-videos-sonido-form', function(e) {
        e.preventDefault();
    });

//    $(document).on('change', '#ImgVideosSonido_type', function() {
//        data = $('#img-videos-sonido-form').serialize();
//        document.getElementById('img-videos-sonido-form').remove();
//        $('.modal-body').load('<?php echo Yii::app()->getBaseUrl(true); ?>/ImgVideosSonido/LoadFormulario',data,function(){});
//    });
    function change(e)
    {
        $('#multimedia').empty();
        if ($('#ImgVideosSonido_type').val() == 'video') {
            $('#multimedia').html('<label  style="display: inline" class="required" for="ImgVideosSonido_url">Componente Multimedia <span class="required">*</span></label><a href="http://player.vimeo.com/video/4116721" target="_blank" style="display: inline">Cómo subir vídeos.</a><input type="text" id="ImgVideosSonido_url" name="ImgVideosSonido[url]" title="" data-placement="top" data-toggle="tooltip" maxlength="100" class="span5" data-original-title="Debe agregar una ruta unicamente de vimeo."><div style="display:none" id="ImgVideosSonido_url_em_" class="help-block error"></div>');
        } else if ($('#ImgVideosSonido_type').val() == 'img') {
            $('#multimedia').html('<label class="required" for="ImgVideosSonido_url">Componente Multimedia <span class="required">*</span></label><input type="hidden" name="ImgVideosSonido[url]" value="" id="ytImgVideosSonido_url"><input type="file" id="ImgVideosSonido_url" name="ImgVideosSonido[url]" style="" maxlength="100" class="span5 "><div style="display:none" id="ImgVideosSonido_url_em_" class="help-block error"></div>  ');
        }
        //console.log(e.parent().serializeArray());  
    }
    /**
     * Este metodo se encarga de hacer un respaldo del html del formulario que se esta almacenando
     * @param {type} from
     * @param {type} data
     * @param {type} hasError
     * @returns {undefined}
     */
    function saveForm(from, data, hasError)
    {
        console.log(from);
        console.log(data);
        console.log(hasError);
        //No tiene mas errores.
        if (!hasError)
        {
            var formData = new FormData();
            var other_data = $('#img-videos-sonido-form').serializeArray();
            if ($('#ImgVideosSonido_type').val() == 'img') {
                var fileInput = document.getElementById('ImgVideosSonido_url');
                var file = fileInput.files[0];
                formData = new FormData();
                formData.append('ImgVideosSonido[url]', file);
            } else {
                url = 'vimeo.com/';

                if ($('#ImgVideosSonido_url').val().toLowerCase().search(url) == -1) {
                    console.log('entroasdfasdf');
                    $('#img-videos-sonido-form_es_').children('ul').append('<ul><li>Componente Multimedia debe ser una url valida de vimeo.</li></ul>')
                    $('#img-videos-sonido-form_es_').css('display', 'block');
                    $('#ImgVideosSonido_url_em_').html('Componente Multimedia debe ser una url valida de vimeo.');
                    $('#ImgVideosSonido_url_em_').css('display', 'block');
                    return;
                }
            }

            $.each(other_data, function(key, input) {
                formData.append(input.name, input.value);
            });
            console.log('continua');
            formData.append('ajaxview', 'content');
            formData.append('dataType', 'JSON');
            jQuery.ajax({
                'success': function(e) {
                    if (e.rpt == true) {
                        $('#contenidos-modal').modal('hide');
                        $('#contenidos_cursos').load("<?php echo Yii::app()->getBaseUrl(true); ?>/ImgVideosSonido/LoadMultimediaByContent", 'id_contenido=<?php echo $model->id; ?>');
                        $('#img-videos-sonido-form').each(function() {
                            this.reset();
                        });
                    } else {
                        console.log(e);
                    }
                },
                'type': 'POST',
                'url': '<?php echo Yii::app()->getBaseUrl(true) . '/ImgVideosSonido/saveMultimediaContent'; ?>',
                'cache': false,
                'data': formData,
                'contentType': false,
                'processData': false,
                'dataType': 'JSON'
            });
        }
    }

    function beforeValidate(form)
    {
        if (document.getElementById('ImgVideosSonido_type').value == 'img')
        {
            document.getElementById('ImgVideosSonido_name_img').value = document.getElementById('ImgVideosSonido_url').value;
        }
        return true;
    }

</script>

<style type="text/css">
    body .modal {
        width: 54%; /* desired relative width */
        left: 22%; /* (100%-width)/2 */
        /* place center */
        margin-left:auto;
        margin-right:auto; 
    }
    .modal-body-contenidos {
        max-height: 400px;
        overflow-y: auto;
        padding: 15px;
        position: relative;
    }
</style>