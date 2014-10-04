<?php
$this->breadcrumbs=array(
	'Grados'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar grados','url'=>array('index')),
array('label'=>'Administrador de grados','url'=>array('admin')),
);
?>

<h1>Crear grado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>