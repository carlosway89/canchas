var ruta=window.location.host;
var pathname = window.location.pathname;

$(function(){
   
    $("#mensajecarga").hide();
    
    // FUNCION VALIDACION DE CAMPOS DEL FORM DE ACCESO AL LOGIN
    $("#frm_ins_login").validate({
        rules: {
            txt_ins_login_user: {
                required: true,
                email: true
            },
            txt_ins_login_clave: {
                required: true
            }
        },
        messages: {
            txt_ins_login_user:{
                required:"* Ingrese su usuario"
            },
            txt_ins_login_clave:{
                required:"* Ingrese su contraseña"
            }
        },
        submitHandler: function(form){
            $("#mensajecarga").show();
            msjCargando();
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                cache: false,
                data: $(form).serialize(),
                success: function(data) {
                    if(data.trim() == 1){
                        window.open("http://"+ruta+"/intranet/manage", "_self");
                    }else{
                        window.open("http://"+ruta+"/intranet/acceso", "_self");
                    }
                },
                error: function() { 
                    //mensaje("Error Inesperado de acceso al Panel de Administración!, vuelva a intentarlo","r");
                }              
            });
        }
    });
});

