<?php
$this->breadcrumbs=array(
	'Nota Seguimiento Usuarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List NotaSeguimientoUsuario','url'=>array('index')),
	array('label'=>'Create NotaSeguimientoUsuario','url'=>array('create')),
	array('label'=>'View NotaSeguimientoUsuario','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage NotaSeguimientoUsuario','url'=>array('admin')),
	);
	?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>