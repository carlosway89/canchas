$(function(){
    
    // TAB CANCHAS -> REGISTRAR
    $("#tab_cancha_registrar").bind('click', function(event){   
        $("#frm_ins_canchas").data('validator').resetForm();
    });
    
    // TAB CANCHAS -> LISTADO
    $("#tab_cancha_listar").bind('click', function(event){   
        canchasQry();
    });
});

// LISTADO DE CANCHAS
function canchasQry(){
    msgLoading("#cont_div_qry_canchas","Cargando...");
    get_page('canchas/canchasQry','cont_div_qry_canchas');
}

