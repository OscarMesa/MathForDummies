<?php
$this->breadcrumbs=array(
	'Nota Seguimiento Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List NotaSeguimientoUsuario','url'=>array('index')),
array('label'=>'Manage NotaSeguimientoUsuario','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>