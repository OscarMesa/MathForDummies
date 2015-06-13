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
    <?php echo Yii::t('polimsn','You may optionally enter a comparison operator');?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    <?php echo Yii::t('polimsn','or');?> <b>=</b>) <?php echo Yii::t('polimsn','at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ejercicios-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_ejercicio',
        array(
            'name' => 'state_ejercicios',
            'type' => 'raw',
            'value' => function($data){
                return $data->state_ejercicios == 'active' ? "Activo":($data->state_ejercicios == 'inactive' ? "Inactivo" : "");
            } 
        ),
        array(
            'name' => 'idMateria',
            'type' => 'raw',
            'value' => function($data){
                return $data->idMateria0->nombre_materia;
            } 
        ),        
        'ejercicio',
        array(
            'name' => 'idusuariocreador',
            'type' => 'raw',
            'value' => function($data){
                return $data->idusuariocreador0->username;
            } 
        ),          
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
