$(function(){
    
    $('[data-rel=tooltip]').tooltip();
    
    var dataTable = {
        tabla           : "TablaListUsuarios", 
        ordenaPor       : new Array([0, "desc" ]),
        filsXpag        : 10,
        desactOrdenaEn  : [0] ,
        functions       : [
        $(".ver-permisos").bind('click', function(event){        
            var id = $(this).attr("data-id");
            userPermisosSelected(id);
        }),
        $(".del-user").bind('click', function(event){   
            var id = $(this).attr("data-id");
            confirmarDelete(
                "Confirmar",
                "¿Desea cambiar el estado del usuario seleccionado?",
                eliminarUsuarios,
                id
                );
        }),
        $("#TablaFotosProductosT tr td:nth-child(3)").css({
            "text-align" : "center"
        }),
        $('[data-rel=tooltip]').tooltip()                
        ]
    };
                                     
    paginaDataTable(dataTable); 
});


function eliminarUsuarios(nUsuID){
    $.ajax({
        type: "POST",
        url: "usuarios/usuariosDel/"+nUsuID,
        cache: false,
        success: function(data) {
            if(data == 1){
                //mensaje("La foto seleccionada ha sido actualizada a foto de portada!","e");
                alert("se ha cambiado el usuario seleccionado");
                usuariosQry();
            }else{
                alert("Error de consulta");
            //mensaje("Error Inesperado, no se puede colocar la foto seleccionada en foto de portada!, vuelva a intentarlo","r");  
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}
