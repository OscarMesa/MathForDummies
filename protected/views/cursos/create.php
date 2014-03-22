<?php
$this->breadcrumbs=array(
	'Cursoses'=>array('index'),
	'Create',
);

?>

<h1>Nuevo Curso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>