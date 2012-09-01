<div id="contenido">
<div id='publicacionesinicio'>
   <div style="padding:10px">
	
		<div id="wrapper">
			<ul class="tabs" style="padding: 0;float: left;margin: 0; margin-bottom: -3px; border-left: 1px solid #CCC;">
				
				<li><a href="#" rel="tabs1" onclick="mostrarocultar('zcomentario','tabsinicio')" class="defaulttab selected" >Publicaciones</a></li>			
				<li><a href="#" rel="tabs2" onclick="mostrarocultar('zinteracciones','tabsinicio')" class="noselected">Interacciones</a></li>
				<li><a href="#" rel="tabs2" onclick="mostrarocultar('zmensajes','tabsinicio')" class="noselected">Mensajes</a></li>
				
			</ul>
			<div class='clear'></div>
			<div style=" border:1px solid #ddd;padding:8px">
				
				<div id="zcomentario" class="tabsinicio">
				<br>
				<input type="text" id="publicacion-input" value="Publicar">	
				<div id="comentarios">
					<div style='text-align:right;margin-right:10px;padding-top:5px'>Todos - Empleo - Amigos</div>
					<hr style='width:97%'>
					
						<?php
						//imprimir publicaciones de la persona
						foreach ($publicaciones->result_array() as $row){
								echo '
								<div class="contenedorcomentario" >
									
									<div class="comentario">
									<p style="margin-top:5px"><img class="fotousercomentario" src="" width="40px" height="40px"> <b>'.$row['nombre'].'</b>
									('.timeSocial($row['fecha']).')
									<br>
									<span class="textocomentario">'.$row['nota'].'</span>
									</p>
									</div>				
									<div class="clear"></div>
								</div>';
							}
						?>
				
				</div>
				</div>
				
				
				<div id="zinteracciones" class="tabsinicio" style="display:none">
				<br>
				<div id="comentarios">
										
						<?php
						//imprimir publicaciones de la persona
						foreach ($publicaciones->result_array() as $row){
								echo '
								<div class="contenedorcomentario" >
									
									<div class="comentario">
									<p style="margin-top:5px"><img class="fotousercomentario" src="http://profile.ak.fbcdn.net/hprofile-ak-ash2/275325_1130923265_1185347030_q.jpg" width="40px" height="40px"> <b>'.$row['nombre'].'</b>
									('.timeSocial($row['fecha']).')
									<br>
									<span class="textocomentario">'.$row['nota'].'</span>
									</p>
									</div>				
									<div class="clear"></div>
								</div>';
							}
						?>
				
				</div>
				</div>
				
				<div id="zmensajes" class="tabsinicio" style="display:none">
				<br>
				<input type="text" id="publicacion-input" value="Para">	
				<input type="text" id="publicacion-input" value="Mensaje">	
				<div id="comentarios">
										
						<?php
						//imprimir publicaciones de la persona
						foreach ($mensajes->result_array() as $row){
								echo '
								<div class="contenedorcomentario" >
									
									<div class="comentario">
									<p style="margin-top:5px"><img class="fotousercomentario" src="'.$row['url_foto'].'" width="40px" height="40px"> <b>'.$row['nombre'].'</b>
									('.timeSocial($row['fecha']).')
									<br>
									<span class="textocomentario">'.$row['mensaje'].'</span>
									</p>
									</div>				
									<div class="clear"></div>
								</div>';
							}
						?>
				
				</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<div id='bloqueizini'>
     
 <div id='conozcas'>
	 <h3>Quizas Conozcas</h3>
	  <div id="conocidos">  
			<div class='userconocidos'><div class='fotoini'></div><div class='nombrefotoini'>Joseph</div><div class='btnconectar'>Conectar</div><div class='clear'></div></div>
			<div class='userconocidos'><div class='fotoini'></div><div class='nombrefotoini'>Joseph</div><div class='btnconectar'>Conectar</div><div class='clear'></div></div>
			<div class='userconocidos'><div class='fotoini'></div><div class='nombrefotoini'>Joseph</div><div class='btnconectar'>Conectar</div><div class='clear'></div></div>
	  </div>
  </div>
  
  <div id='eventos'>
	 <h3>Proximos Eventos</h3>
	  <div id="conocidos">  
			<div class='evento'><div class='eventoimage'></div><div class='nombrefotoini'>Evento 1</div><div class='btnconectar'>Asistir</div><div class='clear'></div></div>
			<div class='evento'><div class='eventoimage'></div><div class='nombrefotoini'>Evento 2</div><div class='btnconectar'>Asistir</div><div class='clear'></div></div>
			<div class='evento'><div class='eventoimage'></div><div class='nombrefotoini'>Evento 3</div><div class='btnconectar'>Asistir</div><div class='clear'></div></div>
	  </div>
  </div>
  
 <div id='eventos'>
	 <h3>Quizas te interese</h3>
	  <div id="conocidos">  
			<div class='evento'><div class='eventoimage'></div><div class='nombrefotoini'>U de A</div><div class='btnconectar'>Me gusta</div><div class='clear'></div></div>
			<div class='evento'><div class='eventoimage'></div><div class='nombrefotoini'>emTech</div><div class='btnconectar'>Me gusta</div><div class='clear'></div></div>
			<div class='evento'><div class='eventoimage'></div><div class='nombrefotoini'>Joshnetz</div><div class='btnconectar'>Me gusta</div><div class='clear'></div></div>
	  </div>
  </div>
  
</div>

<div id='publicidad'>
publicidad

</div>
<div class="clear"></div>

</div>