<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'evaluacion_integrante_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_evaluacion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'state_evalucacion_integrante',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldRow($model,'id_integrante_curso',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_inicio',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_fin',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
