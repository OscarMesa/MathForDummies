<?php
$this->breadcrumbs = array(
    'Cursoses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Cursos', 'url' => array('index')),
    array('label' => 'Create Cursos', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cursos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de Cursos</h1>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
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
            'filter' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
            'value' => function($data){
                return $data->usuario->nombre;
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
