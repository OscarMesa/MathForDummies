<?php
$this->breadcrumbs=array(
	'Materiases'=>array('index'),
	$model->idmaterias=>array('view','id'=>$model->idmaterias),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Materias','url'=>array('index')),
	array('label'=>'Create Materias','url'=>array('create')),
	array('label'=>'View Materias','url'=>array('view','id'=>$model->idmaterias)),
	array('label'=>'Manage Materias','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Materia #<?php echo $model->idmaterias; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>