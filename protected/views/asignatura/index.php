<?php
$this->breadcrumbs=array(
	'Materiases',
);

$this->menu=array(
array('label'=>'Create Materias','url'=>array('create')),
array('label'=>'Manage Materias','url'=>array('admin')),
);
?>

<h1>Materiases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
