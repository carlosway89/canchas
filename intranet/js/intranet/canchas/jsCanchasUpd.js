$(function(){
    
<<<<<<< HEAD
    initialize_mapscanchas(); // Carga el mapa de google maps
    
    upload_foto_cancha() // Configuración para subir fotos de las canchas
      
    // ACCION COMBO DEPARTAMENTO -> BUSCAR PROVINCIAS Y DISTRITOS
    $("#cbo_upd_can_departamentos").bind('change', function(event){
        get_provincias();
        get_distritos();
    });  
   
=======
    initialize_mapscanchas_upd(); // Carga el mapa de google maps
    
    upload_foto_cancha_upd() // Configuración para subir fotos de las canchas
      
    // ACCION COMBO DEPARTAMENTO -> BUSCAR PROVINCIAS Y DISTRITOS
    $("#cbo_upd_can_departamentos").bind('change', function(event){
        get_provincias_upd();
        get_distritos_upd();
    });  
    
    // ACCION COMBO PROVINCIA -> BUSCAR DISTRITOS
    $("#cbo_upd_can_provincias").bind('change', function(event){
        get_distritos_upd();
    });
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
   
    // ACCION DEL BOTON CANCELAR
    $("#btn_upd_can_cancel").bind('click', function(event){   
        $("#frm_upd_canchas").data('validator').resetForm();
    });

    // FUNCION VALIDACION DE CAMPOS DEL FORM DE REGISTRO DE CANCHAS
    $("#frm_upd_canchas").validate({
        rules: {
            txt_upd_can_nombre: {
                required: true
            },
            txt_upd_can_descripcion: {
                required: true
            },
            cbo_upd_can_departamentos: {
                required: true
            },
            cbo_upd_can_provincias: {
                required: true
            },
            cbo_upd_can_distritos: {
                required: true
            },
            txt_upd_can_direccion: {
                required: true
            },
            txt_upd_can_email: {
                required: true
            },
            txt_upd_can_telefono: {
                required: true
            },
            txt_upd_can_nrocanchas: {
                required: true
            }
        },
        submitHandler: function(form){
<<<<<<< HEAD
            msgLoadSave("#sms_upd_can_add","#btn_upd_can_add");
=======
            msgLoadSave("#sms_upd_can_edit","#btn_upd_can_edit");
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                cache: false,
                data: $(form).serialize(),
                success: function(data) {
<<<<<<< HEAD
                    msgLoadSaveRemove("#btn_upd_can_add");
                    if(data.trim() == 1){
                        alert("exito");
=======
                    msgLoadSaveRemove("#btn_upd_can_edit");
                    if(data.trim() == 1){
                        alert("exito");
                        MostrarOcultarCapas('#cont_content_edit_canchas','#cont_div_qry_canchas');
                        canchasQry();
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
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
<<<<<<< HEAD
function get_provincias(){
=======
function get_provincias_upd(){
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
    $.ajax({
        type: "POST",
        url: "ubigeo/getUbigeo",
        cache: false,
        data: {
            'name_ubigeo' : 'provincias',
            'name_mantenedor' : 'can',
            'Id_Departamento' : $('#cbo_upd_can_departamentos option:selected').val(),
<<<<<<< HEAD
            'accion_ubigeo' : 'ins'
=======
            'accion_ubigeo' : 'upd'
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
        },
        success: function(data) {
            $("#cont_upd_can_provincias").html(data);

            // ACCION COMBO PROVINCIA -> BUSCAR DISTRITOS
            $("#cbo_upd_can_provincias").bind('change', function(event){
<<<<<<< HEAD
                get_distritos();
=======
                get_distritos_upd();
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
            });
        },
        error: function() { 
            alert("error");
        }              
    });
}

// FUNCIÓN PARA BUSCAR DISTRITOS SEGUN PROVINCIA SELECCIONADA
<<<<<<< HEAD
function get_distritos(){
=======
function get_distritos_upd(){
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
    $.ajax({
        type: "POST",
        url: "ubigeo/getUbigeo",
        cache: false,
        data: {
            'name_ubigeo' : 'distritos',
            'name_mantenedor' : 'can',
            'Id_Departamento': $('#cbo_upd_can_departamentos option:selected').val(),
            'Id_Provincia': $('#cbo_upd_can_provincias option:selected').val(),
<<<<<<< HEAD
            'accion_ubigeo' : 'ins'
=======
            'accion_ubigeo' : 'upd'
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
        },
        success: function(data) {
            $("#cont_upd_can_distritos").html(data);  
        },
        error: function() { 
            alert("error");
        }              
    });
}

<<<<<<< HEAD
function upload_foto_cancha(){
    $('#id-input-file-1 , #id-input-file-2').ace_file_input({
=======
function upload_foto_cancha_upd(){
    $('#id-input-file-1 , #id-input-upd-file-2').ace_file_input({
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
        no_file:'Ningun Archivo Seleccionado ...',
        btn_choose:'Elegir',
        btn_change:'Cambiar',
        droppable:false,
        onchange:null,
        thumbnail:false, // | true | large
        whitelist:'gif|png|jpg|jpeg',
        blacklist:'exe|php|html'
    });
            
<<<<<<< HEAD
    $('#id-input-file-2').on('change',function(e){
=======
    $('#id-input-upd-file-2').on('change',function(e){
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
        e=e?e:window.event;
        var files = e.target.files || e.dataTransfer.files;

        $('#btn_upd_can_add').addClass('disabled');
<<<<<<< HEAD
        $('#loader_image').show();               
        $('div.ace-file-input').hide();
        $('div#image_uploaded').hide();
=======
        $('#loader_image_upd').show();               
        $('div.ace-file-input').hide();
        $('.img_up').hide();
        $('div#image_uploaded_upd').hide();
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188

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
<<<<<<< HEAD
                // muestra y desahbilita div y botones
                $('#btn_upd_can_add').removeClass('disabled');
                $('#loader_image').hide();               
=======
                // muestra la imagen subida
                $('.img_up').attr('src',data.url);
                $('div#image_uploaded_upd').show();
                $('.img_up').show();
                
                // muestra y desahbilita div y botones
                $('#btn_upd_can_add').removeClass('disabled');
                $('#loader_image_upd').hide();               
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
                $('div.ace-file-input').show();
                $('div.ace-file-input').find('.remove').hide();

                // pone los valores en los input para enviar por post
                $('#txt_upd_can_foto').val(data.url);

<<<<<<< HEAD
                // muestra la imagen subida
                $('.img_up').attr('src',data.url);
                $('div#image_uploaded').show();
            },
            error: function(data) {
                $('#btn_upd_can_add').removeClass('disabled');
                $('#loader_image').hide();               
=======
            },
            error: function(data) {
                $('#btn_upd_can_edit').removeClass('disabled');
                $('#loader_image_upd').hide();               
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
                $('div.ace-file-input').show();
            }
        });
    });
}


// FUNCIÓN PARA CARGAR MAPA DE REGISTRO DE LATITUD Y LONGITUD DE UNA CANCHA
<<<<<<< HEAD
function initialize_mapscanchas(){
=======
function initialize_mapscanchas_upd(){
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
    var lat,lng;
    var geocoder = new google.maps.Geocoder();
    
    //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
    lat = $('#hid_upd_can_latitud').val();
    lng = $('#hid_upd_can_longitud').val();
    
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
    
<<<<<<< HEAD
    var map = new google.maps.Map(document.getElementById("mapa_canchas"),myOptions);      
=======
    var map = new google.maps.Map(document.getElementById("mapa_canchas_upd"),myOptions);      
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
    
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
        document.getElementById('txt_upd_can_ubicacion'));

    
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
        
<<<<<<< HEAD
    //Asignamos al evento click del boton la funcion codeAddress
    $('#pasar').click(function(){
        codeAddress();
        return false;
    });
    $('#txt_upd_can_ubicacion').on('',function(){
        codeAddress();
=======
    //Asignamos al evento click del boton la funcion codeAddressUpd
    $('#pasar_upd').click(function(){
        codeAddressUpd();
        return false;
    });
    $('#txt_upd_can_ubicacion').on('',function(){
        codeAddressUpd();
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
        return false;
    });
    
    
    //funcion que traduce la direccion en coordenadas
<<<<<<< HEAD
    function codeAddress() {
=======
    function codeAddressUpd() {
>>>>>>> 6166291aa383f72ce80be0ef2330a26fa86e2188
               
        //obtengo la direccion del formulario
        var address = document.getElementById("txt_upd_can_ubicacion").value;
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
        $('#hid_upd_can_latitud').val(latLng.lat());
        $('#hid_upd_can_longitud').val(latLng.lng());
    }
}
    
