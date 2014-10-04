<?php

/** @var BootActiveForm $form */
// echo '<pre>';
// print_r($perfiles);
// foreach ($perfiles as $perfil) {
//     print_r($perfil->permisos);
//}
//echo '</pre>';



// Render them all with single `TbAlert`

?>

<?php

$modelRegistro = new MathUser();
$this->widget('bootstrap.widgets.TbTabs', array(
    'id' => 'mytabs',
    'type' => 'tabs',
    'tabs' => array(
        array('id' => 'tab1', 'label' => 'Inicio de sesión', 'content' => $this->renderPartial('application.views.usuarios._formInicio', array('model' => $model), true), 'active' => true,),
        array('id' => 'tab2', 'label' => 'Registro', 'content' => $this->renderPartial('application.views.usuarios._formRegistro', array('modelRegistro' => $modelRegistro, 'modelPerfil' => MathAuthitem::model()->findAll('type = 2')), true),),
        array('id' => 'tab3', 'label' => 'Recuperar', 'content' => $this->renderPartial('application.views.usuarios._formRecuperar', array('modelRegistro' => $modelRegistro), true),),
    )
        )
);
?>