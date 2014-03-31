<?php
if (!isset($cursoSeccion)) {
$this->breadcrumbs=array(
	'Img Videos Sonidos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ImgVideosSonido','url'=>array('index')),
array('label'=>'Manage ImgVideosSonido','url'=>array('admin')),
);
}
?>
<?php if (!isset($cursoSeccion)) { ?>
   <h1>Create contenido multimedia</h1>
<?php } ?>
<?php 
$params = array('model' => $model,);
if(isset($cursoSeccion))
    $params['cursoSeccion'] = $cursoSeccion;
echo $this->renderPartial('application.views.imgVideosSonido._form', $params);

?>