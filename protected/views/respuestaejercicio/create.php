<?php
$this->breadcrumbs=array(
	'Respuestaejercicios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Respuestaejercicio','url'=>array('index')),
array('label'=>'Manage Respuestaejercicio','url'=>array('admin')),
);
?>

<h3>Crear respuesta</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>