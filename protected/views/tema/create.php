<?php
$this->breadcrumbs = array(
    'Temas' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Tema', 'url' => array('index')),
    array('label' => 'Manage Tema', 'url' => array('admin')),
);
?>

<ul class="nav nav-tabs">
    <li class="active"><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/create/<?php echo $curso->id ?>"><span class="glyphicon glyphicon-home"></span>Crear</a></li>
    <li><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/admin/<?php echo $curso->id ?>"><span class="glyphicon glyphicon-user"></span> Administrar</a></li>
</ul>

<h2>Crear Tema en <?php echo $curso->nombre_curso; ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model, 'curso' => $curso)); ?>