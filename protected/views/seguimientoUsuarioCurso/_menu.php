<ul class="nav nav-tabs">
    <?php //  var_dump($model);?>
    <li class="<?php echo isset($activeCreate) && $activeCreate ? 'active':''; ?>"><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/seguimientoUsuarioCurso/create/<?php echo isset($model->curso)?$model->curso->id:$model->id; ?>"><i class="icon-plus"></i>&nbsp;Crear</a></li>
    <li class="<?php echo isset($activeAdmin) && $activeAdmin ? 'active':''; ?>"><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/seguimientoUsuarioCurso/admin/<?php echo isset($model->curso)?$model->curso->id:$model->id; ?>"><i class="icon-briefcase"></i>&nbsp;Administrar</a></li>
    <li class="<?php echo isset($activeAdmin) && $activeAdmin ? 'active':''; ?>"><a target="_black" href="<?php echo Yii::app()->getBaseUrl(true) ?>/seguimientoUsuarioCurso/notas/<?php echo isset($model->curso)?$model->curso->id:$model->id; ?>"><i class="icon-briefcase"></i>&nbsp;Notas</a></li>
</ul>
