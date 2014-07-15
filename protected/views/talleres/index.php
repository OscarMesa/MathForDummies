<?php
$this->breadcrumbs=array(
	'Talleres',
);

$this->menu=array(
array('label'=>'Create Talleres','url'=>array('create')),
array('label'=>'Manage Talleres','url'=>array('admin')),
);
?>


<h1 class="titulos_admin">Talleres</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
