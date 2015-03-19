<?php
$this->breadcrumbs=array(
	'Ejercicioses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Ejercicios','url'=>array('index')),
array('label'=>'Manage Ejercicios','url'=>array('admin')),
);
?>

<h1>Create Ejercicios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>