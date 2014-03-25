<?php
$this->breadcrumbs=array(
	'Cursoses',
);

$this->menu=array(
	array('label'=>'Create Cursos','url'=>array('create')),
	array('label'=>'Manage Cursos','url'=>array('admin')),
);
?>

<h1>Cursoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
