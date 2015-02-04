<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cursos-form-addEstudiante',
    'action' => Yii::app()->createAbsoluteUrl("/cursos/AgregarEstudiantes", array($curso)),
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => false
    ),
        ));
?>
<?php echo CHtml::hiddenField('estudiantes', ""); ?>
<?php
$this->widget('ext.select2.ESelect2', array(
    'selector' => '#estudiantes',
    //  'model'=>$model,
    //  'attribute' => 'Usuarios[]',
    //   'data' =>CHtml::listData(Usuarios::model()->findAll(), 'Id_Usuario', 'Nombres'),
    'attribute' => 'estudiantes',
    'name' => 'estudiante',
    'options' => array(
        'allowClear' => true,
        'placeholder' => 'Selecione a el estudiante',
        //'minimumInputLength' => 4, 
        'ajax' => array(
            'url'=>Yii::app()->createUrl('usuarios/obtenerEstudiantesAjax'),// Yii::app()->createUrl('Dpeticion/ListarCiudadanos'),
            'dataType' => 'json',
            'type' => 'GET',
            // 'quietMillis'=> 100,
            'data' => 'js: function(text,page) {
                                    return {
                                        term: text, 
                                        page_limit: 10,
                                        page: page,
                                        curso: '.$curso.
                                    '};
                                }',
            'results' => 'js:function(data,page) { var more = (page * 10) < data.total; return {results: data, more:more };
                             }',
            'formatResult' => 'js:function(data){
                                 return data.name;
                              }',
            'formatSelection' => 'js: function(data) {
                                return data.name;
                              }',
        ),
    ),
));
?>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => 'Agregar',
    'htmlOptions'=>array(
        'style' => "margin-left:10px"
    )
));
?>    <?php $this->endWidget(); ?>