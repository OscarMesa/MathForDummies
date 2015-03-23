<div class="well">

    <?php  
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'crear_contenido',
                    'enableClientValidation' => true
            ));
    ?>
        <?php echo $form->textFieldRow($model, 'titulo', array('class' => 'span11')); ?>
        
        <?php $this->widget('Summernote', array('title'=> 'Detalle', 'nom'=>'Contenidos[detalle]') ); ?>
        <?php echo $form->dropDownListRow($model, 'state_contenido', array('active'=>'Activo','inactive'=>'Inactivo') ) ?> 

       

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
    <?php
        $this->widget('dropzone', array('action'=>Yii::app()->createUrl('contenidos/subir_documento_adjunto')));
    ?>
</div>
<?php

    Yii::app()->clientScript->registerScript("script_crear_contenido", "
        
        $(document).on('submit','form#crear_contenido',function(){
            
            $('#summernote').val($('#summernote').code());

            $.post($(this).attr('action'),$(this).serialize(),function(r){
                console.log('sdfdsf');
            },'json');
            
            return false;
        });

    ");

//$('#summernote').code()
?>