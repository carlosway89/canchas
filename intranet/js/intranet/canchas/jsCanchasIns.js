$(function(){
    
    initialize_mapscanchas(); // Carga el mapa de google maps
    
    upload_foto_cancha() // Configuración para subir fotos de las canchas
   
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
    
    // ACCION COMBO PROVINCIA -> BUSCAR DISTRITOS
    $("#cbo_ins_can_provincias").bind('change', function(event){
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
            msgLoadSave("#sms_ins_can_add","#btn_ins_can_add");
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                cache: false,
                data: $(form).serialize(),
                success: function(data) {
                    msgLoadSaveRemove("#btn_ins_can_add");
                    if(data.trim() == 1){
                        alert("exito");
                        $('#frm_ins_canchas').find('input, textarea, select').val('');
                    }else{
                        alert("error");
                    }
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

function upload_foto_cancha(){
    $('#id-input-file-1 , #id-input-file-2').ace_file_input({
        no_file:'Ningun Archivo Seleccionado ...',
        btn_choose:'Elegir',
        btn_change:'Cambiar',
        droppable:false,
        onchange:null,
        thumbnail:false, // | true | large
        whitelist:'gif|png|jpg|jpeg',
        blacklist:'exe|php|html'
    });
            
    $('#id-input-file-2').on('change',function(e){
        e=e?e:window.event;
        var files = e.target.files || e.dataTransfer.files;

        $('#btn_ins_can_add').addClass('disabled');
        $('#loader_image').show();               
        $('div.ace-file-input').hide();
        $('div#image_uploaded').hide();

        var img=files[0];

        var serverUrl = 'https://api.parse.com/1/files/' + img.name;

        $.ajax({
            type: "POST",
            beforeSend: function(request) {
                request.setRequestHeader("X-Parse-Application-Id", 'xdLEwFZLHdiIXJHpuI0scD67SQcGUuFS2xo4KUYW');
                request.setRequestHeader("X-Parse-REST-API-Key", 'glPBhAwIPdKBq9BRVcXFAiJkJEg5wtqycL0idMzW');
                request.setRequestHeader("Content-Type", img.type);
            },
            url: serverUrl,
            data: img,
            processData: false,
            contentType: false,
            success: function(data) {
                // muestra y desahbilita div y botones
                $('#btn_ins_can_add').removeClass('disabled');
                $('#loader_image').hide();               
                $('div.ace-file-input').show();
                $('div.ace-file-input').find('.remove').hide();

                // pone los valores en los input para enviar por post
                $('#txt_ins_can_foto').val(data.url);

                // muestra la imagen subida
                $('.img_up').attr('src',data.url);
                $('div#image_uploaded').show();
            },
            error: function(data) {
                $('#btn_ins_can_add').removeClass('disabled');
                $('#loader_image').hide();               
                $('div.ace-file-input').show();
            }
        });
    });
}


// FUNCIÓN PARA CARGAR MAPA DE REGISTRO DE LATITUD Y LONGITUD DE UNA CANCHA
function initialize_mapscanchas(){
    var lat,lng;
    var geocoder = new google.maps.Geocoder();
    
    //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
    lat = $('#hid_ins_can_latitud').val();
    lng = $('#hid_ins_can_longitud').val();
    
    //Si hay valores creamos un objeto Latlng
    if(lat !='' && lng != '')
    {
        var latLng = new google.maps.LatLng(lat,lng);
    }
    else
    {
        var latLng = new google.maps.LatLng(-8.111729024852341,-79.02822839370117);
    }
    
    
    var myOptions = {
        center: latLng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    var map = new google.maps.Map(document.getElementById("mapa_canchas"),myOptions);      
    
    //creamos el marcador en el mapa
    marker = new google.maps.Marker({
        map: map,//el mapa creado en el paso anterior
        position: latLng,//objeto con latitud y longitud
        draggable: true //que el marcador se pueda arrastrar
    });
    
    //función que actualiza los input del formulario con las nuevas latitudes
    //Estos campos suelen ser hidden
    updatePosition(latLng);
        
    // Create the search box and link it to the UI element.
    var input = (
        document.getElementById('txt_ins_can_ubicacion'));

    
    var options = {
        componentRestrictions: {
            country: "pe"
        }
    };
    
    var searchBox =  new google.maps.places.Autocomplete(input, options);
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }
    });
        
    //Asignamos al evento click del boton la funcion codeAddress
    $('#pasar').click(function(){
        codeAddress();
        return false;
    });
    $('#txt_ins_can_ubicacion').on('',function(){
        codeAddress();
        return false;
    });
    
    
    //funcion que traduce la direccion en coordenadas
    function codeAddress() {
               
        //obtengo la direccion del formulario
        var address = document.getElementById("txt_ins_can_ubicacion").value;
        //hago la llamada al geodecoder
        geocoder.geocode( {
            'address': address
        }, function(results, status) {
               
            //si el estado de la llamado es OK
            if (status == google.maps.GeocoderStatus.OK) {
                //centro el mapa en las coordenadas obtenidas
                map.setCenter(results[0].geometry.location);
                //coloco el marcador en dichas coordenadas
                marker.setPosition(results[0].geometry.location);
                //actualizo el formulario      
                updatePosition(results[0].geometry.location);
                   
                //Añado un listener para cuando el markador se termine de arrastrar
                //actualize el formulario con las nuevas coordenadas
                google.maps.event.addListener(marker, 'dragend', function(){
                    updatePosition(marker.getPosition());
                });
            } else {
                //si no es OK devuelvo error
                alert("No podemos encontrar la direccion porfavor ubiquelo en el mapa");
            }
        });
    }
    
    
    //funcion que simplemente actualiza los campos del formulario
    function updatePosition(latLng)
    {          
        $('#hid_ins_can_latitud').val(latLng.lat());
        $('#hid_ins_can_longitud').val(latLng.lng());
    }
}
    
