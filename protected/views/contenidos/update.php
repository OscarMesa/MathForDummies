<?php
$this->breadcrumbs=array(
	'Contenidoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Contenidos','url'=>array('../index')),
	array('label'=>'Crear Contenido','url'=>array('../create')),
	array('label'=>'Ver Contenido','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrador de Contenidos','url'=>array('admin')),
	);
	?>

        <h1 class="titulos_admin">Modificar contenido <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model,'contenido'=>$contenido)); ?>