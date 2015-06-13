<div style="float:left; width:42%; margin:4px;">
    <a class="pull-left" href="<?php echo Yii::app()->createAbsoluteUrl('cursos/'.$data->id);?>">
        <img class="media-object img-circle" src="<?php echo Yii::app()->baseUrl . '/themes/OzAuLink/images/curso.png'; ?>" style='background-color:#D7D8D6;'>
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $data->nombre_curso ?></h4>
        <div class="media">
            <?php echo $data->descripcion_curso; ?>
        </div>
    </div>
</div>