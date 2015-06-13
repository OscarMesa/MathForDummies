<?php
$this->breadcrumbs=array(
	'Respuestaejercicios'=>array('index'),
	$model->idRespuestaEjercicio=>array('view','id'=>$model->idRespuestaEjercicio),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Respuestaejercicio','url'=>array('index')),
	array('label'=>'Create Respuestaejercicio','url'=>array('create')),
	array('label'=>'View Respuestaejercicio','url'=>array('view','id'=>$model->idRespuestaEjercicio)),
	array('label'=>'Manage Respuestaejercicio','url'=>array('admin')),
	);
	?>

	<h1>Update Respuestaejercicio <?php echo $model->idRespuestaEjercicio; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>