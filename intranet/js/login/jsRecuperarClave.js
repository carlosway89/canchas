var ruta=window.location.host+"/canchas";
var pathname = window.location.pathname;
$(function(){

    $("#mensajecarga").hide();
    
    // FUNCION VALIDACION DE CAMPOS DEL FORM RECUPERAR CONTRASEÑA
    $("#frm_upd_recu_clave").validate({
        rules: {
            txt_upd_recu_clave: {
                required: true,
                email: true
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
                    popup_exito_recupera_clave();
                },
                error: function() { 
                //mensaje("Error Inesperado en el proceso de recuperación de contraseña!, vuelva a intentarlo","r");
                } 
            });
        }
    });
});


function popup_exito_recupera_clave(){
    $("#mensajecarga").hide();
    $("#email_ingresado").html("<b>"+$("#txt_upd_recu_clave").val().toLowerCase()+"</b>");
    $(".bootbox").modal({
        show:true,
        animate:"fade"
    });
                     
    $(".close_popup").bind("click", function() {
        $(".bootbox").modal("hide");
        $("#mensajecarga").show();
        msjCargando();
        window.open("http://"+ruta+"/intranet/acceso", "_self");
    });             
}
            