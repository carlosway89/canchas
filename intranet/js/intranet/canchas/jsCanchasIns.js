$(function(){
    
    loadScript();
   
   $('#txt_ins_can_nrocanchas').ace_spinner({
       value:0,
       min:0,
       max:100,
       step:1, 
       on_sides: true, 
       icon_up:'icon-caret-up', 
       icon_down:'icon-caret-down'
   });
   
   // ACCION COMBO DEPARTAMENTO -> BUSCAR PROVINCIAS Y DISTRITOS
    $("#cbo_ins_can_departamentos").bind('change', function(event){
        get_provincias();
        get_distritos();
    });  
   
   
    // ACCION DEL BOTON CANCELAR
    $("#btn_ins_can_cancel").bind('click', function(event){   
        $("#frm_ins_canchas").data('validator').resetForm();
    });

    // FUNCION VALIDACION DE CAMPOS DEL FORM DE REGISTRO DE CANCHAS
    $("#frm_ins_canchas").validate({
        rules: {
            txt_ins_can_nombre: {
                required: true
            },
            txt_ins_can_descripcion: {
                required: true
            },
            cbo_ins_can_departamentos: {
                required: true
            },
            cbo_ins_can_provincias: {
                required: true
            },
            cbo_ins_can_distritos: {
                required: true
            },
            txt_ins_can_direccion: {
                required: true
            },
            txt_ins_can_email: {
                required: true
            },
            txt_ins_can_telefono: {
                required: true
            },
            txt_ins_can_nrocanchas: {
                required: true
            }
        },
        submitHandler: function(form){
            //msgLoadSave("#sms_ins_can_add","#btn_ins_can_add");
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                cache: false,
                data: $(form).serialize(),
                success: function(data) {
                    alert(data);
                   // msgLoadSaveRemove("#btn_ins_can_add");
                    //alert(data);
//                    if(data.trim() == 1){
//                        alert("exito");
//                        //enviar_email();
//                        //popup_sms_exito('#pop_reg_user','.close_popup')
//                    }else{
//                        alert("error");
//                    }
                },
                error: function() { 
                    alert("Error code");
                //mensaje("Error Inesperado validando el usuario !, vuelva a intentarlo","r");   
                }              
            });
        }
    });
});


// FUNCIÓN PARA BUSCAR PROVINCIAS SEGUN DEPARTAMENTO SELECCIONADO
function get_provincias(){
    $.ajax({
        type: "POST",
        url: "ubigeo/getUbigeo",
        cache: false,
        data: {
            'name_ubigeo' : 'provincias',
            'name_mantenedor' : 'can',
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
        url: "ubigeo/getUbigeo",
        cache: false,
        data: {
            'name_ubigeo' : 'distritos',
            'name_mantenedor' : 'can',
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


// FUNCIÓN PARA CARGAR MAPA DE REGISTRO DE LATITUD Y LONGITUD DE UNA CANCHA
function initialize_mapscanchas(){
    var popup;
    var markersArray = [];
    var myOptions = {
        center: new google.maps.LatLng( -7.7001724,-79.43381879999998),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    var map = new google.maps.Map(document.getElementById("mapa_canchas"),myOptions);       
    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
        $("#txt_ins_can_longitud").val(event.latLng.lng());
        $("#txt_ins_can_longitud").focus();
        //document.getElementById('txt_ins_obra_empresagana').scrollIntoView(true);
        $("#txt_ins_can_latitud").val(event.latLng.lat());
    });
    
    function placeMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Longitud: '+location.lng()+' Latitud: '+location.lat()
        });
        
        deleteOverlays();
        markersArray.push(marker);
            
        google.maps.event.addListener(marker, 'click', function(){
            if(!popup){
                popup = new google.maps.InfoWindow();
            }

            var note="<b style=\'color: #990000;text-align:center;\'>:: Coordenada ::</b><hr><b style=\'color: #990000;\'> Latitud: </b><b style=\'color: #000;\'>"+location.lat()+ "</b> <br><b style=\'color: #990000;\'> Longitud: </b><b style=\'color: #000;\'> "  +location.lng()+" </b>";

            popup.setContent(note);
            popup.open(map, this);
        }) 

    }
    
    function deleteOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
            markersArray.length = 0;
        }
    } 
}

function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://maps.google.com/maps/api/js?sensor=false&' +
    'callback=initialize_mapscanchas';
    document.body.appendChild(script);
}