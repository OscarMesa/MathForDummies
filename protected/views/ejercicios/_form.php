<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'ejercicios-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->dropDownListRow($model, 'state_ejercicios', array('active' => 'Activo', 'inactive' => 'Inactivo'), array('style' => 'width:100%')) ?> 

<?php echo $form->dropDownListRow($model, 'idMateria', CHtml::listData(Materias::model()->findAll(), 'idmaterias', 'nombre_materia')); ?>

<?php echo $form->textAreaRow($model, 'ejercicio', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->hiddenField($model, 'idusuariocreador', array('class' => 'span5', 'value' => Yii::app()->user->getId())); ?>

<?php echo $form->dropDownListRow($model, 'idDificultad', CHtml::listData(Dificultad::model()->findAll(), 'idDificultad', 'descripcion')); ?>

<?php echo $form->dropDownListRow($model, 'visible', array('Publico' => 'publico', 'Privado' => 'privado'), array('style' => 'width:100%')) ?> 

<?php if (!$model->isNewRecord): ?>
    <div id="contenidos-virtuales">
        <label for="contenidos[]">Contenidos</label>
        <div class="row-fluid">
            <div class="bql-evaluacion-content">
                <?php
                $this->widget('bootstrap.widgets.TbListView', array(
                    'id' => 'list-evaluaciones-items',
                    'dataProvider' => $Mcontenidos->searchForContenido(),
                    'emptyText' => Yii::t('polimsn', 'not content associated with your user they found').".",
                    'itemView' => '_contenidosEjercicio',
                    'viewData' => array('model' => $model),
                    'sortableAttributes' => array(
                    ),
                ));
                ?>

            </div>
        </div>
    <?php echo $form->error($model, 'ejercicios', array('class' => 'help-block error', 'maxlength' => 10, 'style' => 'margin-top: 7px;')); ?>
    <?php echo $form->error($model, 'orden', array('class' => 'help-block error', 'maxlength' => 10, 'style' => 'margin-top: 7px;')); ?>
    </div>
    
    <br/><label for="respuestas[]">Respuestas</label>
    <div id="respuestas-ejercicios" style="margin-top: 15px;" class="bql-evaluacion-content">
        <?php
        $this->widget('bootstrap.widgets.TbListView', array(
            'id' => 'list-respuestas-items',
            'template'=>'{items}',
            'dataProvider' => $model->cargarMisRespuestas(),
            'itemView' => '_respuestasEjercicios',
            'viewData' => array('model' => $model),
            'sortableAttributes' => array(
                'idRespuestaEjercicio',
            ),
        ));
        ?>
    </div>
    <input type="button" id="agregar-nueva-respuesta" class="btn btn-success btn-agregar" value="Agregar"/>

    <?php endif; ?>

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

<script type="text/javascript">
    $(".contenido input:checkbox").click(function () {
        if (this.checked)
        {
            $(this).parent().parent().parent().children('.panel-body').append('<div class="orden-contenido-ejercio"><label><span>Orden</span><input class="txt-orden-contenido" type="text" name="Ejercicios[contenidos][orden][' + $(this).attr('value') + ']"></label></div>');
        } else {
            $(this).parent().parent().parent().children('.panel-body').children('.orden-contenido-ejercio').remove();
        }
    });

    $(document).on('click', "#agregar-nueva-respuesta", function (e) {
        AbrirModal('Agregar respuesta al ejercicio #<?php echo $model->id_ejercicio; ?>', '700px', '95%', '<?php echo Yii::app()->createAbsoluteUrl('respuestaejercicio/create', array('id_ejercicio' => $model->id_ejercicio)); ?>', '');
    });
    
    $(document).on('click', ".edit-respuesta", function (e) {
        AbrirModal('Editar respuesta del ejercicio #'+$(this).parent().attr('idmessage'), '700px', '95%', '<?php echo Yii::app()->createAbsoluteUrl('respuestaejercicio/update'); ?>'+"/"+$(this).parent().attr('idmessage'), '');
    });
    
    $(document).on('click', ".delete-message", function (e) {
       if(confirm('¿Realmente desea eliminar esta respuesta?'))
       {
           $.post("<?php echo Yii::app()->createAbsoluteUrl('respuestaejercicio/delete');?>"+"/"+$(this).parent().attr('idmessage'),{'confirmaEliminacion':1},function(){
               $.fn.yiiListView.update("list-respuestas-items");
           });
       }
    });
</script>

<?php 
    Yii::app()->clientScript->registerCss('cambios-css-ejercicio', ''
            . '#list-respuestas-items .list-view {
                 padding-top: 0px;
               }
               #list-respuestas-items .alert {
                    margin-top: 0em;
                  }
                #list-respuestas-items .alert p{
                    display: inline-block;
                    width: 88%;
                }
                #list-respuestas-items .alert .botones-respuesta{
                    float: right;
                }
                #list-respuestas-items .alert .botones-respuesta .btn{
                      background: none;
                      margin-right: 6px;
                }');
?>