<?php
$this->breadcrumbs=array(
	'Cursoses',
);

$this->menu=array(
	array('label'=>'Crear Curso','url'=>array('create')),
	array('label'=>'Administrador de Cursos','url'=>array('admin')),
);
?>

<h1>Cursos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
