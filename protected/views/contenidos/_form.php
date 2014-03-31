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
    echo $form->dropDownListRow($model, 'state_contenido', array('true' => 'Activo', 'false' => 'Inactivo'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
    ?>
    <?php echo $form->textFieldRow($model, 'titulo', array('class' => 'span5', 'maxlength' => 55)); ?>
    <?php
    $this->widget('bootstrap.widgets.TbHtml5Editor', array(
        'name' => 'texto',
        'width' => '98%',
            )
    );
    ?>   
    <?php #echo $form->textAreaRow($model,'texto',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

    <?php echo $form->textAreaRow($model, 'observacion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
    <div id="contenidos_cursos">
        <?php
        // $contenido = new ContenidosController(-1);
        $this->widget('bootstrap.widgets.TbTabs', array(
            'id' => 'contenidos',
            'type' => 'tabs',
            'tabs' => array(
                array('id' => 'contenidos', 'label' => 'Contenidos Multimedia', 'content' => $this->renderPartial('application.views.imgVideosSonido._contenido', array('model' => new ImgVideosSonido(), 'id_contenido'=>$model->id), true), 'active' => true,),
            ),
            'events' => array('shown' => '')
                )
        );
        ?>
    </div>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
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
    <div class="modal-body">
        <?php echo $this->renderPartial('application.views.imgVideosSonido.create', array('model' => new ImgVideosSonido(), 'cursoSeccion' => true), true); ?>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <button class="btn btn-primary" id="guargar-contenido">Guardar</button>
    </div>
</div>



<script>
    $(document).on('ready', function() {
        $('#field-imagen').prev().css('display', 'none');
    });
    $(document).on('click', '#agregarContenido', function(e) {
        $('#contenidos-modal').modal('show');
        e.preventDefault();
    });
    $(document).on('click', '#guargar-contenido', function(e) {
        $('#img-videos-sonido-form').submit();
        e.preventDefault();
    });

    $(document).on('submit', '#img-videos-sonido-form', function(e) {
        e.preventDefault();
    });

    $(document).on('change', '#ImgVideosSonido_type', function() {
        console.log()
                ;
        if ($('#ImgVideosSonido_type').find(":selected").val() == 'img') {
            $('#field-video').css('display', 'none');
            $('#field-video').prev().css('display', 'none');
            $('#field-imagen').css('display', 'block');
            $('#field-imagen').prev().css('display', 'block');

        } else if ($('#ImgVideosSonido_type').find(":selected").val() == 'video') {
            $('#field-video').css('display', 'block');
            $('#field-video').prev().css('display', 'block');
            $('#field-imagen').css('display', 'none');
            $('#field-imagen').prev().css('display', 'none');
        }
    });

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

            var fileInput = document.getElementById('field-imagen');
            var file = fileInput.files[0];
            var formData = new FormData();
            formData = new FormData();
            formData.append('ImgVideosSonido[url]', file);
            var other_data = $('#img-videos-sonido-form').serializeArray();
            $.each(other_data, function(key, input) {
                formData.append(input.name, input.value);
            });
            formData.append('ajaxview', 'content');
            formData.append('dataType', 'JSON');
            console.log('--------------');
            console.log(formData);
            console.log('--------------');
                jQuery.ajax({
                'success': function(e) {
                    if (e.respuesta == true) {
                        $(body).load("<?php echo Yii::app()->getBaseUrl(true); ?>/lugar/nuevoSitio", 'id_lugar_new=' + e.id_lugar);
                    } else {
                        $("#contenedor").html(e.content);
                    }
                },
                'type': 'POST',
                'url': '<?php echo Yii::app()->getBaseUrl(true) . '/contenidos/saveMultimediaContent'; ?>',
                'cache': false,
                'data': formData,   
                'contentType': false,
                'processData': false,
                'dataType': 'JSON'
            });
        }
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
</style>