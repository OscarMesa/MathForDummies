<?php
$this->breadcrumbs = array(
    'Temas' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Tema', 'url' => array('index')),
    array('label' => 'Manage Tema', 'url' => array('admin')),
);
?>

<?php echo $this->renderPartial("_menu",array('model' => $curso, 'activeCreate' => true ));?>

<h2>Crear Tema en <?php echo $curso->nombre_curso; ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model, 'curso' => $curso)); ?>