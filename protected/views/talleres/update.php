
<?php
$this->breadcrumbs=array(
	'Talleres'=>array('index'),
	$model->idtalleres=>array('view','id'=>$model->idtalleres),
	'Update',
);
    $this->menu=array(
    array('label'=>'List Talleres','url'=>array('index')),
    array('label'=>'Create Talleres','url'=>array('create')),
    array('label'=>'View Talleres','url'=>array('view','id'=>$model->idtalleres)),
    array('label'=>'Manage Talleres','url'=>array('admin')),
    );
    ?>

	<h1>Update Talleres <?php echo $model->idtalleres; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>