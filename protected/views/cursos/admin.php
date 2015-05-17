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
    <?php echo Yii::t('polimsn','You may optionally enter a comparison operator');?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    <?php echo Yii::t('polimsn','or');?> <b>=</b>) <?php echo Yii::t('polimsn','at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>


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
            'header' => 'Asignatura',
            'filter' => false,
            'value' => function($data){
                return $data->materia->area->descripcion;
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
