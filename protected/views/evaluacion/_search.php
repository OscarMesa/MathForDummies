<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'cursos_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_inicio',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_fin',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'porcentaje',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'tiempo_limite',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'estado_evaluacion',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
