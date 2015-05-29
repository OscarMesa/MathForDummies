<?php
$this->breadcrumbs=array(
	'Codigo Ingreso Cursos'=>array('index'),
	$model->id_codigo,
);

$this->menu=array(
array('label'=>'List CodigoIngresoCurso','url'=>array('index')),
array('label'=>'Create CodigoIngresoCurso','url'=>array('create')),
array('label'=>'Update CodigoIngresoCurso','url'=>array('update','id'=>$model->id_codigo)),
array('label'=>'Delete CodigoIngresoCurso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_codigo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CodigoIngresoCurso','url'=>array('admin')),
);
?>

<h1>View CodigoIngresoCurso #<?php echo $model->id_codigo; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_codigo',
		'codigo_verficacion',
		'id_curso',
		'fecha_creacion',
		'estado',
),
)); ?>
