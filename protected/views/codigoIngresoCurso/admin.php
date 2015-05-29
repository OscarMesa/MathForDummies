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
		'id_codigo',
		'codigo_verficacion',
		'fecha_creacion',
		'estado',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
