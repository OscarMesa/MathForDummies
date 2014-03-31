<?php
$this->breadcrumbs=array(
	'Img Videos Sonidos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ImgVideosSonido','url'=>array('index')),
	array('label'=>'Create ImgVideosSonido','url'=>array('create')),
	array('label'=>'View ImgVideosSonido','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ImgVideosSonido','url'=>array('admin')),
	);
	?>

	<h1>Update ImgVideosSonido <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>