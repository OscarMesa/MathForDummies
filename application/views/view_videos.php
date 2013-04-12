<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Videos</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a data-toggle="modal" href="#mvideos" id="nuevo_video"><i class="icon-pencil"></i> Nuevo</a></li>
  </ul>
</div>


<form class="form-search frm-search-math" id="frm-search-video">
  <div class="input-append">
    <input type="text" class="span2 search-query" id="input-search-curse" placeholder="Buscar video">
    <button type="submit" id="serach-curse" class="btn">Buscar</button>
  </div>
</form>
<section id='sec-videos'>
	<video id="youtube1" width="640" height="360">
    	<source src="http://www.youtube.com/watch?v=nOEw9iiopwI" type="video/youtube" >
	</video>
	<?php
	print_r($videos);
		foreach ($videos->result_array() as $row) {
			if(strpos('youtube',$row['url']))
			{
				echo '<iframe type="text/html" width="640" height="385" src="'.$row['url'].'" frameborder="0"></iframe>'  
			}
		}
	?>
	<!--<article class='art-video'>
		<p><b>Titulo: </b></p>
		<article>
			<a href='javascript:void(0)'><img src="<?php echo base_url(); ?>public/images/reproductor2.png" /></a>
		</article>
		<p><b>Descripcion: </b></p>
	</article>

	<article class='art-video'>
		<p><b>Titulo: </b></p>
		<article>
			<a href='javascript:void(0)'><img src="<?php echo base_url(); ?>public/images/reproductor3.png" /></a>
		</article>
		<p><b>Descripcion: </b></p>
	</article> -->
</section>

<div id="mvideos" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h3>Nuevo Curso</h3>
     </div>

     <form id="frm-video" action="<?php base_url();?>videos/upload" method="POST" enctype="multipart/form-data">
		<div style='height:39em;overflow-y:scroll'>	
			 <div class="control-group">
	              <label class="control-label" for="inputIcon">Titulo</label>
	                  <span class="add-on"><i class="icon-pencil"></i></span>
	                  <input type="text" id="Techer" class="input-xlarge" name="title" placeholder="Titulo" required="required" />
	          </div>
			<div class="control-group">
	              <label class="control-label" for="inputIcon">Seleccione video</label>
					<div class="fileupload fileupload-new" data-provides="fileupload"><span class="add-on"><i class="icon-pencil"></i></span>
						<div class="input-append" style="display:inline-block">
						<div class="uneditable-input span3"><i class="icon-file fileupload-exists">
						</i> <span class="fileupload-preview" id="title-video"></span>
					</div><span class="btn btn-file"><span class="fileupload-new">Select file</span>
					<span class="fileupload-exists">Change</span>
					<input type="file" name="fileselect[]" id="upload" /></span><a href="#" id='remove-video' class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
						</div>
					</div>
			</div>		
		    <div class="control-group">
		    	<label class="control-label" for="inputIcon">Servidor</label>
		    	<span class="add-on"><i class="icon-pencil"></i></span>
		         <select id='server-video' class="selectpicker" dropup>
					<option value="math">MathForDummies</option>
					<option value="youtube">Youtube</option>
				</select>
			</div>
			<div id="droparea" style=""><p class="text-success">Arrastra video</p></div>
			<div id="video-acepted"><img src="<?php echo base_url();?>public/images/reproductor1.png"></div>

		    <div class="control-group">
		    	<label class="control-label" for="inputIcon">Descripcion</label>
		    	<span class="add-on"><i class="icon-pencil"></i></span>
		         <textarea rows="5" style='width: 357px; height: 121px;' name='description'	/></textarea>
			</div>
			<input type='hidden' name="type" value='video'>
			<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
			<input type="submit" id='btn-validateinfovideo' style='display:none'name="submit" value="upload" />
	  </div>
	</form>

	<div class="modal-footer">
        <a href="#" id="btn-saveinfovideo" class="btn btn-success">Guardar</a>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
    </div>
</div>

<script src="<?php echo base_url('public/script/upload.js'); ?>"></script>
<script src="<?php echo base_url('public/script/modernizr.custom.js'); ?>"></script>
<script>
 var select_server=$('#server-video').selectpicker({size: 4});
 $('#server-video').change(function (e) {
 	console.log(e);
 })
</script>