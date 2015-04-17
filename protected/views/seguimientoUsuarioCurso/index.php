<?php
/* @var $this SeguimientoUsuarioCursoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seguimiento Usuario Cursos',
);

$this->menu=array(
	array('label'=>'Create SeguimientoUsuarioCurso', 'url'=>array('create')),
	array('label'=>'Manage SeguimientoUsuarioCurso', 'url'=>array('admin')),
);
?>

<h1>Seguimiento Usuario Cursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
