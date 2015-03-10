<?php
$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->cursos_id=>array('view','id'=>$model->cursos_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Evaluacion','url'=>array('index')),
	array('label'=>'Create Evaluacion','url'=>array('create')),
	array('label'=>'View Evaluacion','url'=>array('view','id'=>$model->cursos_id)),
	array('label'=>'Manage Evaluacion','url'=>array('admin')),
	);
	?>

	<h1>Update Evaluacion <?php echo $model->cursos_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>