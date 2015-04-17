<?php
$this->breadcrumbs=array(
	'Seguimiento Usuario Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List SeguimientoUsuarioCurso','url'=>array('index')),
array('label'=>'Manage SeguimientoUsuarioCurso','url'=>array('admin')),
);
?>

<h1>Create SeguimientoUsuarioCurso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>