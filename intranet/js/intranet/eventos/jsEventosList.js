$(function(){
    
    $('[data-rel=tooltip]').tooltip();
    
    var dataTable = {
        tabla           : "TablaListEventos", 
        ordenaPor       : new Array([0, "desc" ]),
        filsXpag        : 10,
        desactOrdenaEn  : [0] ,
        functions       : [
        $('[data-rel=tooltip]').tooltip()                
        ]
    };
                                     
    paginaDataTable(dataTable); 
});

function deletechecked(link)
{
    var answer = confirm('Esta seguro de Eliminar este Evento?')
    if (answer){
        window.location = link;
    }
    
    return false;  
}