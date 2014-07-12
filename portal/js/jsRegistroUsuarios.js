$(function(){   



    // ACCION BUTTON REGISTRO USUARIOS
    $("#btn_ins_users").bind('click', function(event){
        registro_usuarios();
    });  
});  
        
function registro_usuarios(){
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
            //alert("Registro exitoso");
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