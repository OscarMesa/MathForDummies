<?php
$this->breadcrumbs = array(
    'Contenidoses',
);

$this->menu = array(
    array('label' => 'Crear Contenido', 'url' => array('create')),
    array('label' => 'Administrador de contenidos', 'url' => array('admin')),
);
?>

<h1 class="titulos_admin">Contenidos</h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
