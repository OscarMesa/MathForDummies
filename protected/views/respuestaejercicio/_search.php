<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idRespuestaEjercicio',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_ejercicio',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'respuesta_ejercicio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'ordenposicion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'es_verdadero',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
