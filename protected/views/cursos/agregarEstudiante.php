<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cursos-grid',
        'dataProvider' => $dataproviderEstudiantes,
    'filter' => $model,
    'columns' => array(
        'iduser',
        'email',
        'username',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));