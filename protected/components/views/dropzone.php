<?php
    $this->registerScriptJS();
    $this->registerStyleCSS();
?>
<form action="<?php echo $this->action; ?>" class="dropzone" id='aform'>
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>

<?php 

Yii::app()->clientScript->registerScript("search", "

$(document).on('submit','#aform',function(){

	console.log('sdfsdfdssdf sf df');

});

Dropzone.prototype.removeFile=function(file){
	console.log(file);
	this.emit(\"removedfile\", file);
};

");
	
?>