<?php
$this->breadcrumbs=array(
	'Img Videos Sonidos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ImgVideosSonido','url'=>array('index')),
array('label'=>'Create ImgVideosSonido','url'=>array('create')),
array('label'=>'Update ImgVideosSonido','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ImgVideosSonido','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ImgVideosSonido','url'=>array('admin')),
);
?>

<h1>View ImgVideosSonido #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'state_img_videos',
		'url',
		'nombre',
		'type',
		'descripcion',
		'idUsiario',
),
)); ?>
