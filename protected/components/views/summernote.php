<?php
    $this->registerScriptJS();
    $this->registerStyleCSS();
?>
<textarea name='<?php echo $this->nom; ?>' id="Contenidos_detalle" class='summernote'><?php echo CHtml::encode($this->val); ?></textarea>