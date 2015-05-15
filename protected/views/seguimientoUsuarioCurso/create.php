<?php
$this->breadcrumbs=array(
	'Seguimiento Usuario Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List SeguimientoUsuarioCurso','url'=>array('index')),
array('label'=>'Manage SeguimientoUsuarioCurso','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial("_menu",array('model' => $curso, 'activeCreate' => true ));?>

<h3>Notas de seguimiento</h3>

<?php echo $this->renderPartial('_form', array('seguimientos' => $seguimientos,'model'=>$model,'curso'=>$curso,'arrayDataProvider'=>$arrayDataProvider)); ?>