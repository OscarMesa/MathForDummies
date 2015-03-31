<?php
$this->breadcrumbs = array(
    'Temas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tema', 'url' => array('index')),
    array('label' => 'Create Tema', 'url' => array('create')),
);

?>

<?php echo $this->renderPartial("_menu",array('model' => $model,'activeAdmin'=>true ));?>

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
//        print_r($model);
$dataProvider = $model->search();
$_SESSION['curso'] = $curso;
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tema-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'idtema',
        /*array(
            'name' => 'descripcion',
            'value' => function($data) {
                return Utilidades::limitText($data->descripcion, 60);
            }
        ),*/
        array(
            'name' => 'titulo',
            'value' => function($data) {
                return $data->titulo;
            }
        ),        
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
            'name' => 'estado',
            'filter' => array('active' => 'Activo', 'inactive' => 'Inactivo'),
            'value' => function($data) {
        return $data->estado == 'active' ? 'Activo' : 'Inactivo';
    }
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{active}',
            'buttons' => array(
                'update' => array(
                    'url' => function($data) {
                $curso = $_SESSION['curso'];
                return Yii::app()->createUrl("tema/update", array("idcurso" => $curso->id, "id" => $data->idtema));
            },
                ),
                'delete' => array(
                ),
                'view' => array(
                    'url' => function($data) {
                $curso = $_SESSION['curso'];
                return Yii::app()->createUrl("tema/view", array("idcurso" => $curso->id, "id" => $data->idtema));
            }
                ),
                'delete' => array(
                    'visible' => '($data->estado == "active")?true:false',
                    'icon' => 'icon-remove',
                    'url' => 'Yii::app()->createUrl("tema/delete", array("idcurso"=>$data->curso->id,"id"=>$data->idtema))',
                    'label' => 'Desactivar',
                ),
                'active' => array(
                    'label' => 'Activar',
                    'visible' => '($data->estado != "active")?true:false',
                    'url' => 'Yii::app()->createUrl("tema/active", array("idcurso"=>$data->curso->id,"id"=>$data->idtema,"ajax"=>1))',
                    'icon' => 'icon-ok',
                    'click' => 'js:activar'
                )
            )
        ),
    ),
));
?>