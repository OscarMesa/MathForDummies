<?php
$this->breadcrumbs=array(
	'Materiases'=>array('index'),
	$model->idmaterias,
);

$this->menu=array(
array('label'=>'Crear Materia','url'=>array('create')),
array('label'=>'Administrador de Materias','url'=>array('admin')),
);
?>

<h1>Ver asignatura #<?php echo $model->idmaterias; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idmaterias',
		'nombre_materia',
		'state_materia',
		array(
                    'name'=>'idarea',
                    'type' => 'raw',
                    'value'=>function($data){
                        return $data->area->descripcion;
                    }
                    ),
),
)); ?>
