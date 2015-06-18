<?php
$this->breadcrumbs=array(
	'Evaluacion Integrantes'=>array('index'),
	$model->evaluacion_integrante_id,
);

$this->menu=array(
array('label'=>'List EvaluacionIntegrante','url'=>array('index')),
array('label'=>'Create EvaluacionIntegrante','url'=>array('create')),
array('label'=>'Update EvaluacionIntegrante','url'=>array('update','id'=>$model->evaluacion_integrante_id)),
array('label'=>'Delete EvaluacionIntegrante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->evaluacion_integrante_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EvaluacionIntegrante','url'=>array('admin')),
);
?>

<h1>View EvaluacionIntegrante #<?php echo $model->evaluacion_integrante_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'evaluacion_integrante_id',
		'id_evaluacion',
		'state_evalucacion_integrante',
		'id_integrante_curso',
		'fecha_inicio',
		'fecha_fin',
),
)); ?>
