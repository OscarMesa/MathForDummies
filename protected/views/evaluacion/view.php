<?php
$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->cursos_id,
);

$this->menu=array(
array('label'=>'List Evaluacion','url'=>array('index')),
array('label'=>'Create Evaluacion','url'=>array('create')),
array('label'=>'Update Evaluacion','url'=>array('update','id'=>$model->cursos_id)),
array('label'=>'Delete Evaluacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->cursos_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Evaluacion','url'=>array('admin')),
);
?>

<h1>Ver Evaluacion #<?php echo $model->cursos_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
                'id_evaluacion',
		'cursos_id',
		'fecha_inicio',
		'fecha_fin',
		'porcentaje',
		'tiempo_limite',
		'estado_evaluacion',
),
)); ?>
