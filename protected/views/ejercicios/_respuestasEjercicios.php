<?php 
if($data->es_verdadero){ 
?>

<div class="alert alert-success">
        <button type="button" class="close delete-message" idmessage="<?php echo $data->idRespuestaEjercicio; ?>" data-dismiss="alert">×</button>
        <strong><?php echo $data->ordenposicion; ?></strong> <?php echo $data->respuesta_ejercicio; ?>
</div>
<?php }else{?>
<div class="alert alert-error">
    <button type="button" class="close delete-message" idmessage="<?php echo $data->idRespuestaEjercicio; ?>" data-dismiss="alert">×</button>
              <strong><?php echo $data->ordenposicion; ?></strong> <?php echo $data->respuesta_ejercicio; ?>
</div>
<?php } ?>