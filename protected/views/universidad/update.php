<?php
$this->breadcrumbs=array(
	'Universidads'=>array('index'),
	$model->id_universidad=>array('view','id'=>$model->id_universidad),
	'Update',
);

$this->menu=array(
	array('label'=>'List Universidad','url'=>array('index')),
	array('label'=>'Create Universidad','url'=>array('create')),
	array('label'=>'View Universidad','url'=>array('view','id'=>$model->id_universidad)),
	array('label'=>'Manage Universidad','url'=>array('admin')),
);
?>

<h1>Update Universidad <?php echo $model->id_universidad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>