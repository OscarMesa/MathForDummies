<?php
$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->cursos_id=>array('view','id'=>$model->cursos_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Evaluacion','url'=>array('index')),
	array('label'=>'Create Evaluacion','url'=>array('create')),
	array('label'=>'View Evaluacion','url'=>array('view','id'=>$model->cursos_id)),
	array('label'=>'Manage Evaluacion','url'=>array('admin')),
	);
	?>
<?php echo $this->renderPartial("_menu",array('model' => $curso, 'activeCreate' => true ));?>

	<h1>Actualizar Evaluación #<?php echo $model->id_evaluacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'Mejercicios' => $Mejercicios,'temas' => $temas,'select_array'=>$select_array)); ?>