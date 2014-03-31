    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'button',
        'type' => 'primary',
        'id' => 'agregarContenido',
        'label' =>  'Agregar',
    ));

    $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'multimedia-grid',
    'dataProvider' => $model->searchByContenido($id_contenido),
    'filter' => $model,
    'columns' => array(
        'nombre',
        array(
            'name' => 'state_img_videos',
            'value' => function($data){
                return ($data->state_curso == 'active'?'Activo':'Inctivo');
            },
        ),
        array(
            'name' => 'type',
            'value' => function($data){
                return ($data->state_curso == 'vide'?'Video':($data->state_curso == 'img'?'Imagen':''));
            },
        ),
        array(
            'name' => 'url',
            'filter' => 'Ubicación',
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
