<?php

//echo '<pre>';
//print_r($dataproviderEstudiantes);
//die;
$this->renderPartial('_agregarEstudiante',array('curso'=>$id));
$e = new MathUserC();
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cursos-grid',
        'dataProvider' => $e->participantesCurso($id),
    'columns' => array(
        'iduser',
        'email',
        'username',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));