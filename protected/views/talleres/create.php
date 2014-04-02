<?php
$this->breadcrumbs=array(
	'Talleres'=>array('index'),
	'Create',
);


$this->menu=array(
array('label'=>'List Talleres','url'=>array('index')),
array('label'=>'Manage Talleres','url'=>array('admin')),
);
?>

<div class='titulos_admin'>Crear Talleres</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>