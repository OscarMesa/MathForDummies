<?php
$this->breadcrumbs = array(
    'Temas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tema', 'url' => array('index')),
    array('label' => 'Create Tema', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tema-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<ul class="nav nav-tabs">
    <li><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/create/<?php echo $curso->id ?>"><span class="glyphicon glyphicon-home"></span>Crear</a></li>
    <li class="active"><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/tema/admin/<?php echo $curso->id ?>"><span class="glyphicon glyphicon-user"></span> Administrar</a></li>
</ul>

<h2>Admnistrar temas en <?php echo $curso->nombre_curso; ?></h2>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    o <b>=</b>) al comienzo de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Busqueda avanzada', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tema-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'idtema',
        'descripcion',
        array(
            'name' => 'idcurso',
            'filter' => false,
            'value' => function($data) {
                return $data->curso->nombre_curso;
            }
        ),
        array(
            'name' => 'idperiodo',
            'filter' => CHtml::listData(Periodo::model()->findAll(), 'id_periodo', 'valor_numerico'),
            'value' => function($data) {
                return $data->periodo->valor_textual;
            }
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
));
?>
