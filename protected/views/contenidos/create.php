<?php
$this->breadcrumbs=array(
	'Contenidoses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Contenidos','url'=>array('index')),
array('label'=>'Administrador de contenidos','url'=>array('admin')),
);
?>

<h1 class="titulos_admin">Crear Contenido</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'contenido'=>$contenido,)); ?>