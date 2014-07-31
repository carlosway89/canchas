  


<div class="page-content">
      <div class="page-header">
            <h1>
                  Nuevo Evento
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Crea y publica un nuevo evento
                  </small>
            </h1>
      </div><!-- /.page-header -->
      <div class="row">
            <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <?php   
                  $atributosForm = array('id ' => 'frm_nuevo_evento', "class" => 'form-horizontal');

                  echo form_open('eventos/guardar', $atributosForm); ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Titulo del Evento </label>

                              <div class="col-sm-9">
                                    <input id="cEveTitulo" placeholder="Titulo" class="col-xs-10 col-sm-5" type="text" name="cEveTitulo" value="<?php echo set_value('cEveTitulo'); ?>"  title="Ingrese Titulo del Evento" required />
                                    <?php echo form_error('cEveTitulo','<div class="col-md-12 text-warning">','</div>'); ?>                              
                              </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Direccion del Evento </label>

                              <div class="col-sm-4">
                                    <div class="input-group">
                                          <input id="cEveDireccion" type="text" placeholder="Direccion" class="form-control" name="cEveDireccion" value="<?php echo set_value('cEveDireccion'); ?>" title="Ingrese Direccion del Evento" required  />
                                          <span class="input-group-btn">
                                                <button id="pasar" class="btn btn-sm btn-default" type="button">
                                                Buscar en el mapa
                                                </button>
                                          </span>
                                    </div>
                                     <?php echo form_error('cEveDireccion','<div class="col-md-12 text-warning">','</div>'); ?>
                                    
                              </div>
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-4">
                                    <h6 class="text-info">Arrastre la flecha para ubicar su evento</h6 class="text-info">
                                    <div id="evento_map"></div>
                              </div>
                        </div>
                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion del Evento </label>

                              <div class="col-sm-9">
                                    <textarea id="cEveDescripcion" placeholder="Descripcion del evento" class="col-xs-10 col-sm-5" type="text" name="cEveDescripcion" title="Ingrese Descripcion del Evento" required><?php echo set_value('cEveDescripcion'); ?></textarea>
                                    <?php echo form_error('cEveDescripcion','<div class="col-md-12 text-warning">','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Link en facebook </label>

                              <div class="col-sm-9">
                                    <input id="cEveLinkFacebook" type="text" name="cEveLinkFacebook" class="col-xs-10 col-sm-5" placeholder="Evento en Facebook (opcional)" value="<?php echo set_value('cEveLinkFacebook'); ?>"  />
                                    <?php echo form_error('cEveLinkFacebook','<div class="col-md-12 text-warning">','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Empiezo del Evento</label>

                              <div class="col-xs-5 col-sm-2">
                                    <div class="input-group">
                                          <input id="dEveStartTime" type="text" name="dEveStartTime" value="<?php echo set_value('dEveStartTime'); ?>"  class="form-control date-picker " data-date-format="yyyy-mm-dd" title="Ingrese Fecha Empiezo del Evento" required />
                                          <span class="input-group-addon">
                                                <i class="icon-calendar bigger-110"></i>
                                          </span>
                                    </div>
                                    <?php echo form_error('dEveStartTime ','<div class="col-md-12 text-warning">','</div>'); 
                                          echo $errorfecha;
                                    ?>
                              </div>
                              <div class="col-xs-5 col-sm-1">
                                  <div class="input-group bootstrap-timepicker">
                                    <input id="StartHora" type="text" class="form-control" name="StartHora" />
                                    <span class="input-group-addon">
                                      <i class="icon-time bigger-110"></i>
                                    </span>
                                  </div>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Termino del Evento</label>

                              <div class="col-xs-5 col-sm-2">
                                    <div class="input-group">
                                          <input id="dEveEndTime" type="text" name="dEveEndTime" value="<?php echo set_value('dEveEndTime'); ?>"  class="form-control date-picker " data-date-format="yyyy-mm-dd" title="Ingrese Fecha Termino del Evento" required />
                                          <span class="input-group-addon">
                                                <i class="icon-calendar bigger-110"></i>
                                          </span>
                                    </div>
                                    <?php echo form_error('dEveEndTime ','<div class="col-md-12 text-warning">','</div>'); ?>
                              </div>
                              <div class="col-xs-5 col-sm-1">
                                  <div class="input-group bootstrap-timepicker">
                                    <input id="EndHora" type="text" class="form-control" name="EndHora"  />
                                    <span class="input-group-addon">
                                      <i class="icon-time bigger-110"></i>
                                    </span>
                                  </div>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Foto del Evento </label>

                              <div class="col-xs-10 col-sm-3">
                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="userfile"  required/>
                                    <div id="image_uploaded" class="text-center" style="display:none">
                                      <img src="" class="img_up">
                                    </div>
                                    <div id="loader_image" class="text-center" style="display:none">
                                      <img src="<?=URL_IMG?>/cargando.gif" class="img_loader"><br>
                                      Subiendo....
                                    </div>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Costo del Evento S/. </label>

                              <div class="col-sm-9">
                                    <input class="input-mini" id="spinner-numero" type="text" placeholder="Costo del Evento"  name="nEveCosto" value="<?php echo set_value('nEveCosto'); ?>"  />
                                    <?php echo form_error('nEveCosto','<div class="col-md-12 text-warning">','</div>'); ?>
                              </div>
                        </div>
                         
                        <div class="hidden ">
                              <input id="nUsuario" type="hidden" name="nUsuario" value="1"  />
                              <input id="Latitud" type="hidden" name="cEveLatitud" value="-8.111729024852341" />
                              <input id="Longitud" type="hidden" name="cEveLongitud"  value="-79.02822839370117" />
                               <input id="cEveEstado" type="hidden" name="cEveEstado" value="H"  />
                                <input id="foto_url" name="foto_url" type="hidden" />
                               <input id="dEveFechaRegistro" type="hidden" name="dEveFechaRegistro" value="<?=date('Y-m-d');?>"  />
                        </div>
                        
                        

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button id="btn_upload" class="btn btn-info" type="submit" name="submit">
                                          <i class="icon-ok bigger-110"></i>
                                          Publicar
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <a href="<?=URL_MAIN?>eventos" class="btn">
                                          <i class="icon-undo bigger-110"></i>
                                          Cancelar
                                    </a>
                              </div>
                        </div>
                  <?php echo form_close(); ?>
            </div>
      </div>


     
</div>

<style type="text/css">
      #evento_map{
            width: 100%;
            height: 200px;
      }
</style>
<style type="text/css">
  .img_loader{
    height: 50px;
  }
  .img_up{
    height: 150px;
    width: 150px;

  }
</style>

<script type="text/javascript">

      if (document.addEventListener) {
         document.addEventListener("DOMContentLoaded", loadScripts, false);
      }

      //Declaramos las variables que vamos a user
      var lat = null;
      var lng = null;
      var map = null;
      var geocoder = null;
      var marker = null;
      
      function loadScripts() {

             //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
           lat = $('#Latitud').val();
           lng = $('#Longitud').val();
             
           //Asignamos al evento click del boton la funcion codeAddress
           $('#pasar').click(function(){
              codeAddress();
              return false;
           });
           $('#cEveDireccion').on('',function(){
              codeAddress();
              return false;
           });

           //Inicializamos la función de google maps una vez el DOM este cargado
          initialize();


          $('#StartHora,#EndHora').timepicker({
            minuteStep: 1,
            showSeconds: false,
            showMeridian: false
          }).next().on(ace.click_event, function(){
            $(this).prev().focus();
          });

          $('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
            $(this).prev().focus();
          });

          $('#id-input-file-1 , #id-input-file-2').ace_file_input({
              no_file:'Ningun Archivo Seleccionado ...',
              btn_choose:'Elegir',
              btn_change:'Cambiar',
              droppable:false,
              onchange:null,
              thumbnail:false, //| true | large
              whitelist:'gif|png|jpg|jpeg',
              blacklist:'exe|php|html'
              //onchange:''
              //
            });
          $('#id-input-file-2').on('change',function(e){

                e=e?e:window.event;
                var files = e.target.files || e.dataTransfer.files;


                $('#btn_upload').addClass('disabled');
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

                    //muestra y desahbilita div y botones
                    $('#btn_upload').removeClass('disabled');
                    $('#loader_image').hide();               
                    $('div.ace-file-input').show();
                    $('div.ace-file-input').find('.remove').hide();


                    //pone los valores en los input para enviar por post
                   
                    $('#foto_url').val(data.url);

                    //muestra la imagen subida
                    $('.img_up').attr('src',data.url);
                    $('div#image_uploaded').show();
                    

                  },
                  error: function(data) {
                    $('#btn_upload').removeClass('disabled');
                    $('#loader_image').hide();               
                    $('div.ace-file-input').show();
                  }
                });

                

            });

          
          $('#spinner-numero').ace_spinner({value:0,min:0,max:100,step:10, on_sides: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});

      }  
           
      function initialize() {
           
            geocoder = new google.maps.Geocoder();
              
             //Si hay valores creamos un objeto Latlng
             if(lat !='' && lng != '')
            {
               var latLng = new google.maps.LatLng(lat,lng);
            }
            else
            {
               var latLng = new google.maps.LatLng(-8.111729024852341,-79.02822839370117);
            }
            //Definimos algunas opciones del mapa a crear
             var myOptions = {
                center: latLng,//centro del mapa
                zoom: 15,//zoom del mapa
                mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
              };
              //creamos el mapa con las opciones anteriores y le pasamos el elemento div
              map = new google.maps.Map(document.getElementById("evento_map"), myOptions);
               
              //creamos el marcador en el mapa
              marker = new google.maps.Marker({
                  map: map,//el mapa creado en el paso anterior
                  position: latLng,//objeto con latitud y longitud
                  draggable: true //que el marcador se pueda arrastrar
              });
              
             //función que actualiza los input del formulario con las nuevas latitudes
             //Estos campos suelen ser hidden
              updatePosition(latLng);
               
               
          }
           
          //funcion que traduce la direccion en coordenadas
      function codeAddress() {
               
              //obtengo la direccion del formulario
              var address = document.getElementById("cEveDireccion").value;
              //hago la llamada al geodecoder
              geocoder.geocode( { 'address': address}, function(results, status) {
               
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
             
             $('#Latitud').val(latLng.lat());
             $('#Longitud').val(latLng.lng());
         
        }

</script>




