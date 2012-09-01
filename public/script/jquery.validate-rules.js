$(document).ready(function() {
    

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Entre solo caracteres.  "); 

    jQuery.validator.addMethod("notspace", function(value, element) {
        var espacio ="\t\n\r";
        for (i = 0; i < value.length; i++)
        {
            var c = value.charAt(i);
            if (c == ' ') return false;
        }
        return true;
    }, "No se aceptan espacios en blanco.  ");

    // validate contact form on keyup and submit
    $("#formulario").validate({
			
        errorElement: "span", 
			 
			 
        //set the rules for the fild names
        rules: {
			
            full_name: {
                required: true,
                lettersonly: false
            },
            apellido: {
                required: true,
                lettersonly: false
            },
            email: {
                required: true,
                email: true
            },
            user_name: {
                notspace: true,
                required: true,
                minlength: 5,
                maxlength:15
            },
            password: {
                required: true
            },
				
            day : {
                required :true
            },
				
            month : {
                required :true
            },
            
            ciudades : {
                required :true
            },
				
            gender : {
                required :true
            },
				
            year : {
                required :true
            },	
				
        },
        //set messages to appear inline
        messages: {
			
            full_name: {
                required: "El nombre es requerido.",
            },
				
            apellido: {
                required: "El apellido es requerido.",
            },
                                
            apellido: {
                required: "El apellido es requerido.",
            },
                                
            user_name: {
                required: "Proporcione un nombre de usuario.",
                minlength: "Tu nombre de usuario debe tener minimo 5 caracteres.",
                maxlength: "Tu nombre de usuario no debe ser mayor a 15 caracteres."
            },
                                
            password: {
                required: "Proporcione contraseña."
            },
				
            email: "Verifique y corrija su correo.",
				
            day: "Seleccione dia.",
            month: "Seleccione mes.",
            gender: "Seleccione genero",
            ciudades: "Seleccione una ciudad",
            year: "Seleccione año."
				
				
				
        },
			
        errorPlacement: function(error, element) {               
            error.appendTo(element.parent()); 
            error.css('color', 'red');
            element.css('border-style','solid');
            element.css('border-color','#ff0000');
            return false;
        }

    });
                
          
});
        
        