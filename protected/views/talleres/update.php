
<?php
$this->breadcrumbs=array(
	'Talleres'=>array('index'),
	$model->idtalleres=>array('view','id'=>$model->idtalleres),
	'Actualizar',
);
    $this->menu=array(
    array('label'=>'List Talleres','url'=>array('index')),
    array('label'=>'Create Talleres','url'=>array('create')),
    array('label'=>'View Talleres','url'=>array('view','id'=>$model->idtalleres)),
    array('label'=>'Manage Talleres','url'=>array('admin')),
    );
    ?>

 <div class='titulos_admin'>Actualizar Taller <?php echo $model->nombre; ?></div>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'Mejercicios'=> $Mejercicios)); ?>