<?php
$this->breadcrumbs=array(
	'Grados'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar grados','url'=>array('index')),
array('label'=>'Crear grado','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('grado-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administración de grados</h1>

<p>
	También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	o <b>=</b>) al comienzo de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'grado-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_grado',
		'desc_numerica',
		'desc_verbal',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
