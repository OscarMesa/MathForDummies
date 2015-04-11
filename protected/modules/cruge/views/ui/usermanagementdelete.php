<div class="well">
<h1><?php echo ucwords(CrugeTranslator::t("admin","Disable user"));?></h1>
<?php
	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/
?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'crugestoreduser-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
    <b>Correo: </b><?php echo $model->username; ?><br/>
    <b>Nombre de usuario: </b><?php echo $model->email; ?>

<p>
	<?php echo ucfirst(CrugeTranslator::t("admin", "check to confirm deactivation box")); ?>
	<?php echo $form->checkBox($model,'deleteConfirmation',array("class"=>'check-box')); ?>
	<?php echo $form->error($model,'deleteConfirmation'); ?>
</P>
    <div class="control-group">
	<?php echo CHtml::submitButton("Desactivar usuario", array('class'=>'btn btn-primary')); ?>
	<?php echo CHtml::submitButton('Volver', array('name'=>"cancelar",'class'=>'btn btn-primary')) ; ?>
    </div>

<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>
</div>