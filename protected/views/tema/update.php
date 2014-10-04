<?php
$this->breadcrumbs=array(
	'Temas'=>array('index'),
	$model->idtema=>array('view','id'=>$model->idtema),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Tema','url'=>array('index')),
	array('label'=>'Create Tema','url'=>array('create')),
	array('label'=>'View Tema','url'=>array('view','id'=>$model->idtema)),
	array('label'=>'Manage Tema','url'=>array('admin')),
	);
	?>

	<h1>Actualizar tema en<?php echo $curso->nombre_curso; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>