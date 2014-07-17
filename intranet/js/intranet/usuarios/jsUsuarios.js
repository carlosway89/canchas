$(function(){
    
    // TAB USUARIOS -> REGISTRAR
    $("#tab_user_registrar").bind('click', function(event){   
        $("#frm_ins_usuarios").data('validator').resetForm();
    });
    
    // TAB USUARIOS -> LISTADO
    $("#tab_user_listar").bind('click', function(event){   
        usuariosQry();
    });
});

//cont_div_qry_usuarios

// LISTADO DE PRODUCTOS
function usuariosQry(){
    msgLoading("#cont_div_qry_usuarios","Cargando...");
   
    get_page('usuarios/usuariosQry','cont_div_qry_usuarios', {

    });
    
}
