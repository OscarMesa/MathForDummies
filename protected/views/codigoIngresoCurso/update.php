<?php
$this->breadcrumbs=array(
	'Codigo Ingreso Cursos'=>array('index'),
	$model->id_codigo=>array('view','id'=>$model->id_codigo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CodigoIngresoCurso','url'=>array('index')),
	array('label'=>'Create CodigoIngresoCurso','url'=>array('create')),
	array('label'=>'View CodigoIngresoCurso','url'=>array('view','id'=>$model->id_codigo)),
	array('label'=>'Manage CodigoIngresoCurso','url'=>array('admin')),
	);
	?>

	<h1>Update CodigoIngresoCurso <?php echo $model->id_codigo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>