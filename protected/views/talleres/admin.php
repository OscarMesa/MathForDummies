<?php
$this->breadcrumbs = array(
    'Contenidoses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Listar Talleres', 'url' => array('index')),
    array('label' => 'Crear Taller', 'url' => array('create')),
);

?>

<h1 class="titulos_admin">Administrador de Talleres</h1>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'contenidos-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'idtalleres',
        'nombre',
        array(
            'name' => 'state_taller',
            'filter' => array('active' => 'Activo', 'inactive' => 'Inactivo'),
            'value' => function($data) {
                return ($data->state_taller == 'active' ? 'Activo' : 'Inctivo');
            },
        ),
        array(
            'name' => 'id_curso',
            'filter' => CHtml::listData(Cursos::model()->findAll('id_docente=?',array(Yii::app()->user->id)), 'id', 'nombre_curso'),
            'value' => function($data) {
                return $data->idCurso->nombre_curso;
            },
        ),
        array(
            'name' => 'id_materia',
            'filter' => CHtml::listData(Materias::model()->findAll(), 'idmaterias', 'nombre_materia'),
            'value' => function($data) {
                return $data->idMateria->nombre_materia;
            },
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>

