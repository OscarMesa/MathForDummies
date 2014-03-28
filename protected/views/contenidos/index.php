<?php
$this->breadcrumbs=array(
	'Contenidoses',
);

$this->menu=array(
array('label'=>'Create Contenidos','url'=>array('create')),
array('label'=>'Manage Contenidos','url'=>array('admin')),
);
?>

<h1>Contenidoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
