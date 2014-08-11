$(function(){
    
    // ACCION DEL BOTON CANCELAR
    $("#btn_upd_user_cancel").bind('click', function(event){   
        $("#frm_upd_usuarios").data('validator').resetForm();
    });

    // FUNCION DE ACTUALIZACIÓN DE DATOS DEL USUARIO
    $("#frm_upd_usuarios").validate({
        rules: {
            txt_upd_user_nombres: {
                required: true
            },
            txt_upd_user_apellidos: {
                required: true
            },
            txt_upd_user_email: {
                required: true,
                email: true
            }
        },
        submitHandler: function(form){
            msgLoadSave("#sms_upd_user_edit","#btn_upd_user_edit");
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                cache: false,
                data: $(form).serialize(),
                success: function(data) {
                    msgLoadSaveRemove("#btn_upd_user_edit");
                    if(data.trim() == 1){
                        confirmarOperacion('dialog-upd-user','Mensaje de Confirmación',reload);
                    }else{
                        alert("error");
                    }
                },
                error: function() { 
                    alert("Error code");  
                }              
            });
        }
    });
});
function reload(){
    msjCargando();
    document.location.href ="../../usuarios";
}