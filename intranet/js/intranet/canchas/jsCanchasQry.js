$(function(){
    
    $('[data-rel=tooltip]').tooltip();
<<<<<<< HEAD
    $( "#show-tooltip" ).tooltip({
        show: {
            effect: "slideDown",
            delay: 250
        }
    });  
=======
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
    
    var dataTable = {
        tabla           : "TablaListCanchas", 
        ordenaPor       : new Array([0, "desc" ]),
        filsXpag        : 10,
        desactOrdenaEn  : [0] ,
        functions       : [
        $(".edit-cancha").bind('click', function(event){        
            var id = $(this).attr("data-id");
            select_cancha_editar(id);
            //userPermisosSelected(id);
        }),
        $(".del-cancha").bind('click', function(event){   
            var id = $(this).attr("data-id");
            confirmarDelete(
                "Confirmar",
                "¿Desea cambiar el estado de la cancha seleccionada?",
                eliminarCanchas,
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


function eliminarCanchas(nCanID){
    $.ajax({
        type: "POST",
        url: "canchas/canchasDel/"+nCanID,
        cache: false,
        success: function(data) {
            if(data == 1){
                //mensaje("La foto seleccionada ha sido actualizada a foto de portada!","e");
                alert("se ha cambiado el estado de la cancha seleccionada");
                canchasQry();
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
