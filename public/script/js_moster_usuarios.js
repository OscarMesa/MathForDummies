/**
* @fileoverview Libreria con funciones de utilidad
*
* @author oskar
* @version 0.1
*/
/**
* Funcion general Ready JQuery
*/
/**
* comprobar:  Esta funcion nos permite validar en tiempo real el nombre de usuario y email, con la finalidad que no se repitan.
* @param {elem} Coresponde al componente o caja de texto en la cual se esta parado, ya que esta funcion es generica.
* @returns {boolean} Retorna true o false, lo cual quiere decir que se enconotro o no un dato igual que ya fue insertado.
*/

var RecaptchaOptions = {
    theme : 'custom',
    custom_theme_widget: 'divrecaptcha',
    lang : 'es',
    tabindex : 0,
    callback: Recaptcha.focus_response_field
 };


function comprobar(elem){
    var datoe=elem.val();
    var fune=elem.attr("rel").split(",");
    var parameters = {
        'table':fune[0],
        'field':fune[1],
        'dato':datoe
    };
    if(datoe.length > 0){   
        var request=$.ajax({
            type: 'POST',
            url: glabal_vars.server+"usuario/Existencia_Mail_User/",
            cache: true,
            data:     parameters,
            dataType: 'json'
        }).done(function(data) {
                
            $("#"+elem.attr('id')+"-s").html("");
            if(data.res == 'true'){
                if($("#"+fune[2]).length==0) 
                    $("#errormsg_"+elem.attr('id')).html("El " + elem.attr('name') + " ya está siendo usado.");
                $("#errormsg_"+elem.attr('id')).css('color', 'red');
                $('#'+elem.attr('id')).css('border-color', 'red');
            }else{
                $('#'+elem.attr('id')).css('border-color','#D7D7D7');
                $("#errormsg_"+elem.attr('id')).html('');
            }
        });
    }
    return true;		
}

$(document).ready(function() {
    
    $(":input").focus(function(){
        if(this.type=='text' || this.type=='password' || this.type=='email'){
            Limpiar_Field(this);
        }
    });
    $("#formulario").validate();
    $('.comprueba').focusout(function(){
        comprobar($(this));
    });
    $('#formulario').submit(function(){
        if($("#formulario").valid()){
            var request=$.ajax({
                type: 'POST',
                url: glabal_vars.server+"usuario/Insertar_Usuario/",
                cache: true,
                data:  $(this).serialize(),
                dataType: 'json'
            }).done(function(data) {
//                
                $('#formulario').find(':input').each(function(){
                        Limpiar_Field(this);
                });
                
                if(data.respuesta=='true'){
                    alert('usuario insertado');
                }else{
                    $.each(data, function(k,v){
                        $.each(v, function(k1,v1){
                            $("#errormsg_"+k).html(v1);
                            $("#"+k).css('border-color', 'red');
                            return;
                        });
                    });
                    if(data.recaptcha.response=='true')
                        $("#errormsg_recaptcha").html('');
                    else
                        Recaptcha.reload();
                }
            });
        }
        return false;
        
    });


                                                                      
});   
        		

function Limpiar_Field(nodo){
    $("#"+nodo.id).css('border-color', '#D7D7D7');
    $("#errormsg_"+nodo.id).html('');
    $("span[for='"+nodo.id+"']").html('');
    $("#error").html('');
    $("#errormsg_"+nodo.id).css('border-color', 'red');
}




















