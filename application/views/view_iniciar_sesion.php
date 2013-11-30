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


        <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css">


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
            base_url = "<?php echo base_url(); ?>";
            server = "http://<?php echo $_SERVER['SERVER_NAME']; ?>/";
            url_relativo = "<?php echo uri_string(); ?>";
        </script>
    </head>

    <body>

        <section style="display:inline-block; overflow:hidden; display:none; height:250px; width:360px;" id='view-login'>
            <div id='contenedor_ventanas' style='height:250px; width:1080px;'>
                <article id="box" style="float:left;">
                    <div class="elements">
                        <div class="avatar"></div>
                        <form action="" method="post" id="frmlogin">
                            <input type="email" id='name' name="name" class="input-small" placeholder="Correo" required/>
                            <input type="password" id='password' name='password' class="input-small" placeholder="•••••••••" required/>
                            <div class="forget">
                                <a href="javascript:void(0);" id='btn-registrar'>Registrar</a>
                                <a href="javascript:void(0);" id="btn-recuperar" style="margin-left:9px">Recuperar</a>                          
                            </div>

                            <div class="checkbox">
                                <input id="check" name="checkbox" type="checkbox" value="1" />
                                <label for="check">Recuperar</label>
                            </div>
                            <div class="remember">Recordar?</div><br/>
                            <input type='submit' value='Entrar' class="btn" id='btn-login'>
                        </form>
                    </div>
                </article>
                <article id='view-recuperar' style="float:left;">
                    <div id="box">
                        <div class="elements">
                            <div id='img_recuperar'></div>
                            <form action="" method="post" id="frmrecuperar">
                                <label>Ingresar el correo con el que realizo el registros.</label>
                                <input type="text" id='txt-recuperar' name='txt-recuperar' class="input-large" placeholder="" required/>
                                <span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg" role="alert" data-for="nombre"><span class="k-icon k-warning"> </span></span>
                                <a href="javascript:void(0);" id="volver-recuperar">Volver</a>
                                <input type='button' value='Enviar' class="btn" id='btn-recuperar-envio'/>
                            </form>
                        </div>
                    </div>
                </article>
                <article id="box" style="float:left;">
                    <div class="elements">
                        <div class="avatar"></div>
                        <form action="" method="post" id="frmregistro">
                            <input type="text" id='nombre' name="nombre" class="input-large" placeholder="Nombre" required data-message="El nombre es necesario"/>
                            <input type="email" id='correo' name='correo' class="input-large" placeholder="Correo" required data-message="El correo es necesario"/>
                            <select name='perfil' id='perfil'  required>
                                <option value='1'>Estudiante</option>
                                <option value='2'>Docente</option>
                            </select>
                            <a href='javascript:void(0);' id='volver-registro'>Volver</a>
                            <!--<button class="btn" id="bnt-save-infouser">Guardar</button>-->
                            <input type='button' value='Guardar' class="btn"  id='btn-guardar'>
                        </form> 
                    </div>
                </article>
            </div>
        </section>


        <script type="text/javascript">
            $(document).on('ready', iniciar);

            function iniciar()
            {


                var validatable = $("#frmregistro").kendoValidator({
                    errorTemplate: "<span class='k-widget k-tooltip k-tooltip-validation k-invalid-msg' role='alert'><span class='k-icon k-warning'> </span>#=message#</span>",
                    messages: {
                        custom: "Please enter valid value for my custom rule",
                        required: "Campo requerido",
                        email: "Correo invalido"
                    }
                }).data();


                //$("#view-recuperar").toggle( "slide" );
                $('#btn-recuperar').click(function() {
                    $("#view-login").animate({
                        scrollLeft: 360
                    }, 900);
                });

                $('#btn-registrar').click(function() {
                    $("#view-login").animate({
                        scrollLeft: 800
                    }, 900);
                });

                $('#volver-recuperar').click(function() {
                    $("#view-login").animate({
                        scrollLeft: 0
                    }, 900);
                });

                $('#volver-registro').click(function() {
                    $("#view-login").animate({
                        scrollLeft: 0
                    }, 900);
                });

                $(document).on('focus', '#txt-recuperar', function(e) {
                    $("#error-recuperar").css('display', 'none');
                });

                $(document).on("click", "#btn-recuperar-mail", function(e) {
                    $.post(base_url + "seguridadacceso/recuperar", "email=" + $('#txt-recuperar').val(), function(data) {
                        if (data.rpt)
                        {
                            $("#error-recuperar").html(data.mensaje);
                            $("#error-recuperar").css('display', 'inline-block');
                        } else {
                            $("#error-recuperar").css('display', 'inline-block');
                            $("#error-recuperar").html(data.mensaje);
                        }
                    }, "JSON");
                    e.preventDefault();
                    return false;
                    //    return;
                });
                
                $(document).on("click","#bnt-save-infouser",function(e) {
                    if (validatable.validate() === true) {
                        $.post(base_url + "usuario/NewUserFast", $(this).serialize(), function(e) {
                            console.log(e);
                        }, 'JSON');
                    } else {
                        console.log(validatable.errors())
                    }
                    e.preventDefault();
                    return false;
                });





                $("#perfil").kendoDropDownList();


                setTimeout(function() {
                    abrir();
                }, 250);
            }

            $(document).on('click', "#btn-recuperar-envio", function(e) {
                
                $.post(base_url + "seguridadacceso/recuperar", {recuperar: $("txt-recuperar").val()}, function(r) {
                    alert("hola");
                });
                e.prependDefault();
            //    return false;
            });
            
            btn-guardar
            function getMessage(input) {
                return input.data("message");
            }
        </script>

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
