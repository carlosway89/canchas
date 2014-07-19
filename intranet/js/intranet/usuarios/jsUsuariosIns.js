$(function(){
   
    // ACCION DEL BOTON CANCELAR
    $("#btn_ins_user_cancel").bind('click', function(event){   
        $("#frm_ins_usuarios").data('validator').resetForm();
    });

    // FUNCION VALIDACION DE CAMPOS DEL FORM DE ACCESO AL LOGIN
    $("#frm_ins_usuarios").validate({
        rules: {
            txt_ins_user_nombres: {
                required: true
            },
            txt_ins_user_apellidos: {
                required: true
            },
            txt_ins_user_email: {
                required: true,
                email: true
            },
            txt_ins_user_clave: {
                required: true
            },
            txt_ins_user_repeclave: {
                required: true,
                equalTo: "#txt_ins_user_clave"
            }
        },
        messages: {
            txt_ins_user_repeclave:{
                equalTo:"* Las contraseñas no coinciden"
            }
        },
        submitHandler: function(form){
            msgLoadSave("#sms_ins_user_add","#btn_ins_user_add");
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                cache: false,
                data: $(form).serialize(),
                success: function(data) {
                    msgLoadSaveRemove("#btn_ins_user_add");
                    //alert(data);
                    if(data.trim() == 1){
                        alert("exito");
                        //enviar_email();
                        //popup_sms_exito('#pop_reg_user','.close_popup')
                    }else{
                        alert("error");
                    }
                },
                error: function() { 
                    alert("Error code");
                //mensaje("Error Inesperado validando el usuario !, vuelva a intentarlo","r");   
                }              
            });
        }
    });
});

