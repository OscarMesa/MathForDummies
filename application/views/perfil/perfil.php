<div id="contenido">
<div id="zonaperfilinfo">
	<div id="info-perfil">
		<div class="left">
        <div id="fotoperfil">
			<div id="marco-foto-perfil">
				<img width="100%" src="http://png-3.findicons.com/files//icons/1580/devine_icons_part_2/128/account_and_control.png">
			</div>
		</div>
		</div>
		<div class="left">
		<div id="infogeneralperfil">            
            <h1><?php echo $usuario['nombre']; ?></h1>
            <span><b>Género: </b><?php echo ($usuario['genero']==0)?'Masculino':'Femenino'; ?></span>
        </div>
		</div>

			

        <div class="clear"></div> 
		
    </div>
	<div id="wrapper">
			<ul class="tabs" style="padding: 0;float: left;margin: 0; margin-bottom: -3px; border-left: 1px solid #CCC;">
				<?php
				if(!is_null($universidades)){
				?>
					<li><a href="#" class="defaulttab selected" rel="tabs1">Profesional</a></li>
				<?php
				}
				if(isset($empleos) and !is_null($empleos)){
				?>
				<li><a href="#" rel="tabs2" class="noselected">Laboral</a></li>
				<?php
				}
				?>
				<div class="clear"></div>
			</ul>
		 
			<div class="tab-content" id="tabs1">
				
					<?php
					//imprimir publicaciones de la persona
					foreach ($universidades->result_array() as $row){
							echo '<div class="info">
							<span class="title">'.$row['nombre_universidad'].'</span>';
							echo '<span class="extra">'.$row['nombre_profesion'].'</span>
								</div>';					
					}
					?>
				
				
			</div>
			<div class="tab-content" id="tabs2">
				<?php
					//imprimir publicaciones de la persona
					foreach ($empleos->result_array() as $row){
							echo '<div class="info">
							<span class="title">'.$row['descripcion'].'</span>';
							echo '<span class="extra">'.$row['nombre_profesion'].'</span>
								</div>';
					}
					?>
			</div>
			
		</div>
</div>
<div id="derechaperfil">
   <div style="padding:12px">
	<a href="#" id="conectar"></a>
	<div class="clear"></div>
	<?php if(/*isOwnUser()*/false){ ?>
	<div>
		<input type="text" id="publicacion-input" value="Publicar">
	</div>
	<?php } ?>
	
	<div id="comentarios">
		<?php
		//imprimir publicaciones de la persona
		foreach ($publicaciones->result_array() as $row){
				echo '<div class="comentario">
				<b>'.$row['nombre'].'</b>
				('.timeSocial($row['fecha']).')
				<br>
				'.$row['nota'].'</div>';
			}
		?>
	</div>
   </div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>