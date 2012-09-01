        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <base href="<?php echo base_url();?>">
		<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es"><head>
		<title>¡La red social del mundo!</title>	
		<!-- no cache headers -->
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">

		<!-- end no cache headers -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="social networking">
		<meta name="description" content="Some information about your site...">
		<meta name="robots" content="index,follow">
		<meta http-equiv="imagetoolbar" content="no">
		<meta http-equiv="cache-control" content="no-cache">
		<meta http-equiv="expires" content="-1">
		<meta http-equiv="pragma" content="no-cache">
		<link rel="stylesheet" type="text/css" href="public/css/estilo_propio.css">
		<link rel="shortcut icon" type="image/x-icon" href="public/images/favicon.ico">
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
       <!--         <script type="text/javascript" src="public/js/jquery/jquery.js"></script>
		<script type="text/javascript" src="public/js/jquery.easing.js"></script>
		<script type="text/javascript" src="public/js/script.js"></script>
		<script type="text/javascript" src="public/js/jquery/ui.js"></script>-->
		<script type="text/javascript" src="public/js/jquery.validate.js"></script>
		<script type="text/javascript" src="public/js/jquery.validate-rules.js"></script>
		<script type="text/javascript">
			function comprobar(elem){
						var datoe=elem.val();
						var fune=elem.attr("rel").split(",");
						var request=$.ajax({
						  type: "POST",
						  url: "request/users.php",
						  data: {fun:fune[0],dato:datoe},
						  dataType:"json"
						}).done(function(data) { 
							if(data.res==1){
								if($("#"+fune[2]).length==0)
									elem.after("<span class='erroraja' id='"+fune[2]+"' generated='true'>El "+fune[1]+" ya está siendo usado.</span>");
								return false;
							}else{
								$("#"+fune[2]).remove();
								return true;
							}
						});
				return true;		
			}
			$(document).ready(function(){
                        
                                        
					$("#formulario").validate();
					$('.comprueba').focusout(function(){
                                                alert('hola1');
						comprobar($(this));
					});
					$('#formulario').submit(function(){
						var x=false;
						$('.comprueba').each(function(){
							if(comprobar($(this)))
								x=true;
						});
                                                alert(x);
						return x;
					});
										 
					
				});
				
				
		</script>
		<link rel="stylesheet" type="text/css" href="css/layout.css" />
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
	
		
	</head>
	<body><div id="js_global_tooltip" style="display:none;"></div>
<div id="fb-root"></div>
<div id="header">			
			<div class="holder">
				<div id="header_holder" class="header_logo">				
					<div id="header_left">
						<a href=">mbsn/index.php?do=/" id="logo">
						<img src="public/images/logo.png" class="v_middle" style="margin-top: 40px;">
						</a>
					</div>
					<div id="header_right">
						<div id="header_top">
							<div id="header_menu_holder">
								<div id="header_menu_login">
										<form method="post" action="mbsn/index.php?do=/user/login/">
									<div><input type="hidden" name="core[security_token]" value="fe8f74061baade004367fb86927a1380"></div>
									<div class="header_menu_login_left">
												<div class="header_menu_login_label">Correo:</div>
												<div><input type="text" name="val[login]" value="" class="header_menu_login_input" tabindex="1"></div>
												<div class="header_menu_login_sub">
													<label><input type="checkbox" name="val[remember_me]" value="" checked="checked" tabindex="4"> Keep me logged in</label>
												</div>
											</div>
											<div class="header_menu_login_right">
												<div class="header_menu_login_label">Contraseña:</div>
												<div><input type="password" name="val[password]" value="" class="header_menu_login_input" tabindex="2"></div>
												<div class="header_menu_login_sub">
													<a href="mbsn/index.php?do=/user/password/request/">¿Olvidó su contraseña?</a>
												</div>
											</div>
											
											<div class="header_menu_login_button">
												<input type="submit" value="Login" tabindex="3">
											</div>
											<div class="clear"></div>
</form>

								</div>
							</div>							
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
						
			<div id="header_menu_page_holder">	
				<div class="holder">
					<div id="header_menu">				
						<ul>		
								<li><a href="" class="ajax_link">Inicio</a></li>
								<li><a href="" class="ajax_link">Servicio</a></li>
								<li><a href="" class="ajax_link">Beneficios</a></li>
								<li><a href="" class="ajax_link">Proyecto Social</a></li>
								<li><a href="" class="ajax_link">Contáctenos</a></li>
								
						</ul>
						<div class="clear"></div>
					</div>		
				</div>			
			</div>	
</div>
		
		<div id="main_core_body_holder_guest">