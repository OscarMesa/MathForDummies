<ul class="nav nav-tabs">
    <?php //  var_dump($model);?>
    <li class="<?php echo isset($activeCreate) && $activeCreate ? 'active':''; ?>"><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/evaluacion/create/<?php echo isset($model->curso)?$model->curso->id:$model->id; ?>"><i class="icon-plus"></i>&nbsp;Crear</a></li>
    <li class="<?php echo isset($activeAdmin) && $activeAdmin ? 'active':''; ?>"><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/evaluacion/admin/<?php echo isset($model->curso)?$model->curso->id:$model->id; ?>"><i class="icon-briefcase"></i>&nbsp;Administrar</a></li>
</ul>
