<?php
$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Evaluacion','url'=>array('index')),
array('label'=>'Manage Evaluacion','url'=>array('admin')),
);
?>
<?php echo $this->renderPartial("_menu",array('model' => $curso, 'activeCreate' => true ));?>

<h3>Crear evaluación en <?php echo $curso->nombre_curso; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'temas' => $temas)); ?>