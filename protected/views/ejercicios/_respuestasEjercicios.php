<?php 
if($data->es_verdadero == 'v'){ 
?>

<div class="alert alert-success">
    <p><strong><?php echo $data->ordenposicion; ?>. </strong> <?php echo $data->respuesta_ejercicio; ?></p>
    <div class="botones-respuesta" idmessage="<?php echo $data->idRespuestaEjercicio; ?>">
        <a class="btn edit-respuesta"><i class="icon-pencil"></i></a>
        <a class="btn delete-message"><i class="icon-remove"></i></a>
    </div>
</div>
<?php }else{?>
<div class="alert alert-error">
    <p><strong><?php echo $data->ordenposicion; ?>. </strong> <?php echo $data->respuesta_ejercicio; ?></p>
    <div class="botones-respuesta" idmessage="<?php echo $data->idRespuestaEjercicio; ?>">
        <a class="btn edit-respuesta"><i class="icon-pencil"></i></a>
        <a class="btn delete-message"><i class="icon-remove"></i></a>
    </div>
</div>
<?php } ?>