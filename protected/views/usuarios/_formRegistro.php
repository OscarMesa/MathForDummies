<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'usuarios-form',
    'action' => $this->createUrl('usuarios/createAnonimo'),
    'enableAjaxValidation' => true,
    'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'beforeValidate' => 'js:beforeValidate',
            'afterValidate' => 'js:afterValidate',
        ),
    'htmlOptions' => array(
        'class' => 'well',
    ),
        ));
?>
<div id="cargando" class="alert alert-warning procesando alert-block" style="display: none; width: 29%;margin-top:0px"><img src="<?php echo Yii::app()->getBaseUrl(true) ?>/themes/PoliAuLink/images/ajax-loader.gif"/> Procesando, por favor espere un momento... </div>
<?php

echo $form->textFieldRow($modelRegistro, 'username', array('class' => 'span3'));

echo $form->passwordFieldRow($modelRegistro, 'password', array('class' => 'span5', 'maxlength' => 40));

echo $form->passwordFieldRow($modelRegistro, 'passConfirm', array('class' => 'span5', 'maxlength' => 40));

echo $form->textFieldRow($modelRegistro, 'email', array('class' => 'span3'));

$model_perfil_v = new MathAuthitem();


echo $form->dropDownListRow($model_perfil_v, 'name', CHtml::listData(MathAuthitem::model()->findAll("name IN('Alumno') AND type = 2"), 'name', 'name'));
echo $form->textFieldRow($modelRegistro,'nameperfil',array('style'=>'display:none'));
echo"<br>";
$this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit','htmlOptions'=>array('class'=>'btn-danger'), 'label' => 'Guardar Registro'));


$this->endWidget();
?>
<style type="text/css">
    label[for=MathUser_nameperfil]{
        display: none;
    }
</style>

<script type="text/javascript">
    function beforeValidate(form)
    {
        $("#MathUser_nameperfil").val($("#MathAuthitem_name").val());
        $("#cargando").css("display","block");
        return true;
    }
    function afterValidate(form)
    {
        setTimeout(function(){$("#cargando").css("display","none")},500);
        return true;
    }
</script>