<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'ejercicios-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->dropDownListRow($model, 'state_ejercicios', array('active'=>'Activo','inactive'=>'Inactivo'),array('style'=> 'width:100%')) ?> 

	<?php echo $form->dropDownListRow($model, 'idMateria', CHtml::listData(Materias::model()->findAll(), 'idMateria', 'nombre_materia')); ?>

	<?php echo $form->textAreaRow($model,'ejercicio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->hiddenField($model,'idusuariocreador',array('class'=>'span5', 'value'=> Yii::app()->user->getId() )); ?>

	<?php echo $form->dropDownListRow($model, 'idDificultad', CHtml::listData(Dificultad::model()->findAll(), 'idDificultad', 'descripcion')); ?>

	<?php echo $form->dropDownListRow($model, 'visible', array('Publico'=>'publico','Privado'=>'privado'),array('style'=> 'width:100%')) ?> 

	<?php  if(!$model->isNewRecord):  ?>
				<div id="contenidos-virtuales">
				    <label for="contenidos[]">Contenidos</label>
				    <div class="row-fluid">
				        <div class="bql-evaluacion-content">
				            <?php
				            $this->widget('bootstrap.widgets.TbListView', array(
				                'id' => 'list-evaluaciones-items',
				                'dataProvider' => $Mcontenidos->searchForContenido(),
				                'itemView' => '_contenidosEjercicio',
				                'viewData' => array('model' => $model),
				                'sortableAttributes' => array(
				                    'name',
				                ),
				            ));
				            ?>
				        </div>
				    </div>
				    <?php echo $form->error($model, 'ejercicios', array('class' => 'help-block error', 'maxlength' => 10, 'style'=>'margin-top: 7px;')); ?>
				</div>
	<?php endif; ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    //$(".full-scream-ejercicio")
    $(".contenido input:checkbox").click(function(){
        if(this.checked)
        {
            $(this).parent().parent().parent().children('.panel-body').append('<div class="orden-contenido-ejercio"><label><span>Orden</span><input type="text" name="Evaluacion[contenido][orden]['+$(this).attr('value')+']"></label></div>');
        }else{
             $(this).parent().parent().parent().children('.panel-body').children('.orden-contenido-ejercio').remove();
        }
    });
</script>