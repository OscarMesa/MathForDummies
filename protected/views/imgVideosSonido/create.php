<?php
$this->breadcrumbs=array(
	'Img Videos Sonidos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ImgVideosSonido','url'=>array('index')),
array('label'=>'Manage ImgVideosSonido','url'=>array('admin')),
);
?>

<h1>Create ImgVideosSonido</h1>

<?php echo $this->renderPartial('application.views.imgVideosSonido._form', array('model'=>$model)); ?>