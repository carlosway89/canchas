$(function(){   

    msgLoadSave("#sms_ins_user","#btn_ins_users");

    // ACCION BUTTON REGISTRO USUARIOS
    $("#btn_ins_users").bind('click', function(event){

        var nombres = $("#txt_ins_user_nombres").val();
        var apellidos = $("#txt_ins_user_apellidos").val();
        var email = $("#txt_ins_user_email").val();
        var clave = $("#txt_ins_user_clave").val();
        var repetirclave = $("#txt_ins_user_repeclave").val();
        
        if(nombres == "" || nombres == " "){
            msgAlerta("#error_form_register_users","Ingrese sus nombres");
            $("#error_form_register_users").css("margin-bottom","10px");
            $("#error_form_register_users").hide().fadeIn(150);
            $("#txt_ins_user_nombres").focus();
        }else if(apellidos == "" || apellidos == " "){
            msgAlerta("#error_form_register_users","Ingrese sus apellidos");
            $("#error_form_register_users").css("margin-bottom","10px");
            $("#error_form_register_users").hide().fadeIn(150);
            $("#txt_ins_user_apellidos").focus();
        }else if(email == "" || email == " "){
            msgAlerta("#error_form_register_users","Ingrese su email");
            $("#error_form_register_users").css("margin-bottom","10px");
            $("#error_form_register_users").hide().fadeIn(150);
            $("#txt_ins_user_email").focus();
        }else if(clave == "" || clave == " "){
            msgAlerta("#error_form_register_users","Ingrese su clave");
            $("#error_form_register_users").css("margin-bottom","10px");
            $("#error_form_register_users").hide().fadeIn(150);
            $("#txt_ins_user_clave").focus();
        }else if(repetirclave == "" || repetirclave == " "){
            msgAlerta("#error_form_register_users","Confirme su clave");
            $("#error_form_register_users").css("margin-bottom","10px");
            $("#error_form_register_users").hide().fadeIn(150);
            $("#txt_ins_user_repeclave").focus();
        }else{
            registro_usuarios();   
        }
    });  
});  
        
function registro_usuarios(){
    msgLoadSave("#sms_ins_user","#btn_ins_users")
    var form = "#frm_ins_registro_users";
    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        data: $(form).serialize(),
        success: function(msg){
            if(msg.trim()==1){        
                //                            msgLoadSaveRemove("#btn_ins_usuario");
                //                            mensaje("Los datos de usuario se han registrado correctamente!","e");
                //                            limpiarForm("#frm_ins_usuario");
                msgLoadSaveRemove("#btn_ins_users");
                alert("Registro exitoso");
            }else{
                alert("No se ha registrado bien");
            //                            mensaje("Error Inesperado, no se puede registrar los datos del usuario!, vuelva a intentarlo","r");                        
            }                    
        },
        error: function(msg){     
            alert("Error");
        //                        mensaje("r","Error Inesperado, no se puede registrar los datos del usuario!, vuelva a intentarlo");                        ;
        }
    });
}