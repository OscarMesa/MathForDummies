<?php
$this->breadcrumbs = array(
    'Evaluacions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Evaluacion', 'url' => array('index')),
    array('label' => 'Create Evaluacion', 'url' => array('create')),
);

?>
<?php echo $this->renderPartial("_menu", array('model' => $curso, 'activeAdmin' => true)); ?>
<h1>Administrador de Evaluaciones</h1>

<p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    o <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'evaluacion-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'cursos_id',
            'filter' => false,
            'value' => function($data){ return $data->curso->nombre_curso; }
        ),
        'fecha_inicio',
        'fecha_fin',
        array(
            'name' => 'porcentaje',
            'value' => function($data){ return $data->porcentaje."%"; }
        ), 
        array(
            'name' => 'tiempo_limite',
            'value' => function($data){ return gmdate("H:i:s", $data->tiempo_limite); }
        ),            
        array(
            'name' => 'estado_evaluacion',
            'filter' => CHtml::listData(Estados::model()->findAll(), 'id_estado', 'nombre'),
            'value' => function($data){ return $data->estado->nombre; }
        ),
                'fecha_creacion',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{active}',
            'buttons' => array(
                'delete' => array(
                    'visible' => '($data->estado_evaluacion == ACTIVE)?true:false',
                    'icon' => 'icon-remove',
                    'url' => 'Yii::app()->createUrl("evaluacion/delete", array("idcurso"=>$data->curso->id,"id"=>$data->id_evaluacion))',
                    'label' => 'Desactivar',
                ),
                'active' => array(
                    'label' => 'Activar',
                    'visible' => '($data->estado_evaluacion != ACTIVE)?true:false',
                    'url' => 'Yii::app()->createUrl("evaluacion/active", array("idcurso"=>$data->curso->id,"id"=>$data->id_evaluacion,"ajax"=>1))',
                    'icon' => 'icon-ok',
                    'click' => 'js:activar'
                )
            )
        ),
    ),
));
?>
