<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'FormRegistroUsuario',
    'action'=>$this->createUrl('usuarios/create'),
    'enableClientValidation'=>true,
    'clientOptions'=>array(
		'validateOnSubmit'=>true,
        ),
    'htmlOptions'=>array(
        'class'=>'well',
        ),
)); ?>

<?php

echo $form->textFieldRow($modelRegistro, 'nombre', array('class'=>'span3'));
echo $form->textFieldRow($modelRegistro, 'contrasena', array('class'=>'span3'));
echo $form->textFieldRow($modelRegistro, 'correo', array('class'=>'span3'));

$model_perfil_v = new Perfiles();
echo $form->dropDownListRow($model_perfil_v, 'nombre',CHtml::listData($modelPerfil, 'id_perfil', 'nombre'));
echo"<br>";
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Guardar Registro'));


$this->endWidget(); 

?>
