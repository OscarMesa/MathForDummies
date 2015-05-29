<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_codigo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'codigo_verficacion',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'id_curso',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
