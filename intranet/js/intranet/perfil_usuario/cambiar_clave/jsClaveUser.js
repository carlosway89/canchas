$(function(){
    $("#btn_upd_clave").attr('disabled','disabled');
    
    // ACCIÓN BLUR -> VERIFICACIÓN DE CLAVE ANTERIOR
    $('#txt_upd_clave_anterior').blur(function(){          
        if ($('#txt_upd_clave_anterior').val().length>0){                            
            msgLoading("#preload","Verificando clave...");
            $("#msg_loading").css({
                display:"inline",
                'margin-left':'5px'
            });
            getClaveAnterior($('#txt_upd_clave_anterior').val());
        }
    });
});

// FUNCIÓN PARA VERIFICAR LA CLAVE ANTERIOR
function getClaveAnterior(clave_anterior){
    var ruta=window.location.host;
    $.ajax({
        type: "POST",
        url: "cambiar_clave/getClaveAnterior",
        cache: false,
        data: {
            clave_anterior:clave_anterior
        },
        success: function(data) { 
            if(data=="2"){
                $("#preload").html("");
                $("#btn_upd_clave").attr('disabled','disabled');
                $("#preload").html("&nbsp;&nbsp;<img class='img_boostrap'  src='http://"+ruta+"/intranet/img/cross.png' /> <span class='pass_incorrect'>Contraseña incorrecta</span>");
            }
            else{
                $("#preload").html("&nbsp;&nbsp;<img class='img_boostrap'  src='http://"+ruta+"/intranet/img/check.png' /> <span class='pass_correct'>Contraseña correcta</span>");
                $("#btn_upd_clave").removeAttr('disabled');
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}
