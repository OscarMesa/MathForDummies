<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'codigo-ingreso-curso-form',
    'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo Yii::t('polimsn', 'Fields with <span class="required">*</span> are required.'); ?></p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->hiddenField($model, 'id_curso', array('class' => 'span3', 'value' => $curso->id)); ?>

<div class="container-fluid">
    <div class="">
        <div class="span5" style="width: 67%;display: inline-block;margin-top: 21px;">
            <?php echo $form->textFieldRow($model, 'codigo_verficacion', array('class' => 'span3', 'maxlength' => 15)); ?>
        </div>
        <div class="span5" style="display: inline-block;width: 19%;float: right;margin-right: 67px;margin-top: 42px;">
            <?php
            echo CHtml::button(Yii::t('polimsn', 'generate code'), array('id' => 'btn-generate-code', 'class' => 'btn btn-success'))
            ?>
        </div>
    </div>
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
<script type="text/javascript">
    
    $(document).on("click","#btn-generate-code",function(){
        //triggerAjaxValidationForAttribute($("#codigo-ingreso-curso-form"),'codigo_verficacion');
         $.ajax({
            type : "POST",
            url: "<?php echo $this->createAbsoluteUrl('codigoIngresoCurso/generarCodigoCurso',array('id'=>$curso->id)); ?>",
            dataType : "json",    
            data : {"curso_id":$("#CodigoIngresoCurso_id_curso").val()},
            success: function(data) { $("#CodigoIngresoCurso_codigo_verficacion").val(data.codigo); },
            async: true
        });
    });
    
    
</script>