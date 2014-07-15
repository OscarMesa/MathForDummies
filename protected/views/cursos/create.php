<?php
$this->menu = array(
    array('label' => 'Listar Cursos', 'url' => array('index')),
    array('label' => 'Administrador de cursos', 'url' => array('admin')),
);


$this->breadcrumbs=array(
	'Cursoses'=>array('index'),
	'Create',
);

?>

<h1 class="titulos_admin">Nuevo Curso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>