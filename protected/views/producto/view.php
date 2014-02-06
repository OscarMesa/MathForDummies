<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto,
);

$this->menu=array(
	array('label'=>'List Producto','url'=>array('index')),
	array('label'=>'Create Producto','url'=>array('create')),
	array('label'=>'Update Producto','url'=>array('update','id'=>$model->id_producto)),
	array('label'=>'Delete Producto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_producto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Producto','url'=>array('admin')),
);
?>

<h1>View Producto #<?php echo $model->id_producto; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_producto',
		'nombre',
		'tipo',
		'fecha_creacion',
	),
)); ?>
