<?php
$this->breadcrumbs=array(
	'Cursoses',
);

$this->menu=array(
	array('label'=>'Crear Curso','url'=>array('create')),
	array('label'=>'Administrador de Cursos','url'=>array('admin')),
);
?>

<div class="media well">

	<h1>Cursos</h1>

    <?php
    $cusos = new Cursos('serach');

    $this->widget('bootstrap.widgets.TbListView', array(
        'id' => 'list-evaluaciones-items',
        'dataProvider' => $cusos->search(),
        'itemView' => 'application.views.site._cursosInicio',
//        'sortableAttributes' => array(
//            'name',
//        ),
    ));
    ?>

</div>