<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'contenidos-form',
    'enableAjaxValidation' => false,
        ));
?>
<div id="form_contenidos">
    
<p class="help-block">Los campos identificados con <span class="required">*</span> son requeridos.</p>


<?php
echo $form->dropDownListRow($model, 'state_contenido', array('true' => 'Activo', 'false' => 'Inactivo'), array('class' => 'span5', 'data-placement' => 'right', 'maxlength' => 8));
?>
<?php 
echo $form->textFieldRow($model, 'titulo', array('class' => 'span5', 'maxlength' => 55)); ?>
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
                array('id' => 'Contenidos Multimedia', 'label' => 'Videos', 'content' => $this->renderPartial('application.views.imgVideosSonido._contenido', array('model'=>$contenido->obtenerComonentesMultimedia($model->id)), true), 'active' => true,),
        ),
        'events'=>array('shown'=>'')
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


<!-- Modal -->
<div id="contenidos-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Nuevo contenido</h3>
</div>
<div class="modal-body">
<?php Yii::import('application.views.imgVideosSonido.create'); echo $this->renderPartial('application.views.imgVideosSonido.create',array('model'=>new ImgVideosSonido()),true); ?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
<button class="btn btn-primary" id="guargar-contenido">Guardar</button>
</div>
</div>



<?php $this->endWidget(); ?>
</div>

<script>
 $(document).on('click','#agregarContenido',function(e){
     $('#contenidos-modal').modal('show');
     e.preventDefault();
 });
 $(document).on('click','#guargar-contenido',function(){
     alert('hello');
 });
 
</script>