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

<h1>Create Talleres</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>