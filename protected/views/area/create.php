<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Administrador de áreas','url'=>array('admin')),
);
?>

<h1>Crear un área</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>