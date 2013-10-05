<script type="text/javascript">
  cusuarios = new CollectionUsuarios;
  MCRUD = new CRUD;
  MCRUD.set({controller:'videos'});
  MCRUD.set({search:{'fieldsearch':'input-search-video','button-search':'serach-video','area':'sec-videos','method':'SearchVideo'}});

</script>

<div class="btn-group">
  <a class="btn btn-primary" href="#"><i class="icon-folder-open icon-white"></i> Videos</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a data-toggle="modal" href="#mvideos" id="nuevo_video"><i class="icon-pencil"></i> Nuevo</a></li>
  </ul>
</div>


<form class="form-search frm-search-math" id="frm-search-video">
  <div class="input-append">
    <input type="text" class="span2 search-query" id="input-search-video" placeholder="Buscar video">
    <button type="submit" id="serach-video" class="btn">Buscar</button>
  </div>
</form>
<section id='sec-videos'>

	<?php
	//print_r($videos->result_array());
	$videos = $videos->result_array();
	$i=0;
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$isFirefox = false;
	if(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched))$isFirefox = true;
		foreach ($videos as $row) {
			echo "<article ".(!$isFirefox?"class='art-video'":"class='art-video-b'")." video='mvideos".$i."'>
					<p><b>Titulo: ".$row['nombre']." </b></p>
					<article>
						<a href='javascript:void(0)'><img src='".base_url()."public/images/".(strpos($row['url'],'youtube')?"reproductor2.png":"reproductor3.png")."'/></a>
					</article>
					<p><b>Descripcion: ".$row['descripcion']."</b></p>";
			if(strpos($row['url'],'youtube'))
			{
				if(!$isFirefox){
					echo '<article class="videor" style="display:none"><iframe width="500" height="320" src="'.$row['url'].'" frameborder="0"></iframe></article>';  
				}else {
					echo ' 
						<div id="mvideos'.$i.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
					        <a data-dismiss="modal" class="close">×</a>
					        <h3>'.$row['nombre'].'</h3>
					     </div><div style="text-align:center"><iframe  width="500" height="320" src="'.$row['url'].'" frameborder="0"></iframe></div>
					  	<p><b>Descripcion: '.$row["descripcion"].'</b></p>
					  </div><script>$("#mvideos'.$i.'").modal({show:false})</script>';	
					  
				}
			}else{
				echo '<article class="videor" style="display:none"><video controls width="500" height="320" controls>
							<source src="'.$row['url'].'.mp4" type="video/mp4" />
							<source src="'.$row['url'].'.ogv" type="video/ogg" />
							<source src="'.$row['url'].'.webm" type="video/webm"/>
							Este video no es soportado por el navegado. Descargalo <a href="'.$row['url'].'.webm">aqui</a>.
						</video></article>';
			}
			echo "</article>";
			$i++;
		}
	?> 
	<article id="win-view-video"><div id='win-view-video-content'></div></article>
<script>
  	$(".art-video article").hover(ChangeHover,RestartHover);
    windowVideo = $("#win-view-video").kendoWindow({
        actions: [ "Minimize", "Close"],
        width: "500",
        height: "320",
        modal: true,
        draggable : false,
        resizable: false,
        title: "Video",
        visible: false,
        open:function(e){
        	//this.wrapper.css({ top: 100 });
        },
        close: function(e){
        	$("video").each(function () { this.pause() });
        	$("iframe").each(function() { 
			    src = $(this).attr('src');
			    $(this).attr('src','');
			    $(this).attr('src',src);
			});
        }
    });
</script>
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
	          <label class="radio">
				<input type="radio" class="opt-video" name="optionsRadios" id="yesVideo" value="Video" checked>Video
			  </label>
				<label class="radio">
				<input type="radio" class="opt-video" name="optionsRadios" id="NoVideo" value="Link">Link
			  </label>
			<div id="SubirVideo">  
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
						<!--<option value="math">MathForDummies</option>-->
						<option value="youtube">Youtube</option>
					</select>
				</div>
				<div id="droparea" style=""><p class="text-success">Arrastra video</p></div>
				<div id="video-acepted"><img src="<?php echo base_url();?>public/images/reproductor1.png"></div>
			</div>
			<div id="TextLink" style="display:none">
				<div class="control-group">
	              <label class="control-label" for="inputIcon">Link youtube</label>
	                  <span class="add-on"><i class="icon-pencil"></i></span>
	                  <input type="text" id="linkVideo" class="input-xlarge" name="titlevideo" placeholder="www.youtube.com" />
	          	</div>
			</div>
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