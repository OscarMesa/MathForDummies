<?php
$this->breadcrumbs=array(
	'Seguimiento Usuario Cursos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List SeguimientoUsuarioCurso','url'=>array('index')),
	array('label'=>'Create SeguimientoUsuarioCurso','url'=>array('create')),
	array('label'=>'View SeguimientoUsuarioCurso','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage SeguimientoUsuarioCurso','url'=>array('admin')),
	);
        
	?>

<?php echo $this->renderPartial("_menu",array('model' => $model->idCurso, ));?>


<?php echo $this->renderPartial('_formKW', array('model'=>$model,'id_curso'=>$model->id_curso)); ?>
