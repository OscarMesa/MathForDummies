<?php
$this->breadcrumbs=array(
	'Nota Seguimiento Usuarios',
);

$this->menu=array(
array('label'=>'Create NotaSeguimientoUsuario','url'=>array('create')),
array('label'=>'Manage NotaSeguimientoUsuario','url'=>array('admin')),
);
?>

<h1>Nota Seguimiento Usuarios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
