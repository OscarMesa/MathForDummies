<?php
$this->breadcrumbs=array(
	'Seguimiento Usuario Cursos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List SeguimientoUsuarioCurso','url'=>array('index')),
array('label'=>'Create SeguimientoUsuarioCurso','url'=>array('create')),
array('label'=>'Update SeguimientoUsuarioCurso','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete SeguimientoUsuarioCurso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SeguimientoUsuarioCurso','url'=>array('admin')),
);
?>

<h1>View SeguimientoUsuarioCurso #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_curso',
		'id_usuario',
		'id_tipo_nota',
		'porcentaje',
		'descripcion',
),
)); ?>
