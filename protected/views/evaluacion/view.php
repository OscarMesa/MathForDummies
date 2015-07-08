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
<?php echo $this->renderPartial("_menu",array('model' => $curso, 'activeCreate' => false, 'activeAdmin' => false ));?>
<h1>Ver Evaluacion #<?php echo $model->cursos_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
                'id_evaluacion',
                array(
                    'type'=>'raw',
                    'label'=> Evaluacion::model()->getAttributeLabel('cursos_id'),
                    //'attribute' => 'idcurso',
                    'value' => $model->curso->nombre_curso
                ),
		'fecha_inicio',
		'fecha_fin',
		'tiempo_limite',
		array(
                    'type'=>'raw',
                    'label'=>  Evaluacion::model()->getAttributeLabel('estado_evaluacion'),
                    'value'=>$model->estado->nombre,
                ),
),
)); ?>
