$(function(){
    
    $("#anc_back").hide()
    
    // TAB USUARIOS -> REGISTRAR
    $("#tab_user_registrar").bind('click', function(event){   
        $("#frm_ins_usuarios").data('validator').resetForm();
    });
    
    // TAB USUARIOS -> LISTADO
    $("#tab_user_listar").bind('click', function(event){   
        usuariosQry();
        MostrarOcultarCapas('#cont_content_permisos','#cont_div_qry_usuarios');
    });
    
    // Evento Regresar Pantalla Anterior
    $("#anc_back").click(function(evt){
        evt.preventDefault();
        MostrarOcultarCapas('#cont_content_permisos','#cont_div_qry_usuarios');
    });
    
});

// LISTADO DE USUARIOS
function usuariosQry(){
    msgLoading("#cont_div_qry_usuarios","Cargando...");
    get_page('usuarios/usuariosQry','cont_div_qry_usuarios');
}

// MOSTRAR LOS PERMISOS DEL USUARIO SELECCIONADO
function userPermisosSelected(id){
    $("#mensajecarga").show();
    msjCargando();
    $.ajax({
        type: "POST",
        url: "usuarios/getUserPermisos",
        cache: false,
        data: {
            id_usuario:id
        },
        success: function(data) {   
            $("#anc_back").show()
            MostrarOcultarCapas('#cont_div_qry_usuarios','#cont_content_permisos');
            $("#cont_div_qry_permisos").html(data);
            $("#mensajecarga").hide();
        },
        error: function() { 
            alert("error");
        }              
    });
}
