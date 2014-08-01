var ruta = 'localhost/canchas/portal/eventos';

$(function(){   
    
    
    // ACCION SOBRE BUTTON EVENTOS
    $("#buscar_evento").bind('click', function(event){
        event.preventDefault();
        search_eventos();
    }); 
   
});

// FUNCION DE BUSQUEDA DE EVENTOS
function search_eventos(){
    var nombre_evento,fecha_evento;
    nombre_evento = $('#evento_nombre').val();
    
    if(nombre_evento == "" ){
        alert("Ingrese un evento a buscar");
    }else{
        window.location.href = "http://localhost/canchas/portal/eventos/buscar/"+nombre_evento;
    }
}




