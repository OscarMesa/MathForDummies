<?php
/* @var $this EjerciciosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ejercicioses',
);

$this->menu=array(
	array('label'=>'Create Ejercicios', 'url'=>array('create')),
	array('label'=>'Manage Ejercicios', 'url'=>array('admin')),
);
?>

<h1>Ejercicioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
