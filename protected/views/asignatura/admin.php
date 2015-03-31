<?php
$this->breadcrumbs=array(
	'Materiases'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Materias','url'=>array('index')),
array('label'=>'Create Materias','url'=>array('create')),
);

?>

<h1>Administrador de asignaturas</h1>

<p>
	También puede escribir un operador de comparación(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>
<div class="well">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'materias-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'idmaterias',
		'nombre_materia',
                array(
                    'name'=>'state_materia',
                    'value'=>  function($data){
                        return $data->state_materia;
                    }
                ),
                array(
                  'name' => 'idarea',
                  'type' => 'raw',
                  'filter' => CHtml::listData(Area::model()->findAll('idestado=1'), 'id_area', 'descripcion'),
                  'value' =>  function($data){
                        return $data->area->descripcion;
                  }
                ),
array(
'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{active}',
            'buttons' => array(
                'delete' => array(
                    'visible' => '($data->state_materia == "active")?true:false',
                    'icon' => 'icon-remove',
                    'url' => 'Yii::app()->createUrl("asignatura/delete", array("id"=>$data->idmaterias))',
                    'label' => 'Desactivar',
                    'options' => array(
                        'grid'=>'materias-grid'
                    )
                ),
                'active' => array(
                    'label' => 'Activar',
                    'visible' => '($data->state_materia != "active")?true:false',
                    'url' => 'Yii::app()->createUrl("asignatura/active", array("id"=>$data->idmaterias,"ajax"=>1))',
                    'icon' => 'icon-ok',
                    'click' => 'js:activar',
                    'options' => array(
                        'grid'=>'materias-grid'
                    )
                )
                )
),
),
)); ?>
</div>