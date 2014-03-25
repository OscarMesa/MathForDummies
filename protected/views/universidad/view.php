<?php
$this->breadcrumbs=array(
	'Universidads'=>array('index'),
	$model->id_universidad,
);

$this->menu=array(
	array('label'=>'List Universidad','url'=>array('index')),
	array('label'=>'Create Universidad','url'=>array('create')),
	array('label'=>'Update Universidad','url'=>array('update','id'=>$model->id_universidad)),
	array('label'=>'Delete Universidad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_universidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Universidad','url'=>array('admin')),
);
?>

<h1>View Universidad #<?php echo $model->id_universidad; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_universidad',
		'state_universidad',
		'nombre_universidad',
	),
)); ?>
