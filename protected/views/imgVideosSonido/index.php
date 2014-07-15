<?php
$this->breadcrumbs=array(
	'Img Videos Sonidos',
);

$this->menu=array(
array('label'=>'Create ImgVideosSonido','url'=>array('create')),
array('label'=>'Manage ImgVideosSonido','url'=>array('admin')),
);
?>

<h1>Img Videos Sonidos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
