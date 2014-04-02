<?php
$this->breadcrumbs=array(
	'Cursoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Cursos','url'=>array('index')),
	array('label'=>'Crear Cursos','url'=>array('create')),
	array('label'=>'Visuarlizar Curso','url'=>array('view/'.$model->id)),
	array('label'=>'Manage Cursos','url'=>array('admin')),
);
?>

<h1>Update Cursos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>