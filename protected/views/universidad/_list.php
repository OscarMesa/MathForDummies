<?php
$criteria = new CDbCriteria();
$criteria->alias = 'universidad';
//$criteria->params = array('3');
$dataProvider = new CActiveDataProvider('Universidad', array(
    'criteria' => $criteria,
    'pagination' => array(
        'pageSize' => 20,
    )
        )
);
?>

<form class="form-search buscador" id="buscador-titulo-universidad" >
    <div class="input-append">
        <input type="text" id="texto-filtro-universidad" class="span6 search-query btn-large" placeholder="Buscar campos" style="padding: 11px 19px;font-size: 17.5px;">
        <button type="submit" class="btn btn-large">
            <i class="icon-search"></i>
            Buscar
        </button>
    </div>
</form>
<?php 

$model = new Usuarios();
// Working with selector
$campos = array('nombre_universidad' => 'Universidad','state_universidad' => 'Estado');
$modUsuario = new Usuarios();
$this->widget('ext.select2.ESelect2',array(
  'id'=>'campos-universidad',
  'name'=>'campos-universidad',
  'data'=>$campos,
  'options' => array(
      'width'=>'200',
      'placeholder' => 'Columna'
  ),
  'htmlOptions'=>array(
    'multiple'=>'multiple',
  ),
));
?>

<div class="form-actions">
    <form action="<?php echo Yii::app()->createUrl('universidad/create');?>" method="POST">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'label'=>'Nuevo',
		)); ?>
    </form>     
</div>

<div id="grid-lista-universidades">
<?php

$this->renderPartial('_gridUniversidades', array('dataProvider' => $dataProvider));

?>



</div>

<script type="text/javascript">

    $(document).on('submit', '#buscador-titulo-usuario', cargarFiltro);

    function cargarFiltro(e)
    {
        if ($('#texto-filtro-usuario').val() != '')
        {
            array = $('#campos').select2("data");
            $.ajax({
                type: 'post',
                data: 'data=' + $('#texto-filtro-usuario').val()+'&columnas='+JSON.stringify(array),
                url: '<?php echo Yii::app()->createUrl('usuarios/ajaxFiltroUsuarios') ?>',
                success: function(r) {
                    $('#grid-lista-programas').html(r);
                },
                error: function(r) {
                    console.log(r);
                }
            });
        }
        e.preventDefault();
    }
</script>

