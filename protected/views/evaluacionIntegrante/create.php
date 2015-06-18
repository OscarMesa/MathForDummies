<?php
$this->breadcrumbs=array(
	'Evaluacion Integrantes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List EvaluacionIntegrante','url'=>array('index')),
array('label'=>'Manage EvaluacionIntegrante','url'=>array('admin')),
);
?>

<h1>Create EvaluacionIntegrante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>