<?php
$this->breadcrumbs=array(
	'Contenidoses'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Contenidos','url'=>array('index')),
array('label'=>'Create Contenidos','url'=>array('create')),
array('label'=>'Update Contenidos','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Contenidos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Contenidos','url'=>array('admin')),
);
?>

<h1>View Contenidos #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'state_contenido',
		'titulo',
		'texto',
		'observacion',
),
)); ?>
