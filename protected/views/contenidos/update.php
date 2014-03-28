<?php
$this->breadcrumbs=array(
	'Contenidoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Contenidos','url'=>array('index')),
	array('label'=>'Create Contenidos','url'=>array('create')),
	array('label'=>'View Contenidos','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Contenidos','url'=>array('admin')),
	);
	?>

	<h1>Update Contenidos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>