<?php
$this->breadcrumbs=array(
	'Talleres'=>array('index'),
	$model->idtalleres,
);

$this->menu=array(
array('label'=>'List Talleres','url'=>array('index')),
array('label'=>'Create Talleres','url'=>array('create')),
array('label'=>'Update Talleres','url'=>array('update','id'=>$model->idtalleres)),
array('label'=>'Delete Talleres','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idtalleres),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Talleres','url'=>array('admin')),
);
?>

<h1>View Talleres #<?php echo $model->idtalleres; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idtalleres',
		'id_materia',
		'id_curso',
		'nombre',
		'descripcion',
),
)); ?>
