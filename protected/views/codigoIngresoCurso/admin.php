<?php echo $this->renderPartial("_menu", array('model' => $curso, 'activeAdmin' => true)); ?>

<?php


$this->breadcrumbs=array(
	'Codigo Ingreso Cursos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CodigoIngresoCurso','url'=>array('index')),
array('label'=>'Create CodigoIngresoCurso','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('codigo-ingreso-curso-grid', {
data: $(this).serialize()
});
return false;
});
");

?>

<h3>Administración de códigos al curso <?php echo $curso->nombre_curso ?></h3>

<p>
	<?php echo Yii::t('polimsn','You may optionally enter a comparison operator');?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) <?php echo Yii::t('polimsn','at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

 
<?php 
$provider = $model->search();
$provider->criteria->addCondition   ("id_curso=".$curso->id);

$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'codigo-ingreso-curso-grid',
'dataProvider'=>$provider,
'filter'=>$model,
'columns'=>array(
		array(
                    'name' => 'id_codigo',
                    'htmlOptions'=>array('width'=>'80'),  
                    ),
		'codigo_verficacion',
		array(
                    'name' => 'fecha_creacion',
                    'value' => function($data){
                        return date('Y-m-d', strtotime($data->fecha_creacion));
                    }
                    ),
		array(
                    'name'=> 'estado',
                    'htmlOptions'=>array('width'=>'120'),
                    'filter' => CHtml::dropDownList('slc-estado', '', CHtml::listData(Estados::model()->findAll(), 'id_estado', 'nombre')),
                    'value' =>'$data->estado0->nombre'
                    ),
    
array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{active}',
            'buttons' => array(
                'delete' => array(
                    'visible' => '($data->estado == ACTIVE)?true:false',
                    'icon' => 'icon-remove',
                    'url' => 'Yii::app()->createUrl("codigoIngresoCurso/delete", array("id"=>$data->id_codigo,"ajax"=>1))',
                    'label' => 'Desactivar',
                    'options' =>array(
                        'grid'=>"codigo-ingreso-curso-grid"
                    )
                ),
                'active' => array(
                    'label' => 'Activar',
                    'visible' => '($data->estado != ACTIVE)?true:false',
                    'url' => 'Yii::app()->createUrl("codigoIngresoCurso/active", array("id"=>$data->id_codigo,"ajax"=>"codigo-ingreso-curso-grid"))',
                    'icon' => 'icon-ok',
                    'click' => 'js:activar',
                    'options' =>array(
                        'grid'=>"codigo-ingreso-curso-grid"
                    )
                )
            )
        ),
),
)); ?>
