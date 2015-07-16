<head>
    <meta http-equiv="content-type" content="application/html; charset=UTF-8" />
</head>
<table>
    <tr>
        <td colspan="8" style="text-align: center"><b><?php echo strtoupper("Notas de seguimiento"); ?></b></td>
    </tr>
    <tr>
        <td><b>Curso:</b></td>
        <td colspan="4"><b><?php echo $curso->nombre_curso; ?></b></td>
    </tr>
    <tr>
        <td ><b>Docente:</b></td>
        <td colspan="4"><b><?php echo Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'nombrecompleto'); ?></b></td>
    </tr>
</table>
<br/>


<?php

$columns = array(); 
$columns[] =
    array(
        'name' => 'Estudiante', 
        'type' => 'raw',
        'value' => function($data){
            return CHtml::encode($data['estudiante']->username);
        },
        'htmlOptions' => array(
            'style'=>'background-color: rgb(204, 204, 204);font-weight: bold;font-family: italic;'
        ),
       'headerHtmlOptions' => array(
            'style' => 'background-color: rgb(204, 204, 204);'
        )
    );
    global $seguimientos1;
    global $cont;
    $cont = 0;
    $GLOBALS['cont'] = -1;
    $GLOBALS['seguimientos'] = $seguimientos;

    foreach ($seguimientos as $seguimiento) {
        if($seguimiento->estado_seguimiento == INACTIVE)continue;
    $columns[] =
    array(
        'name' => $seguimiento->nombre_seguimiento, 
        'type' => 'raw',
        'value' => function($data){       
                $i = myFunc();
            if(isset($data[$i])){
                if($data[$i]['nota'] != null && $data[$i]['nota']->nota>=3)
                    return ($data[$i]['nota']!=null?number_format(CHtml::encode($data[$i]['nota']->nota),2):(0));
                else
                    return ($data[$i]['nota']!=null?number_format(CHtml::encode($data[$i]['nota']->nota),2):(0));
            }else 
                return null;
        },
        'htmlOptions' => array(
            'style'=>'text-align: center;  font-family: italic;'
        ),
        'headerHtmlOptions' => array(
            'style' => '  background-color: rgb(204, 204, 204);'
        )
    );
}
//$GLOBALS['cont'] += 2; 
function myFunc(){
    if(($GLOBALS['cont']) < count($GLOBALS['seguimientos'])-1 ){
        $x = $GLOBALS['cont'] + 1;
        $GLOBALS['cont'] = $x;
    }else
        $GLOBALS['cont'] = 0;
    return $GLOBALS['seguimientos'][$GLOBALS['cont']]->id;
}
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
                    'summaryText' => '',
                    'id'=>'seguimiento-curso-usuarios-grid',
                    'dataProvider'=>$arrayDataProvider,
                    'columns' => $columns,
                     'pager' => array('class' => 'CLinkPager', 'header' => ''),
                )
            ); 
?>