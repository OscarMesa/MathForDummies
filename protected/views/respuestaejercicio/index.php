<?php
$this->breadcrumbs=array(
	'Respuestaejercicios',
);

$this->menu=array(
array('label'=>'Create Respuestaejercicio','url'=>array('create')),
array('label'=>'Manage Respuestaejercicio','url'=>array('admin')),
);
?>

<h1>Respuestaejercicios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
