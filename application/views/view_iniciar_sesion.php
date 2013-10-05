<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="<?php echo base_url('public/script/jquery.js'); ?>"></script>
<script src="<?php echo base_url('public/script/jquery-ui.js'); ?>"></script>
    
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>public/images/img-ico.png">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/kendo-css/kendo.common.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/kendo-css/kendo.default.min.css">

<link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-fileupload.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-fileupload.css">

<script src="<?php echo base_url('public/script/MathForDummies.js'); ?>"></script>
<script src="<?php echo base_url('public/script/edit.js'); ?>"></script>
<script src="<?php echo base_url('public/script/sha1.js'); ?>"></script>

<script src="<?php echo base_url('public/script/json2.js'); ?>"></script>
<script src="<?php echo base_url('public/script/underscore-1.3.1.js'); ?>"></script>
<script src="<?php echo base_url('public/script/backbone.js'); ?>"></script>

<title>PoliAuLink</title>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
 <script src="<?php echo base_url(); ?>public/script/prefixfree.min.js"></script> 
 <script src="<?php echo base_url(); ?>public/script/modernizr.js"></script> 

<script type="text/javascript" src="<?php echo base_url(); ?>public/script/slider/jquery.roundabout.js"></script>


<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css">


<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="js/belatedPNG.js"></script>
<script>
  DD_belatedPNG.fix('*');
</script>
<![endif]-->
  <script src="<?php echo base_url('public/script/kendo.web.min.js'); ?>"></script>
  <script type="text/javascript">
    base_url = "<?php echo base_url();?>";
    server = "http://<?php echo $_SERVER['SERVER_NAME'];?>/";  
    url_relativo = "<?php echo uri_string();?>";
  </script>
</head>

<body>

<article style="display:none" id='view-login'>

    <div id="box">
        <div class="elements">
            <div class="avatar"></div>
                <form action="" method="post" id="frmlogin">
                    <input type="email" id='name' name="name" class="input-small" placeholder="Correo" required/>
                    <input type="password" id='password' name='password' class="input-small" placeholder="•••••••••" required/>
                    <div class="forget"><a href="#">Registrar</a></div>
                    <div class="checkbox">
                    <input id="check" name="checkbox" type="checkbox" value="1" />
                    <label for="check">Recuperar</label>
                    </div>
                    <div class="remember">Recordar?</div><br/>
                    <input type='submit' value='Entrar' class="btn" id='btn-login'>
                    <input type='submit' id="btn-validatesession" style="display:none">
                </form>
            </div>
        </div>
</article>

<div id="loader-view">
  <article id='loader-view-canvas'>
  
  </article>

  <div id="message-error">
        <div class="modal-header">
          <h3 class="text-error" ></h3>
        </div>
        <div class="modal-body">
          <span class="label label-important"></span>
        </div>
        <div class="modal-footer">
        <button class="btn btn-large" id="close-message-error" type="button">Aceptar</button>
        </div>
</div>  
</div>
</body>
</html>