<blockquote>
  <p>Seleccione a un estudiante para agregarlo al curso</p>
</blockquote>
<br/>
<?php

$_SESSION['curso'] = $id;
$this->renderPartial('_agregarEstudiante',array('curso'=>$id));
$e = new MathUserC();
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cursos-grid',
    'dataProvider' => $e->participantesCurso($id),
    'columns' => array(
        'email',
        'username',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url' => 'Yii::app()->createAbsoluteUrl("cursos/eliminarUsuarioCurso/",array("curso"=>$_SESSION["curso"] ,"estudiante"=>$data->iduser))'
                )
            )
        ),
    ),
));