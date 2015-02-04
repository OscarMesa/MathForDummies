<?php
$this->breadcrumbs = array(
    'Temas' => array('index'),
    $model->idtema,
);

$this->menu = array(
    array('label' => 'List Tema', 'url' => array('index')),
    array('label' => 'Create Tema', 'url' => array('create')),
    array('label' => 'Update Tema', 'url' => array('update', 'id' => $model->idtema)),
    array('label' => 'Delete Tema', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idtema), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Tema', 'url' => array('admin')),
);
?>

<?php echo $this->renderPartial("_menu",array('model' => $model ));?>

<h3>Tema #<?php echo $model->idtema; ?> en curso <?php echo $model->curso->nombre_curso; ?></h3>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idtema',
        'descripcion',
        array(
            'type'=>'raw',
            'label'=> Tema::model()->getAttributeLabel('idcurso'),
            //'attribute' => 'idcurso',
            'value' => $model->curso->nombre_curso
        ),
    )
        )
);
?>
