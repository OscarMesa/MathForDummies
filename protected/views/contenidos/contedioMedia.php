<div class="well">
	<h3>Crear contenido</h3>
	<?php
		$this->widget('dropzone', array('action'=>Yii::app()->createUrl('contenidos/subir_documento_adjunto')));
		$this->widget('Summernote', array());
	?>
</div>