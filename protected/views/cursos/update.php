<?php
$this->breadcrumbs = array(
    'Cursoses' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Listar Cursos', 'url' => array('../index')),
    array('label' => 'Crear Cursos', 'url' => array('../create')),
    array('label' => 'Visuarlizar Curso', 'url' => array('../view/' . $model->id)),
    array('label' => 'Manage Cursos', 'url' => array('../admin')),
);
?>


<div class='titulos_admin'><b><?php echo $model->nombre_curso; ?></b></div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>