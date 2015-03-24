<div class="well">

    <?php  
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'crear_contenido',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true
            ));
    ?>

        <?php $this->widget('Summernote'); ?>



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