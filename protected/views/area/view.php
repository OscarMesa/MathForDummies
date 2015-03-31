<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	$model->id_area,
);

$this->menu=array(
array('label'=>'Crear un área','url'=>array('create')),
array('label'=>'Actualizar área','url'=>array('update','id'=>$model->id_area)),
array('label'=>'Administrador de Areas','url'=>array('admin')),
);
?>

<h1>Area #<?php echo $model->id_area; ?></h1>

<div class="well">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_area',
		'descripcion',
),
)); ?>
</div>