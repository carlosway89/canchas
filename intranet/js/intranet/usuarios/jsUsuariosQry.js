$(function(){
    
    $('[data-rel=tooltip]').tooltip();
    
    var dataTable = {
        tabla           : "TablaListUsuarios", 
        ordenaPor       : new Array([0, "desc" ]),
        filsXpag        : 10,
        desactOrdenaEn  : [0] ,
        functions       : [
        //        $(".view_photo").bind('click', function(event){   
        //            var id = $(this).attr("data-id");
        //            var estado = $(this).attr("data-estado");
        //            set_popup2('productos/vista_upload_foto_upd/'+id+'--'+estado,"Editar la foto seleccionada",'480','200','',''); 
        //        }),
        $(".ver-permisos").bind('click', function(event){  
            //initEvtOpcId("pencil",userPermisosSelected,'');
                    
            var id = $(this).attr("data-id");
            userPermisosSelected(id);
        //                    
        //                    var id = $(this).attr("data-id");
        //                    set_popup2('productos/popupEditarDataFoto/'+id,"Actualizar la Información de la foto seleccionada",'480','200','',''); 
        }),
        $(".del-user").bind('click', function(event){   
            var id = $(this).attr("data-id");
            confirmarDelete("Confirmar","¿Desea eliminar la foto seleccionada?",eliminarUsuarios,id);
        }),
        //        $(".cover_photo").bind('click', function(event){   
        //            var id = $(this).attr("data-id");
        //            var estado = $(this).attr("data-estado");
        //            if(estado == "P"){
        //                mensaje("La foto seleccionada ya se encuentra como foto de portada","a");          
        //            }else{
        //                confirmarDelete("Confirmar","¿La foto seleccionada debe ser la foto de portada?",fotoProductoPortada,id);
        //            }
        //        }),
        $("#TablaFotosProductosT tr td:nth-child(3)").css({
            "text-align" : "center"
        }),
        $('[data-rel=tooltip]').tooltip()                
        ]
    };
                                     
    paginaDataTable(dataTable); 
                                                                                                   
//    $("#tabla_fotos_productos .DataTables_sort_wrapper span").remove();
//    $("#TablaFotosProductosT_filter").remove();
//    $("#TablaFotosProductosT_length").html("<b>Fotos del Producto seleccionado</b>");
});


function eliminarUsuarios(nUsuID){
    $.ajax({
        type: "POST",
        url: "usuarios/usuariosDel/"+nUsuID,
        cache: false,
        success: function(data) {
            if(data == 1){
                //mensaje("La foto seleccionada ha sido actualizada a foto de portada!","e");
                alert("se ha eliminado el usuario seleccionado");
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



// FUNCIÓN PARA ELIMINAR LA FOTO SELECCIONADA
//function fotoProductoDel(nMultID){
//    var valores = nMultID.split("--"); 
//    $.ajax({
//        type: "POST",
//        url: "productos/fotoProductoDel/"+valores[0],
//        cache: false,
//        success: function(data) {
//            if(data == 1){
//                mensaje("La foto seleccionada ha sido eliminada correctamente!","e");
//                productosQryFotos($("#hid_upload_id").val());  
//                
//                if(valores[1] == "P"){
//                    productosGetFoto(valores[0]);
//                    productosQry();
//                }
//                
//            }else{
//                mensaje("Error Inesperado, no se puede eliminar la foto seleccionada!, vuelva a intentarlo","r");  
//            }
//        },
//        error: function() { 
//            mensaje("Error Inesperado, no se puede eliminar la foto seleccionada!, vuelva a intentarlo","r");  
//        }              
//    });
//}
//
//// FUNCIÓN PARA SELECCIONAR LA FOTO PORTADA
//function fotoProductoPortada(nMultID){
//    $.ajax({
//        type: "POST",
//        url: "productos/fotoProductoPortada/"+nMultID,
//        cache: false,
//        success: function(data) {
//            if(data == 1){
//                mensaje("La foto seleccionada ha sido actualizada a foto de portada!","e");
//                productosQryFotos($("#hid_upload_id").val());    
//                productosGetFoto(nMultID);
//                productosQry();
//               
//            }else{
//                mensaje("Error Inesperado, no se puede colocar la foto seleccionada en foto de portada!, vuelva a intentarlo","r");  
//            }
//        },
//        error: function() { 
//            alert("error");
//        }              
//    });
//}
//
//// FUNCTION PARA OBTENER EL NOMBRE DE LA FOTO SUBIDA
//function productosGetFoto(nMultID){
//    $.ajax({
//        type: "POST",
//        url: "productos/productoGetFoto",
//        cache: false,
//        data:{
//            'id_mult' : nMultID
//        },
//        success: function(data) {
//            $(".cont_foto_producto_"+$("#hid_upload_id").val()).html(data);
//            $(".cont_foto_producto_"+$("#hid_upload_id").val()).hide().fadeIn(250);   
//            $(function(){
//                $(".pretty-foto-productos").prettyPhoto({
//                    overlay_gallery:false
//                });  
//            });  
//        },
//        error: function() { 
//            alert("error");
//        }              
//    });
//}