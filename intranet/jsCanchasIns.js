$(function(){

    $('#txt_ins_can_nrocanchas').ace_spinner({
        value:0,
        min:0,
        max:100,
        step:10, 
        on_sides: true, 
        icon_up:'icon-caret-up', 
        icon_down:'icon-caret-down'
    });
        
        
    $(function(){   
    
   

        // ACCION COMBO DEPARTAMENTO -> BUSCAR PROVINCIAS Y DISTRITOS
        $("#cbo_ins_can_departamentos").bind('change', function(event){
            get_provincias();
            get_distritos();
        });  
    

    });
        
});
    
// FUNCIÓN PARA BUSCAR PROVINCIAS SEGUN DEPARTAMENTO SELECCIONADO
function get_provincias(){
    $.ajax({
        type: "POST",
        url: "http://localhost/canchas/intranet/ubigeo/getUbigeo",
        cache: false,
        data: {
            'name_ubigeo' : 'provincias',
            'name_mantenedor' : 'cancha',
            'Id_Departamento' : $('#cbo_ins_can_departamentos option:selected').val(),
            'accion_ubigeo' : 'ins'
        },
        success: function(data) {
            $("#cont_ins_can_provincias").html(data);

            // ACCION COMBO PROVINCIA -> BUSCAR DISTRITOS
            $("#cbo_ins_can_provincias").bind('change', function(event){
                get_distritos();
            });
        },
        error: function() { 
            alert("error");
        }              
    });
}

// FUNCIÓN PARA BUSCAR DISTRITOS SEGUN PROVINCIA SELECCIONADA
function get_distritos(){
    $.ajax({
        type: "POST",
        url: "http://localhost/canchas/intranet/ubigeo/getUbigeo",
        cache: false,
        data: {
            'name_ubigeo' : 'distritos',
            'name_mantenedor' : 'cancha',
            'Id_Departamento': $('#cbo_ins_can_departamentos option:selected').val(),
            'Id_Provincia': $('#cbo_ins_can_provincias option:selected').val(),
            'accion_ubigeo' : 'ins'
        },
        success: function(data) {
            $("#cont_ins_can_distritos").html(data);  
        },
        error: function() { 
            alert("error");
        }              
    });
}
    
           
      