<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<base href="<?php echo base_url(); ?>">
    <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es"><head>
            <title>¡La red social del mundo!</title>	
            <!-- no cache headers -->
            <meta http-equiv="Pragma" content="no-cache"/>
            <meta http-equiv="no-cache">
                <meta http-equiv="Expires" content="-1"/>
                <meta http-equiv="Cache-Control" content="no-cache"/>

                <!-- end no cache headers -->
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta name="keywords" content="social networking">
                    <meta name="description" content="Some information about your site..."/>
                    <meta name="robots" content="index,follow"/>
                    <meta http-equiv="imagetoolbar" content="no"/>
                    <meta http-equiv="cache-control" content="no-cache"/>
                    <meta http-equiv="expires" content="-1"/>
                    <meta http-equiv="pragma" content="no-cache"/>
                    <link rel="stylesheet" type="text/css" href="public/css/estilo_propio.css"/>
                    <link rel="stylesheet" type="text/css" href="public/css/estilo.css"/>
                    <link rel="shortcut icon" type="image/x-icon" href="public/images/favicon.ico"/>
                    <script type="text/javascript" src="public/script/gloabales-variables.js"></script>
                    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
                    <!--<script type="text/javascript" src="public/js/jquery/jquery.js"></script>
                    <script type="text/javascript" src="public/js/jquery.easing.js"></script>
                    <script type="text/javascript" src="public/js/script.js"></script>
                    <script type="text/javascript" src="public/js/jquery/ui.js"></script>-->
                    <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
                    <script type="text/javascript" src="public/script/jquery.validate-rules.js"></script>
                    <script type="text/javascript" src="public/script/js_moster_usuarios.js"></script>
                    <script type="text/javascript" src="public/script/jquery.validate.js"></script>
                    <script type="text/javascript" src="public/script/autoload.js"></script>
                    <!--<script type="text/javascript" src="public/js/jquery-1.6.1.min.js"></script>-->



                    </head>
                    <body><div id="js_global_tooltip" style="display:none;"></div>
                        <div id="fb-root"></div>
                        <div id="header">			
                            <div class="holder">
                                <div id="header_holder" class="header_logo">
                                    <div id="header_menu_page_holder">
                                        <img height='30px' src='http://www.mosterbook.com/images/logosmbgrouphor.png'>
                                    </div>
                                    <div id="header_left">
                                        <a href="" id="logo">
                                            <img src="public/images/logo.png" class="v_middle" style="margin-top: 10px;">
                                        </a>
                                    </div>
                                    <div id="header_right">


                                        <?php 
                                            if(!isset ($registro)):
                                            if (!$this->config->item('session')): 
                                       ?>
                                            <a id="iniciar" href="#"></a>
                                            <div id="header_top" style="display: none;">                                                  
                                                <div id="header_menu_login">
                                                    <form method="post" id="sesion-start" action="#">
                                                        <div><input type="hidden" name="core[security_token]" value="fe8f74061baade004367fb86927a1380"></div>
                                                        <div class="header_menu_login_left">
                                                            <div class="header_menu_login_label">Nombre de usuario o correo:</div>
                                                            <div><input type="text" id="login-field" name="login-field" value="mosterbook@mosterbook.com" class="header_menu_login_input" tabindex="1" style="color: #CCC"></div>
                                                        </div>
                                                        <div class="header_menu_login_left">
                                                            <div class="header_menu_login_label">Contraseña:</div>
                                                            <div><input type="password" id="password-field" name="password-field" value="" class="header_menu_login_input" tabindex="2"></div>
                                                            <div class="header_menu_login_sub">
                                                                <a href="mbsn/index.php?do=/user/password/request/">¿Olvidó su contraseña?</a>
                                                            </div>
                                                            <span style="color:red;display:none" id="error_session">El nombre de usuario o la contraseña introducidos no son correctos.</span>
                                                        </div>

                                                        <div class="header_menu_login_button">
                                                            <input type="submit" value="Login" tabindex="3" id="button-login">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </form>

                                                </div>

                                            </div>

                                        <?php else: ?>

                                            <div id="header_menu_logout">
                                                <div class="header_menu_login_button">
                                                    <input type="submit" value="Logout" tabindex="3" id="button-logout"/>
                                                </div>
                                            </div>
                                        <?php endif; 
                                            endif;
                                        ?>


                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                        <div id="main_core_body_holder_guest">