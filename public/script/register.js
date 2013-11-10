function validarregistro1()

{
    var sw = 0;
    document.getElementById("correonuevousuario").value = document.getElementById("correonuevousuario").value.replace(" ", "");
    document.getElementById("usuarionuevousuario").value = document.getElementById("usuarionuevousuario").value.replace(" ", "");
    document.getElementById("cotranuevousuario2").value = document.getElementById("cotranuevousuario2").value.replace(" ", "");
    document.getElementById("cotranuevousuario").value = document.getElementById("cotranuevousuario").value.replace(" ", "");




    if ($('#nombrenuevousuario').val() == '')
    {
        $('#mensaje_nombrenuevousuario').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else
    {
        $('#mensaje_nombrenuevousuario').html('<span style="color:red;font-size:10px"></span>');
    }

    if ($('#correonuevousuario').val() == '')
    {
        $('#mensaje_correonuevousuario').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else
    {
        $('#mensaje_correonuevousuario').html('<span style="color:red;font-size:10px"></span>');
    }

    if ($('#usuarionuevousuario').val() == '')
    {
        $('#mensaje_usuarionuevousuario').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else
    {
        $('#mensaje_usuarionuevousuario').html('<span style="color:red;font-size:10px"></span>');
    }


    if ($('#cotranuevousuario').val() == '')
    {
        $('#mensaje_cotranuevousuario').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else
    {
        $('#mensaje_cotranuevousuario').html('<span style="color:red;font-size:10px"></span>');
    }

    if ($('#cotranuevousuario2').val() == '')
    {
        $('#mensaje_cotranuevousuario2').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else
    {
        $('#mensaje_cotranuevousuario2').html('<span style="color:red;font-size:10px"></span>');
    }

    if ($('#correonuevousuario').val() != '')
    {
        valor = $('#correonuevousuario').val();

        if (/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/.test(valor)) {

            $('#mensaje_correonuevousuario').html('<span style="color:red;font-size:10px"></span>');
        } else {
            $('#mensaje_correonuevousuario').html('<span style="color:red;font-size:10px">Correo invalido ej: ejemplo@dominio.com</span>');
            sw = 1;
        }
    }

    if ($("#cotranuevousuario2").val() != "" && $("#cotranuevousuario").val() != "")
    {
        if ($("#cotranuevousuario2").val() == $("#cotranuevousuario").val())
        {

            $("#mensaje_cotranuevousuario2").html('<span style="color:red;font-size:16px"></span>');

        } else
        {
            $("#mensaje_cotranuevousuario2").html('<span style="color:red;font-size:16px">* No coincide la contrase�a</span>');
            $("#mensaje_cotranuevousuario").html('<span style="color:red;font-size:16px">* No coincide la contrase�a</span>');
            sw = 1
        }
    }

    if (sw == 0)
    {
        irpaso2();
        //document.formnuevouser.submit();

    }
}




function validarregistro2()

{
    var sw = 0;

    document.getElementById("doc").value = document.getElementById("doc").value.replace(" ", "");




    if ($('#doc').val() == '')
    {
        $('#mensaje_documento').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else
    {
        $('#mensaje_documento').html('<span style="color:red;font-size:10px"></span>');
    }

    if ($('#universidad').val() == '')
    {
        $('#mensaje_universidad').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else
    {
        $('#mensaje_universidad').html('<span style="color:red;font-size:10px"></span>');
    }
    if ($('#profesion').val() == 0)
    {
        $('#mensaje_profesion').html('<span style="color:red;font-size:10px">Este campo es requerido.</span>');
        sw = 1;
    } else

    {
        $('#mensaje_profesion').html('<span style="color:red;font-size:10px"></span>');
    }

    if ($("#terminos").is(':checked')) {

    } else
    {
        sw = 1;
        alert('Acepta los Terminos para Continuar el proceso de Registro');
    }
    if (sw == 0)
    {
        document.formnuevouser.submit();
    }
}

function irpaso2()
{
    $('#paso1').hide();
    $('#paso2').show();
}

function anterior()
{
    $('#paso1').show();
    $('#paso2').hide();
}