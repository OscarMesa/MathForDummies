
<!DOCTYPE html>

<html lang="es">
<head>
<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('public/script/MathForDummies.js'); ?>"></script>
<script src="<?php echo base_url('public/script/edit.js'); ?>"></script>
<script src="<?php echo base_url('public/script/sha1.js'); ?>"></script>

<title>Math For Dummies</title>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
 <script src="<?php echo base_url(); ?>public/script/prefixfree.min.js"></script> 
 <script src="<?php echo base_url(); ?>public/script/modernizr.js"></script> 
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
  <script type="text/javascript">base_url = "<?php echo base_url();?>";</script>

</head>

<body>
<div id="wrap">
<section id="left">
  <header id="mainheader">
  <a href="index.html"><article id="logo" width="250" height="120" alt="Math For Dummies"><p>Math For Dummies</p></article> </a>
    <h1 id="sitename">Math For Dummies, aprende las matemáticas de una forma rapida</h1>
    </header>
    <nav id="mainnav">
    <ul>
        <li class="current"><a href="#">Inicio</a></li>
        <li><a href="#">Mensajes</a></li>
        <li><a href="#">Editar</a></li>
        <li><a href="#">Configuracion</a></li>
    </ul>
  </nav>

  <div id="search">
      <form action="#">
        <div id="searchfield"><input type="text" name="search" id="s"></div>
        <div id="searchbtn"><input type="image" src="<?php echo base_url();?>public/images/searchgobtn.png" alt="search"></div>
        </form>
  </div>
    
    <section id="sidebar">
      <div class="sb-block" id="sb-photoProfile">
        <img src="<?php echo base_url();?>public/images/perfil/default.png"/>
      </div>

