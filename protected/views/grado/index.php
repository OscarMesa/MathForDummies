<?php
$this->breadcrumbs=array(
	'Grados',
);

$this->menu=array(
array('label'=>'Crear grado','url'=>array('create')),
array('label'=>'Administrador de grados','url'=>array('admin')),
);
?>

<h1>Grados</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
