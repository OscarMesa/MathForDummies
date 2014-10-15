<?php
$this->breadcrumbs=array(
	'Temas'=>array('index'),
	$model->idtema=>array('view','id'=>$model->idtema),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Tema','url'=>array('index')),
	array('label'=>'Create Tema','url'=>array('create')),
	array('label'=>'View Tema','url'=>array('view','id'=>$model->idtema)),
	array('label'=>'Manage Tema','url'=>array('admin')),
	);
	?>
<ul class="nav nav-tabs">
    <li class=""><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/create/<?php echo $curso->id ?>"><span class="glyphicon glyphicon-home"></span>Crear</a></li>
    <li><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/admin/<?php echo $curso->id ?>"><span class="glyphicon glyphicon-user"></span> Administrar</a></li>
</ul>
	<h1>Actualizar tema en<?php echo $curso->nombre_curso; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'curso'=>$curso)); ?>