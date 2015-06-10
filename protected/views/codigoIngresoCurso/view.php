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
<?php $this->renderPartial('_menu',array('model'=>$model->idCurso));?>
<h1><?php echo Yii::t('polimsn', 'code entry');?> #<?php echo $model->id_codigo; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
//		'id_codigo',
		'codigo_verficacion',
		array(
                    'name' => 'id_curso',
                    'type' => 'raw',
                    'value' =>  function($data){
                        return $data->idCurso->nombre_curso;
                    }
                    ),
		'fecha_creacion',
		array(
                    'name' => 'estado',
                    'type' => 'raw',
                    'value' => function($data){
                            return $data->estado0->nombre;
                    }
                    ),
),
)); ?>
