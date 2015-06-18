<?php
$this->breadcrumbs=array(
	'Evaluacion Integrantes',
);

$this->menu=array(
array('label'=>'Create EvaluacionIntegrante','url'=>array('create')),
array('label'=>'Manage EvaluacionIntegrante','url'=>array('admin')),
);
?>

<h1>Evaluacion Integrantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
