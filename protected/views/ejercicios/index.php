<?php
$this->breadcrumbs=array(
	'Ejercicioses',
);

$this->menu=array(
array('label'=>'Create Ejercicios','url'=>array('create')),
array('label'=>'Manage Ejercicios','url'=>array('admin')),
);
?>

<h1>Ejercicioses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
