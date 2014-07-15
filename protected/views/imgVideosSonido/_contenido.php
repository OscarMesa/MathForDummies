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
    'columns' => array(
        'nombre',
        array(
            'name' => 'state_img_videos',
            'value' => function($data){
                return ($data->state_img_videos == 'active'?'Activo':'Inctivo');
            },
        ),
        array(
            'name' => 'type',
            'value' => function($data){
                return ($data->type == 'video'?'Video':($data->type == 'img'?'Imagen':''));
            },
        ),
        'url',        
    ),
));
    
    
    
    ?>
