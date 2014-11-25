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

<ul class="nav nav-tabs">
    <li class=""><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/create/<?php echo $model->curso->id ?>"><i class="icon-plus"></i>&nbsp;Crear</a></li>
    <li><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/admin/<?php echo $model->curso->id ?>"><i class="icon-briefcase"></i>&nbsp;Administrar</a></li>
</ul>

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
