<?php
$this->breadcrumbs = array(
    'Seguimiento Usuario Cursos' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List SeguimientoUsuarioCurso', 'url' => array('index')),
    array('label' => 'Create SeguimientoUsuarioCurso', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('seguimiento-usuario-curso-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php echo $this->renderPartial("_menu", array('model' => $curso, 'activeAdmin' => true)); ?>



<p>
    <?php echo Yii::t('polimsn','You may optionally enter a comparison operator');?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    <?php echo Yii::t('polimsn','or');?> <b>=</b>) <?php echo Yii::t('polimsn','at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$provider = $model->search();
$provider->criteria->addCondition("id_curso=".$id_curso);

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'seguimiento-usuario-curso-grid',
    'dataProvider' => $provider,
    'filter' => $model,
    'columns' => array(
        array(
            'name'=> 'id',
            'htmlOptions'=>array('width'=>'40')
            ),
        'nombre_seguimiento',
        array(
            'name' => 'id_tipo_nota',
            'type' => 'raw',
            'filter' => false,
            'value' => function($data) {
                return $data->idTipoNota->descripcion;
            }
        ),
        array(
            'name' => 'porcentaje',
            'type' => 'raw',
            'htmlOptions'=>array('width'=>'50'),
            'value' => function($data) {
                return $data->porcentaje . "%";
            }
        ),
        array(
            'name' => 'criterio_evaluacion',
            'type' => 'raw',
            'filter' => CHtml::dropDownList('criterio_evaluacion_select', '', CHtml::listData(VCriteriosEvaluacion::model()->findAll(), 'id_criterio', 'criterio')),
//            'htmlOptions'=>array('width'=>'50'),
            'value' => function($data) {
                return $data->criterioEvaluacion->nombre_criterio;
            }
        ),
        'descripcion',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{active}',
            'buttons' => array(
                'delete' => array(
                    'visible' => '($data->estado_seguimiento == ACTIVE)?true:false',
                    'icon' => 'icon-remove',
                    'url' => 'Yii::app()->createUrl("seguimientoUsuarioCurso/delete", array("id"=>$data->id))',
                    'label' => 'Desactivar',
                ),
                'active' => array(
                    'label' => 'Activar',
                    'visible' => '($data->estado_seguimiento != ACTIVE)?true:false',
                    'url' => 'Yii::app()->createUrl("seguimientoUsuarioCurso/active", array("id"=>$data->id,"ajax"=>1))',
                    'icon' => 'icon-ok',
                    'options' => array('grid'=>'seguimiento-usuario-curso-grid'),                    
                    'click' => 'js:activar'
                )
            )
        ),
    ),
));
?>
