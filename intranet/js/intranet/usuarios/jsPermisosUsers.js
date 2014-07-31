$(function(){  
    $("#btn_ins_permisos").click(function(evt){
        evt.preventDefault();
        msgLoadSave("#sms_ins_permisos","#btn_ins_permisos");
        $.ajax({
            type: "POST",
            url: "permisos/permisosIns",
            data:{
                arrayopciones:initEvtChk(),
                hid_ins_usu_codigo:$("#hid_ins_usu_codigo").val()  
            },
            success: function(data) {
                
                data = data.trim();       
                if(data=="1"){
                    alert("Los permisos del usuario seleccionado se han registrado correctamente !");
                    //mensaje("Los permisos del usuario seleccionado se han registrado correctamente !","e");
                    $("#mensajecarga").show();
                    msjCargando();
                    setTimeout(function(){
                        location.reload();
                        msgLoadSaveRemove("#btn_ins_permisos");
                    }, 200);
                }
                else{
                    msgLoadSaveRemove("#btn_ins_permisos");
                    alert("Error Inesperado, no se puede registrar los permisos del usuario seleccionado!, vuelva a intentarlo");
                //mensaje("r","Error Inesperado, no se puede registrar los permisos del usuario seleccionado!, vuelva a intentarlo");                          
                }
            },
            error: function() { 
                msgLoadSaveRemove("#btn_ins_permisos");
                alert("Error Inesperado, no se puede registrar los permisos del usuario seleccionado!, vuelva a intentarlo");
            //mensaje("r","Error Inesperado, no se puede registrar los permisos del usuario seleccionado!, vuelva a intentarlo");
            }                  
        });
    });
});