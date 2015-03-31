<?php
$this->breadcrumbs = array(
    'Areas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Crear un Area', 'url' => array('create')),
);
?>

<h1>Administrador de Areas</h1>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<div class="well">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'area-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id_area',
            'descripcion',
            array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{active}',
            'buttons' => array(
                'delete' => array(
                    'visible' => '($data->idestado == ACTIVE)?true:false',
                    'icon' => 'icon-remove',
                    'url' => 'Yii::app()->createUrl("area/delete", array("id"=>$data->id_area,"ajax"=>1))',
                    'label' => 'Desactivar',
                    'options' =>array(
                        'grid'=>"area-grid"
                    )
                ),
                'active' => array(
                    'label' => 'Activar',
                    'visible' => '($data->idestado != ACTIVE)?true:false',
                    'url' => 'Yii::app()->createUrl("area/active", array("id"=>$data->id_area,"ajax"=>"materias-grid"))',
                    'icon' => 'icon-ok',
                    'click' => 'js:activar',
                    'options' =>array(
                        'grid'=>"area-grid"
                    )
                )
            )
        ),
        ),
    ));
    ?>
</div>