<?php
$this->breadcrumbs=array(
	'Temas',
);

$this->menu=array(
array('label'=>'Create Tema','url'=>array('create')),
array('label'=>'Manage Tema','url'=>array('admin')),
);
?>

<h1>Temas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
