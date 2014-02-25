<?php

Yii::import('application.vendor.*');

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'lista-programas',
    'dataProvider' => $dataProvider,
    //'filter' => V7guiK2Items::model(),
    'type' => 'striped bordered condensed',
    'columns' => array(
        'id_universidad',
        'state_universidad',
        'nombre_universidad'
    ),
        )
);
?>
