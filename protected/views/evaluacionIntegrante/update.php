<?php
$this->breadcrumbs=array(
	'Evaluacion Integrantes'=>array('index'),
	$model->evaluacion_integrante_id=>array('view','id'=>$model->evaluacion_integrante_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EvaluacionIntegrante','url'=>array('index')),
	array('label'=>'Create EvaluacionIntegrante','url'=>array('create')),
	array('label'=>'View EvaluacionIntegrante','url'=>array('view','id'=>$model->evaluacion_integrante_id)),
	array('label'=>'Manage EvaluacionIntegrante','url'=>array('admin')),
	);
	?>

	<h1>Update EvaluacionIntegrante <?php echo $model->evaluacion_integrante_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>