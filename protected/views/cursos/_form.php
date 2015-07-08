<?php
/**
 * @var Cursos model 
 */
if (Yii::app()->controller->action->id == 'update') {
    $url = "/cursos/update/" . $model->id;
} else {
    $url = "/cursos/create";
}
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cursos-form',
    'action' => Yii::app()->getBaseUrl('true') . $url,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => false
    ),
        ));
?>

<?php if (!$model->isNewRecord) { ?>

    <div id="form_curso">
        <p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>

        <?php #echo $form->errorSummary($model); ?>

        <div class="btn-group">
            <button class="btn dropdown-toggle btn-danger" data-toggle="dropdown">
                <i class="icon-cog icon-white"></i>
                Configuración
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#" onclick="AbrirModal('Temas del curso', '800px', '100%', '<?php echo Yii::app()->getBaseUrl(true) ?>/tema/create/<?php echo $model->id; ?>')" data-toggle="tooltip" data-placement="right" data-html='true' data-original-title="Agregar temas al curso, relacionados <br/>con <?php echo $model->materia->nombre_materia; ?>">Administrar Temas</a></li>
                <li><a href="#" onclick="AbrirModal('Estudiante del curso', '600px', '90%', '<?php echo Yii::app()->getBaseUrl(true) ?>/cursos/agregarEstudiantes/<?php echo $model->id; ?>')" data-toggle="tooltip" data-placement="right" data-original-title="Agregar usuarios no incritos a este curso.">Administrar Estudiantes</a></li>
                <li><a href="#" onclick="AbrirModal('Evaluaciónes del curso', '750px', '100%', '<?php echo Yii::app()->getBaseUrl(true) ?>/evaluacion/create/<?php echo $model->id; ?>')" data-toggle="tooltip" data-placement="right" data-original-title="Agregar usuarios no inscritos a este curso.">Administrar Evaluación</a></li>
                <li><a href="#" onclick="AbrirModal('Seguimiento', '750px', '100%', '<?php echo Yii::app()->getBaseUrl(true) ?>/seguimientoUsuarioCurso/create/<?php echo $model->id; ?>')" data-toggle="tooltip" data-placement="right" data-html='true' data-original-title="Realizar la gestión del seguimiento <br/>de las notas dentro del curso.">Administrar Seguimientos</a></li>
                <li><a href="#" onclick="AbrirModal('Códigos de acceso', '750px', '100%', '<?php echo Yii::app()->getBaseUrl(true) ?>/codigoIngresoCurso/admin/<?php echo $model->id; ?>')" data-toggle="tooltip" data-placement="right" data-html='true' data-original-title="Realice la gestion de códigos de acceso masivo a el curso.">Administrar Códigos de Acceso</a></li>
            </ul>
        </div>
    <?php } ?>
    <?php echo $form->textFieldRow($model, 'nombre_curso', array('class' => 'span5', 'maxlength' => 45)); ?>

    <?php echo $form->dropDownListRow($model, 'id_grado', CHtml::listData(Grado::model()->findAll(), 'id_grado', 'desc_verbal'), array('style' => '')) ?>

    <?php //$model->?>
    <?php
    echo $model->getAttributeLabel('fecha_inicio') . " - " . $model->getAttributeLabel('fecha_cierre') . "<br>";
    $this->widget('bootstrap.widgets.TbDateRangePicker', array(
        'name' => 'Cursos[fecha_inicio]',
        'value' => ($model->fecha_inicio != '' ? $model->fecha_inicio . ' - ' . $model->fecha_cierre : ''),
        'options' => array(
            'language' => 'es',
            'format' => 'YYYY-MM-DD',
            'minDate' => date('Y-m-d'),
            'locale' => array(
                'cancelLabel' => 'Cancelar',
                'applyLabel' => 'Aplicar',
                'fromLabel' => 'Desde',
                'toLabel' => 'Hasta',
                'close' => false,
            ),
            'callback' => 'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}',
        ),
        'htmlOptions' => array(
            'placeholder' => 'Fecha Inicio - Fecha Cierre',
            'style' => 'width:97.1% !important;',
        //'id'=>'Cursos_fecha_inicio_em_'
        ),
            )
    );
    ?>
    <div id="error-date"><?php echo $form->error($model, 'fecha_inicio'); ?></div>

    <label for="area" class="">Area</label>
    <?php
    echo CHtml::hiddenField('area', '', array('style' => 'width: 100%;'));
    $this->widget('ext.select2.ESelect2', array(
        'selector' => '#area',
        //  'model'=>$model,
        //  'attribute' => 'Usuarios[]',
        'data' => CHtml::listData(Area::model()->findAll('idestado=1'), 'id_area', 'descripcion'),
        'attribute' => 'area',
        'name' => 'area',
        'options' => array(
            'allowClear' => true,
            'placeholder' => 'Selecione un area',
            'initSelection'=>'js:function (element, callback) {
                                callback(data);
                            }',
            //'minimumInputLength' => 4, 
            'ajax' => array(
                'url' => Yii::app()->createUrl('area/listarAreasAjax'),
                'dataType' => 'json',
                'type' => 'GET',
                // 'quietMillis'=> 100,
                'data' => 'js: function(text,page) {
                                    return {
                                        term: text, 
                                        page_limit: 10,
                                        page: page,
                                    };
                                }',
                'results' => 'js:function(data,page) { var more = (page * 10) < data.total; return {results: data, more:more };
                             }',
                'formatResult' => 'js:function(data){
                                 return data.name;
                              }',
                'formatSelection' => 'js: function(data) {
                                return data.name;
                              }',
            ),
        ),
        'htmlOptions' => array(
            'events' => array('change' => 'js:function(){ alert("");}'),
        ),        
    ));
    ?>
     <?php echo $form->labelEx($model,'idmateria'); ?>    
    <?php
    $this->widget('ext.select2.ESelect2', array(
        'model' => $model,
        'attribute' => 'idmateria',
        'data' => array(),
        'htmlOptions' => array(
            'style' => 'width: 100%;'
        ),
        'options' => array(
            'placeholder' => 'Seleccione una aignatura.',
            'allowClear' => true,
        ),
            )
    );
    ?>

    <?php echo $form->error($model,'idmateria'); ?>

    <?php
    echo $form->dropDownListRow($model, 'state_curso', array('active' => 'Activo', 'inactive' => 'Inactivo'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
    ?>
    
    <?php echo $form->textAreaRow($model, 'descripcion_curso', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

    <?php if (!$model->isNewRecord) { ?>
        <?php echo $form->checkBoxRow($model, 'tiene_foro', array()); ?>
    <?php } ?>

    <?php echo CHtml::hiddenField('Contenidos[id]', $model->id); ?>


    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Crear' : 'Guardar',
        ));
        ?>
    </div>
</div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
    <?php
        if(!$model->isNewRecord)
        {
            Yii::app()->clientScript->registerScript("prueba","
                    $.ajax({
                      url:'".Yii::app()->createAbsoluteUrl('asignatura/obtenerDatosAsignatura')."',
                      dataType:'json',
                      type:'POST',
                      data: {'asignatura':". $model->idmateria ."},
                      success:function(data){
                          //console.log(data.asignatura.idmaterias);
                          $('#area').select2('data',{'id':data.area.id_area,'text':data.area.descripcion});
                        for(var i=0;i<data.asignaturas.length;i++){
                            $(\"#Cursos_idmateria\").append('<option value=\"'+data.asignaturas[i].idmaterias+'\">'+data.asignaturas[i].nombre_materia+'</option>');
                        }
                        $('#Cursos_idmateria').select2('data',{'id':data.asignatura.idmaterias,'text':data.asignatura.nombre_materia}); 
                      },
                      error:function(){
                          alert('Eror');
                      }
                });
            " );
        }
    ?>
    $('#area').on('select2-removed',function(){
        $("#Cursos_idmateria").empty();
        $("#select2-chosen-2").html("Seleccione una asignatura.");
        $("#select2-chosen-2").addClass('select2-chosen');
        $("#select2-chosen-2").parent().addClass('select2-choice select2-default');
    });
    $('#area').on('change', function () {
        if ($('#area').select2('data') != null) {
            $.ajax({
                'url': '<?php echo Yii::app()->createAbsoluteUrl('asignatura/listarAsignaturasXArea'); ?>',
                'dataType': 'json',
                'type': 'POST', 
                'data': $('#area').select2('data'),
                'success':function(data){                  
                    $("#Cursos_idmateria").empty();
                    for(var i=0;i<data.length;i++){
                       $("#Cursos_idmateria").append('<option value="'+data[i].id+'">'+data[i].text+'</option>');
                    }
                }
            });
        }
    });
</script>