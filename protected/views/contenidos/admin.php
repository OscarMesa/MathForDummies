<?php
$this->breadcrumbs = array(
    'Contenidoses' => array('index'),
    'Manage',
);
echo '<br/>';
?>
<div class="input-append">
<?php
$this->menu = array(
    array('label' => 'Listar contenidos', 'url' => array('index')),
    array('label' => 'Crear Contenido', 'url' => array('create')),
);
?>
</div>    
  

<h1 class="titulos_admin">Administrador de Contenidos</h1>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    o <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>
<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'contenidos-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'titulo',
        'titulo',
        array(
            'name' => 'state_contenido',
            'filter' => array('active'=>'Activo','inactive'=>'Inactivo'),
            'value' => function($data){
                return ($data->state_contenido == 'active'?'Activo':'Inactivo');
            },
        ),
        'detalle',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
