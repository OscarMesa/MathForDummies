<?php

echo CHtml::link(
        'Nuevo', Yii::app()->getBaseUrl(true) . '/contenidos/create?idTaller=' . $idTaller, array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 24px;')
);

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'contenidos-grid',
    'dataProvider' => $model->contenidosXTaller($idTaller),
    // 'filter' => $model,
    'columns' => array(
        'id',
        'titulo',
        array(
            'name' => 'state_contenido',
            'filter' => array('active' => 'Activo', 'inactive' => 'Inactivo'),
            'value' => function($data) {
                return ($data->state_contenido == 'active' ? 'Activo' : 'Inactivo');
            },
        ),
        'observacion',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            //'template'=>'{delete}{update}',
            'buttons' => array(
                'update' => array(
                    'url'=>'$this->grid->controller->createUrl("/contenidos/update/".$data->id)',
                ),
                'delete' => array(
                    'url'=>'$this->grid->controller->createUrl("/contenidos/delete/".$data->id)',    
                ),
                'view' => array(
                    'url'=>'$this->grid->controller->createUrl("/contenidos/".$data->id)',  
                ),
            )
        ),
    ),
));
?>
