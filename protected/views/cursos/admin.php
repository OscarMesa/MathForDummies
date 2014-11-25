<?php
$this->breadcrumbs = array(
    'Cursoses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Listar Cursos', 'url' => array('index')),
    array('label' => 'Crear Cursos', 'url' => array('create')),
);

?>

<h1>Administrador de Cursos</h1>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cursos-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'state_curso',
            'filter' => array('active'=>'Activo','inactive'=>'Inactivo'),
            'value' => function($data){
                return ($data->state_curso == 'active'?'Activo':'Inctivo');
            },
        ),
        array(
            'name' => 'id_docente',
            'filter' => CHtml::listData(MathUser::model()->findAll(), 'id', 'username'),
            'value' => function($data){
                return $data->usuario->username;
            },
            'htmlOptions' => array('width' => '80px',),
        ),
        array(
            'name' => 'idmateria',
            'filter' => CHtml::listData(Materias::model()->findAll(), 'idmaterias', 'nombre_materia'),
            'value' => function($data){
                return $data->materia->nombre_materia;
            },
            'htmlOptions' => array('width' => '80px',),
        ),
        'nombre_curso',
        'fecha_inicio',
        'fecha_cierre',
        'descripcion_curso',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
