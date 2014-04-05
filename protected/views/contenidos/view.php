<?php
$this->breadcrumbs = array(
    'Contenidoses' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Listar Contenidos', 'url' => array('index')),
    array('label' => 'Crear Contenido', 'url' => array('create')),
    array('label' => 'Modificar Contenido', 'url' => array('update/' . $model->id)),
    array('label' => 'Administrador de Contenidos', 'url' => array('admin')),
);
?>

<h1 class="titulos_admin">Vista contenido #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'state_contenido',
            'value' => function($data) {
                return ($data->state_contenido == 'active' ? 'Activo' : 'Inactivo');
            },
        ),
        'titulo',
        'observacion',
    ),
));
?>
