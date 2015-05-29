<?php
$this->breadcrumbs=array(
	'Codigo Ingreso Cursos',
);

$this->menu=array(
array('label'=>'Create CodigoIngresoCurso','url'=>array('create')),
array('label'=>'Manage CodigoIngresoCurso','url'=>array('admin')),
);
?>

<h1>Codigo Ingreso Cursos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
