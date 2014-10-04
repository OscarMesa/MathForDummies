<?php
$this->breadcrumbs=array(
	'Grados'=>array('index'),
	$model->id_grado=>array('view','id'=>$model->id_grado),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar grados','url'=>array('index')),
	array('label'=>'Crear grado','url'=>array('create')),
	array('label'=>'View Grado','url'=>array('view','id'=>$model->id_grado)),
	array('label'=>'Administrador de grados','url'=>array('admin')),
	);
	?>

	<h1>Actualizar grado <?php echo $model->id_grado; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>