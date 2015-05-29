<?php
$this->breadcrumbs=array(
	'Codigo Ingreso Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CodigoIngresoCurso','url'=>array('index')),
array('label'=>'Manage CodigoIngresoCurso','url'=>array('admin')),
);
?>
<?php echo $this->renderPartial("_menu", array('model' => $curso, 'activeCreate' => true)); ?>

<h3>Crear Código de ingreso a <?php echo $curso->nombre_curso;?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model,'curso'=> $curso)); ?>