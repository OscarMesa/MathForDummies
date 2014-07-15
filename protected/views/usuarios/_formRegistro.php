<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'usuarios-form',
    'action' => $this->createUrl('usuarios/createAnonimo'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true
    ),
    'htmlOptions' => array(
        'class' => 'well',
    ),
        ));
?>

<?php

echo $form->textFieldRow($modelRegistro, 'username', array('class' => 'span3'));

echo $form->passwordFieldRow($modelRegistro, 'password', array('class' => 'span5', 'maxlength' => 40));

echo $form->passwordFieldRow($modelRegistro, 'passConfirm', array('class' => 'span5', 'maxlength' => 40));

echo $form->textFieldRow($modelRegistro, 'email', array('class' => 'span3'));

$model_perfil_v = new MathAuthassignment();
echo $form->dropDownListRow($model_perfil_v, 'itemname', CHtml::listData(MathAuthassignment::model()->findAll("itemname NOT IN('invitados')"), 'itemname', 'itemname'));
echo"<br>";
$this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Guardar Registro'));


$this->endWidget();
?>
