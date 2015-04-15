<?php
$this->breadcrumbs = array(
    'Ejercicioses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Ejercicios', 'url' => array('index')),
    array('label' => 'Create Ejercicios', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
                $('.search-button').click(function(){
                $('.search-form').toggle();
                return false;
                });
                $('.search-form form').submit(function(){
                $.fn.yiiGridView.update('ejercicios-grid', {
                data: $(this).serialize()
                });
                return false;
                });
");
?>

<h1>Administrador de Ejercicios</h1>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    o <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ejercicios-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_ejercicio',
        'state_ejercicios',
        'idMateria',
        'ejercicio',
        'idusuariocreador',
        'idDificultad',
        /*
          'visible',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
