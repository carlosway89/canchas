$(function(){   
    
    limpiarForm("#frm_ins_registro_users");
    
  
    // ACCION BUTTON REGISTRO USUARIOS
    $("#btn_ins_users").bind('click', function(event){

        var nombres = $("#txt_ins_user_nombres").val();
        var apellidos = $("#txt_ins_user_apellidos").val();
        var email = $("#txt_ins_user_email").val();
        var clave = $("#txt_ins_user_clave").val();
        var repetirclave = $("#txt_ins_user_repeclave").val();
        
        var email_re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
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
        }else if(!email_re.test(email)){
            msgAlerta("#error_form_register_users","Ingrese un email válido");
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
        }else if(clave != repetirclave ){
            msgAlerta("#error_form_register_users","Las claves no coinciden");
            $("#error_form_register_users").css("margin-bottom","10px");
            $("#error_form_register_users").hide().fadeIn(150);
            $("#txt_ins_user_repeclave").focus();
        }else{
            $("#error_form_register_users").css("margin-bottom","0");
            $("#error_form_register_users").html('');
            registro_usuarios();   
        }
    });  
});  
        
function registro_usuarios(){
    msgLoadSave("#sms_ins_user","#btn_ins_users")
    var email = $("#txt_ins_user_email").val();
    var form = "#frm_ins_registro_users";
    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        data: $(form).serialize(),
        success: function(msg){
            if(msg.trim()==1){        
                limpiarForm("#frm_ins_registro_users");
                msgLoadSaveRemove("#btn_ins_users");
                
                $("#email_user").html('<b>'+email+'</b>');
                $.fancybox({'href' : '#inline2'});
            }else{
                alert("No se ha registrado bien");
            }                    
        },
        error: function(msg){     
            alert("Error");
        }
    });
}