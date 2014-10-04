<?php
$this->breadcrumbs=array(
	'Grados'=>array('index'),
	$model->id_grado,
);

$this->menu=array(
array('label'=>'Listar grados','url'=>array('index')),
array('label'=>'Crear grado','url'=>array('create')),
array('label'=>'Actualizar grado','url'=>array('update','id'=>$model->id_grado)),
array('label'=>'Eliminar grado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_grado),'confirm'=>'Realmente desea eliminar este item?')),
array('label'=>'Administrador de grados','url'=>array('admin')),
);
?>

<h1>View Grado #<?php echo $model->id_grado; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_grado',
		'desc_numerica',
		'desc_verbal',
),
)); ?>
