<?php $columns = array(); 
$columns[] =
    array(
        'name' => 'Estudiante', 
        'type' => 'raw',
        'value' => function($data){
            return CHtml::encode($data['estudiante']->username);
        }
    );
    global $seguimientos1;
    global $cont;
    $cont = 0;
    $GLOBALS['cont'] = -1;
    $GLOBALS['seguimientos'] = $seguimientos;
//    echo '<pre>';
//    print_r($GLOBALS['seguimientos']);
//    echo '</pre>';
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
                    return "<span class=\"badge badge-success link-nota-estudiante\" >".($data[$i]['nota']!=null?"<a href='#' onclick=\"AbrirModal('Actualizar ".$data[$i]['seguimiento']->nombre_seguimiento."', "
                        . "'800px', '95%', '".Yii::app()->createAbsoluteUrl('notaSeguimientoUsuario/update', array('id'=>$data[$i]['nota']->id,'estudiante'=>$data['estudiante']->iduser,'seguimiento'=>$data[$i]['seguimiento']->id))."')\" >".number_format(CHtml::encode($data[$i]['nota']->nota),2):("<a href='#' onclick=\"AbrirModal('Modificación de nota', '800px', '80%', '".Yii::app()->createAbsoluteUrl('notaSeguimientoUsuario/update', array('estudiante'=>$data['estudiante']->iduser,'seguimiento'=>$data[$i]->seguimiento))."')\" >".(0)))."</a></span>";
                else
                    return "<span class=\"badge badge-important link-nota-estudiante\" >".($data[$i]['nota']!=null?"<a href='#' onclick=\"AbrirModal('Actualizar ".$data[$i]['seguimiento']->nombre_seguimiento."',"
                        . " '800px', '95%', '".Yii::app()->createAbsoluteUrl('notaSeguimientoUsuario/update', array('id'=>$data[$i]['nota']->id,'estudiante'=>$data['estudiante']->iduser,'seguimiento'=>$data[$i]['seguimiento']->id))."')\" >".number_format(CHtml::encode($data[$i]['nota']->nota),2):("<a href='#' onclick=\"AbrirModal('Generar ".$data[$i]['seguimiento']->nombre_seguimiento."', '800px', '95%', '".Yii::app()->createAbsoluteUrl('notaSeguimientoUsuario/create', array('estudiante'=>$data['estudiante']->iduser,'seguimiento'=>$data[$i]['seguimiento']->id))."')\" >".(0)))."</a></span>";
            }else 
                return null;
        }
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
                    'id'=>'seguimiento-curso-usuarios-grid',
                    'dataProvider'=>$arrayDataProvider,
                    'columns' => $columns,
                )
            ); 
?>
