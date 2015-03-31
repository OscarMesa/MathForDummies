<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	$model->id_area=>array('view','id'=>$model->id_area),
	'Update',
);

	$this->menu=array(
	array('label'=>'Crear área','url'=>array('create')),
	array('label'=>'Administrador de área','url'=>array('admin')),
	);
	?>

	<h1>Actualizar área <?php echo $model->id_area; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>