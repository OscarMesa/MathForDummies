$(document).ready(function()
    {
        /*
        * Perder foco:  Esta funcion JQuery permite que en el momento en que el campo login-field (login), pierda el foco, su valor vaya cambiando.
        * @author Oskar
        * @returns Establece el nuevo valor de la caja de texto con forme al si esta seleccionado o si se a perdido el foco.
        */
        $('#login-field').focus(function() {
            var input = $(this);
            if (input.val() == 'mosterbook@mosterbook.com') {
                input.val('');
                input.css('color','#070B19');
            }
        }).blur(function() {
            var input = $(this);
            if (input.val() == '') {
                input.val('mosterbook@mosterbook.com');
                input.css('color','#CCC');
            }
        }).blur();
        
        /*
        * Finalizar sesion:  Esta funcion JQuery permite que en el momento en que se haga click sobre el boton del logout, este realice un ajax, con el fin de terminar la session del usuario.
        * @author Oskar
        * @returns Su retorno será, renderizar la pagina a la de inicio y sacarlo de la aplicacion, borrando la session y cokies creadas.
        */
        $('#button-logout').click(function(){
            var resquest = $.ajax({
                type : 'POST',
                url: glabal_vars.server+"usuario/TerminarSesion",
                cache: true,
                dataType:'JSON'
            }).done(function(data){
                window.location = glabal_vars.server;
            });
        });

        /*
        * Validar Usuario:  Esta funcion JQuery permite que en el momento en que se haga click sobre el boton del login, este realice un ajax, con el fin de validar si el usuario existe o no.
        * @author Oskar
        * @returns Su retorno sera un mensaje, el cual se plasma en un span, en caso de que los datos no sean validos. 
        *          En caso contrario inicia sesion y será enviado a la pagina de inicio de mosterbook.
        *          En todos los casos retorna False, ya que por ser un formulario, no se desea que renderice la pagina.
        */
        $('#sesion-start').submit(function(){
            var request = $.ajax({
                type : 'POST',
                url : glabal_vars.server+"usuario/IniciarSesionUsuario",
                cache : true,
                data : $(this).serialize(),
                dataType: 'JSON'
            }).done(function(data){
                if(data.res=='true'){
                   window.location = glabal_vars.server + 'inicio';
                }else{
                    $('#error_session').css("display","block");
                    $('#password-field').val('');
                    $('#login-field').val('');
                }
            });
            
            return false;
        });
        $("#header_top").slideUp(300);
        $('.tabs a').click(function(event){
            event.preventDefault();
            switch_tabs($(this));
        });
 
        switch_tabs($('.defaulttab'));
        $("#header_top").click(function(event){
            event.stopPropagation();
        });
        $('#iniciar').click(function(event){
            $('#header_top').slideDown(300);
            event.stopPropagation();
            event.preventDefault();
            $('#iniciar').css("display","none");
        });
        $(document).click(function(){
                $("#header_top").slideUp(300);
                $('#iniciar').css("display","block");
                $('#error_session').css("display","none");
        });
        
    });
	 
function switch_tabs(obj)
{
    $('.tab-content').hide();
    $('.tabs a').removeClass("selected");
    $('.tabs a').addClass("noselected");
    var id = obj.attr("rel");
	 
    $('#'+id).show();
    obj.removeClass("noselected");
    obj.addClass("selected");
}
	
function mostrarocultar(a,b)
{
    $("."+b).hide();
    $("#"+a).show();
}

$("#header_top").css('display','block');