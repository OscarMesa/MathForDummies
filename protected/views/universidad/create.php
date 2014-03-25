<?php
$this->breadcrumbs=array(
	'Universidads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Universidad','url'=>array('index')),
	array('label'=>'Manage Universidad','url'=>array('admin')),
);
?>

<h1>Create Universidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>