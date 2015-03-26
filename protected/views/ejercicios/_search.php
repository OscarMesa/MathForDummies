<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_ejercicio',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'state_ejercicios',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldRow($model,'idMateria',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'ejercicio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'idusuariocreador',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idDificultad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'visible',array('class'=>'span5','maxlength'=>7)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
