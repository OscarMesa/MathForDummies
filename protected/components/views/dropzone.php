<?php
    $this->registerScriptJS();
    $this->registerStyleCSS();
?>
<form action="<?php echo $this->action; ?>" class="dropzone" id='aform'>
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
<?php
	$f= Yii::app()->db->createCommand("select * from documentos_adjuntos where id_usuario_doc_adj='".Yii::app()->user->getId()."'")->queryAll();
	
	function formatBytes($size, $precision = 2)
	{
	    $base = log($size, 1024);
	    $suffixes = array('', 'k', 'M', 'G', 'T');   

	    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
	}

	if($f){
		foreach ($f as $val) {
			echo '<div class="dz-preview dz-file-preview dz-processing dz-success dz-complete" cod_img="'.$val['id_doc_adj'].'">  
							<div class="dz-image">
								<img data-dz-thumbnail="">
							</div>  
							<div class="dz-details">    
								<div class="dz-size">
									<span data-dz-size="">
									<strong>'.formatBytes($val['tamanio_doc_adj']).'</strong></span>
								</div>    
								<div class="dz-filename">
									<span data-dz-name="">'.$val['nom_original_doc_adj'].'</span>
								</div>  
							</div>
							<a data-dz-remove="" href="javascript:undefined;" class="dz-remove">Eliminar</a>
				  </div>';
		}
	}
?>
</form>


<?php 

Yii::app()->clientScript->registerScript("script_dropzone", "

Dropzone.prototype.removeFile=function(file){
	this.emit(\"removedfile\", file);
	$(file.previewElement).attr('cod_img');
};

Dropzone.prototype.on('success', function (rep,h) {
	data = $.parseJSON(h);
    $(rep.previewElement).attr('cod_img', data.id);
});


$(document).on('click', '#aform .dz-preview .dz-remove',function(e){
	obj = $(this).parent();
	$.post('".Yii::app()->createUrl('contenidos/eliminar_documento_adjunto')."',{cod:obj.attr('cod_img')},function(){
			obj.remove();
	});
});

");
	
?>