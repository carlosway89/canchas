$(function(){   
    
    // FORTALEZA DE LA CLAVE DEL USUARIO
    $('#txt_upd_clave_nueva').keyup(function() {
        if($('#txt_upd_clave_nueva').val()==""){
            $('#pswd_info_clave').hide();
        }else{
            $('#pswd_info_clave').show();
            fuerza_clave(); 
        }
    });
    
    $('#txt_upd_clave_nueva').blur(function() { 
        $('#pswd_info_clave').hide();
    });
    
    $("#frm_upd_clave").validate({
        rules: {
            txt_upd_clave_anterior: {
                required: true
            },
            txt_upd_clave_nueva: {
                required: true,
                minlength:5
            },
            txt_upd_clave_repeat: {
                required: true,
                equalTo: "#txt_upd_clave_nueva"
            }
        },
        messages: {
            txt_upd_clave_repeat:{
                equalTo: "* Las contraseñas no son iguales"
            }, 
            txt_upd_clave_nueva:{
                minlength: "* Mínimo 5 caracteres"
            } 
        },
        submitHandler: function(form){
            msgLoadSave("#sms_upd_claveuser","#btn_upd_clave");
            
            if($("#txt_upd_clave_nueva").val().length<5){
                msgLoadSaveRemove("#btn_upd_clave");
                msgAlerta("#c_result_search_clave_anterior",'La contraseña nueva es muy pequeña')    
            }
            else{
            
                $.ajax({
                    type: "POST",
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                    success: function(msg){
                        if(msg.trim()==1){        
                            msgLoadSaveRemove("#btn_upd_clave");
                            alert("exito");
                            confirmarOperacion('dialog-upd-clave','Mensaje de Confirmación',reload);
                        
                        }else{
                            mensaje("Error Inesperado, no se puede actualizar la contraseña!, vuelva a intentarlo","r");                        
                        }                    
                    },
                    error: function(msg){                
                        mensaje("Error Inesperado, no se puede actualizar la contraseña!, vuelva a intentarlo","r");                        
                    }
                });
            }
        }
    }); 
})   

// FUNCION PARA LA FORTALEZA DE LA CLAVE
function fuerza_clave()
{
    var LOWER = /[a-z]/,
    UPPER = /[A-Z]/,
    DIGIT = /[0-9]/,
    DIGITS = /[0-9].*[0-9]/,
    SPECIAL = /[^a-zA-Z0-9]/
		
    var nueva = $("#txt_upd_clave_nueva").val();
	
    if (nueva.length>5 && nueva.length<8 )
    {
        $('#fuerza_contraseña').html("Contraseña regular");
        $("#fuerza_contraseña").css({
            color:"#FF9900",
            background:"white",
            borderBottom:"2px solid #FF9900",
            'margin':"2px 4px 2px 4px"
        });
        $("#fuerza_contraseña").hide().fadeIn(500);
        $("#txt_upd_clave_nueva").focus();
    }
	
    var lower = LOWER.test(nueva),
    upper = UPPER.test(nueva),
    digit = DIGIT.test(nueva),
    digits = DIGITS.test(nueva),
    special = SPECIAL.test(nueva);
	
    if (nueva.length > 9 && lower && upper && digit || nueva.length > 9 &&lower && digits || nueva.length > 9 && upper && digits || nueva.length > 9 && special)
    {
        $('#fuerza_contraseña').html("Contraseña exitosa");
        $("#fuerza_contraseña").css({
            color:"green",
            background:"white",
            borderBottom:"2px solid green",
            padding:"2px 4px 2px 4px"
        });
        $("#fuerza_contraseña").hide().fadeIn(500);
        $("#txt_upd_clave_nueva").focus();
    }
	
    if (nueva.length > 7 && nueva.length <10 && lower && upper || nueva.length > 7 && nueva.length <10 && lower && digit || nueva.length > 7 && nueva.length <10 && upper && digit){
        $('#fuerza_contraseña').html("Contraseña buena");
        $("#fuerza_contraseña").css({
            color:"#FF3300",
            background:"white",
            borderBottom:"2px solid #FF3300",
            padding:"2px 4px 2px 4px"
        });
        $("#fuerza_contraseña").hide().fadeIn(500);
        $("#txt_upd_clave_nueva").focus();	
    }
	
    if (nueva.length == 0)
    {
        $('#fuerza_contraseña').html("");
        $("#fuerza_contraseña").css({
            color:"#666",
            background:"white",
            borderBottom:"2px solid #666",
            padding:"2px 4px 2px 4px"
        });
        $("#fuerza_contraseña").hide().fadeIn(500);
        $("#txt_upd_clave_nueva").focus();
    }
	
    if (nueva.length!=0 && nueva.length < 6)
    {
        $('#fuerza_contraseña').html("Contraseña muy pequeña");
        $("#fuerza_contraseña").css({
            color:"#666",
            background:"white",
            borderBottom:"2px solid #666",
            padding:"2px 4px 2px 4px"
        });
        $("#fuerza_contraseña").hide().fadeIn(500);
        $("#txt_upd_clave_nueva").focus();
    }
}

// FUNCIÓN PÁRA REGRESAR AL LOGIN DESPUES DE LA ACTUALIZACIÓN DE CONTRASEÑA
function reload(){
    msjCargando();
    document.location.href ="../intranet/acceso/logout";
}
