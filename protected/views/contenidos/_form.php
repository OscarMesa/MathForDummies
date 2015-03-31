<div class="well">
    <?php  
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'crear_contenido',
                'enableClientValidation' => true,
                'clientOptions' => array(
                   'validateOnSubmit' => true,
                   'validateOnChange' => true,
                ),

        ));
    ?>
            <?php echo $form->hiddenField($model, 'id_usuario_creador', array('class' => 'span11', 'value'=> Yii::app()->user->getId() )); ?>
            <?php echo $form->textFieldRow($model, 'titulo', array('class' => 'span11')); ?>
            
            <?php $this->widget('Summernote', array('title'=> 'Detalle', 'nom'=>'Contenidos[detalle]', 'val'=>$model->detalle) ); ?>
            <?php echo $form->error($model, 'detalle', array('class' => 'help-block error', 'maxlength' => 10)); ?>
           
            <?php echo $form->dropDownListRow($model, 'state_contenido', array('active'=>'Activo','inactive'=>'Inactivo'),array('style'=> 'width:100%')) ?> 
            <?php echo $form->dropDownListRow($model, 'visible', array('privado'=>'Privado','Publico'=>'Publico'),array('style'=> 'width:100%')) ?> 
            
            <br>
            <?php
                $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit','type' => 'primary','label' => $model->isNewRecord ? 'Crear' : 'Guardar'));
            ?> 

    <?php $this->endWidget(); ?>
    <?php
        $this->widget('dropzone', array('action'=>Yii::app()->createUrl('contenidos/subir_documento_adjunto'), 'files' => $files));
    ?>
</div>
<?php
Yii::app()->clientScript->registerScript("script_crear_contenido", "
    if($('#Contenidos_detalle').val() == ''){
        $('#Contenidos_detalle').val('');//inicial el textarea para que sea reconocido
    }else{
        $('#Contenidos_detalle').val('".$model->detalle."');
    }
    
    $(document).on('submit','form#crear_contenido',function(){
        form = $(this);
        $.post($(this).attr('action'),$(this).serialize(),function(r){
            $('#aform .dz-preview').remove();
            $('#Contenidos_detalle').code('');//limpiesa del editor y el textarea
            form[0].reset();
        },'json');
        
        return false;
    });

");
?>