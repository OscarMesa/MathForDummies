<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idtema',array('class'=>'span5')); ?>

                <?php echo $form->dropDownListRow($model, 'idperiodo', CHtml::listData(Periodo::model()->findAll(), 'id_periodo', 'valor_textual'), array('options' => array($model->idperiodo => array('selected' => true)))) ?>
                
                    <?php echo $form->dropDownListRow($model, 'estado', array('active'=>'Activo','inactive'=>'Inactivo'), array('options' => array($model->estado => array('selected' => true)))) ?>
		
                <?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->hiddenField($model,'idcurso'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
