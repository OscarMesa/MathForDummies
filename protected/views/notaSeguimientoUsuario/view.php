<?php
$this->breadcrumbs=array(
	'Nota Seguimiento Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List NotaSeguimientoUsuario','url'=>array('index')),
array('label'=>'Create NotaSeguimientoUsuario','url'=>array('create')),
array('label'=>'Update NotaSeguimientoUsuario','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete NotaSeguimientoUsuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage NotaSeguimientoUsuario','url'=>array('admin')),
);
?>

<h1>View NotaSeguimientoUsuario #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_usuario',
		'id_seguimiento_usuario_curso',
		'nota',
		'observacion',
),
)); ?>
