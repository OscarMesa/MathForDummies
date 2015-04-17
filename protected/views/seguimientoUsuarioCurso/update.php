<?php
/* @var $this SeguimientoUsuarioCursoController */
/* @var $model SeguimientoUsuarioCurso */

$this->breadcrumbs=array(
	'Seguimiento Usuario Cursos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SeguimientoUsuarioCurso', 'url'=>array('index')),
	array('label'=>'Create SeguimientoUsuarioCurso', 'url'=>array('create')),
	array('label'=>'View SeguimientoUsuarioCurso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SeguimientoUsuarioCurso', 'url'=>array('admin')),
);
?>

<h1>Update SeguimientoUsuarioCurso <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>