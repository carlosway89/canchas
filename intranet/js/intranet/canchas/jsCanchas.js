$(function(){
    
    $("#anc_back").hide();
    
    // TAB CANCHAS -> REGISTRAR
    $("#tab_cancha_registrar").bind('click', function(event){   
        $("#frm_ins_canchas").data('validator').resetForm();
    });
    
    // TAB CANCHAS -> LISTADO
    $("#tab_cancha_listar").bind('click', function(event){ 
        canchasQry();
        MostrarOcultarCapas('#cont_content_edit_canchas','#cont_div_qry_canchas');
    });
    
    // Evento Regresar Pantalla Anterior
    $("#anc_back").click(function(evt){
        evt.preventDefault();
        MostrarOcultarCapas('#cont_content_edit_canchas','#cont_div_qry_canchas');
    });
    
});

// LISTADO DE CANCHAS
function canchasQry(){
    msgLoading("#cont_div_qry_canchas","Cargando...");
    get_page('canchas/canchasQry','cont_div_qry_canchas');
}

// SELECCIONAR LA CANCHA PARA EDITAR
function select_cancha_editar(id){
    $("#mensajecarga").show();
    msjCargando();
    $.ajax({
        type: "POST",
        url: "canchas/panelEditar/"+id,
        cache: false,
        success: function(data) {   
            $("#anc_back").show()
            MostrarOcultarCapas('#cont_div_qry_canchas','#cont_content_edit_canchas');
            $("#cont_div_form_edit_canchas").html(data);
            $("#mensajecarga").hide();
        },
        error: function() { 
            alert("error");
        }              
    });
}