  


<div class="page-content">
      <div class="page-header">
            <h1>
                  Editar Evento
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Edita tu evento
                  </small>
            </h1>
      </div><!-- /.page-header -->
      <div class="row">
            <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <?php echo $custom_error; ?>
                  <?php   
                  $atributosForm = array('id ' => 'frm_nuevo_evento', "class" => 'form-horizontal');

                  echo form_open(current_url(), $atributosForm); ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Titulo del Evento </label>

                              <div class="col-sm-9">
                                    <input id="cEveTitulo" placeholder="Titulo" class="col-xs-10 col-sm-5" type="text" name="cEveTitulo" value="<?php echo $result->cEveTitulo ?>"  />
                                    <?php echo form_error('cEveTitulo','<div>','</div>'); ?>                              
                              </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Direccion del Evento </label>

                              <div class="col-sm-9">
                                    <input id="cEveDireccion" type="text" placeholder="Direccion" class="col-xs-10 col-sm-5" name="cEveDireccion" value="<?php echo $result->cEveDireccion ?>"  />
                                    <?php echo form_error('cEveDireccion','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-4">
                                    <h6 class="text-info">Arrastre la flecha para editar la ubicacion de su evento</h6 class="text-info">
                                    <div id="evento_map"></div>
                              </div>
                        </div>
                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion del Evento </label>

                              <div class="col-sm-9">
                                    <textarea id="cEveDescripcion" placeholder="Descripcion del evento" class="col-xs-10 col-sm-5" type="text" name="cEveDescripcion"><?php echo $result->cEveDescripcion ?></textarea>
                                    <?php echo form_error('cEveDescripcion','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Link en facebook </label>

                              <div class="col-sm-9">
                                    <input id="cEveLinkFacebook" type="text" name="cEveLinkFacebook" class="col-xs-10 col-sm-5" placeholder="Evento en Facebook (opcional)" value="<?php echo $result->cEveLinkFacebook ?>"  />
                                    <?php echo form_error('cEveLinkFacebook','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Empiezo del Evento</label>

                              <div class="col-xs-5 col-sm-2">
                                    <div class="input-group">
                                          <input id="dEveStartTime" type="text" name="dEveStartTime" value="<?=date('Y-m-d',strtotime($result->dEveStartTime));?>"  class="form-control date-picker " data-date-format="yyyy-mm-dd" />
                                          <span class="input-group-addon">
                                                <i class="icon-calendar bigger-110"></i>
                                          </span>
                                    </div>
                                    <?php echo form_error('dEveStartTime ','<div>','</div>');
                                          echo $errorfecha;
                                     ?>
                              </div>
                              <div class="col-xs-5 col-sm-1">
                                  <div class="input-group bootstrap-timepicker">
                                    <input id="StartHora" type="text" class="form-control" name="StartHora" value="<?=date('H:i',strtotime($result->dEveStartTime));?>" />
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
                                          <input id="dEveEndTime" type="text" name="dEveEndTime" value="<?=date('Y-m-d',strtotime($result->dEveEndTime));?>"  class="form-control date-picker " data-date-format="yyyy-mm-dd" />
                                          <span class="input-group-addon">
                                                <i class="icon-calendar bigger-110"></i>
                                          </span>
                                    </div>
                                    <?php echo form_error('dEveEndTime ','<div>','</div>'); ?>
                              </div>
                              <div class="col-xs-5 col-sm-1">
                                  <div class="input-group bootstrap-timepicker">
                                    <input id="EndHora" type="text" class="form-control" name="EndHora" value="<?=date('H:i',strtotime($result->dEveEndTime));?>" />
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
                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="cEveLinkFoto" value="<?php echo $result->cEveLinkFoto ?>" />                      
                                    <?php echo form_error('cEveLinkFoto','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Costo del Evento S/. </label>

                              <div class="col-sm-9">
                                    <input class="input-mini" id="spinner-numero-2" type="text" placeholder="Costo del Evento"  name="nEveCosto" value="<?php echo $result->nEveCosto ?>"  />
                                    <?php echo form_error('nEveCosto','<div>','</div>'); ?>
                                    <script type="text/javascript">
                                          if (document.addEventListener) {
                                             document.addEventListener("DOMContentLoaded", inicializar, false);
                                          }

                                          function inicializar(){
                                             $('#spinner-numero-2').ace_spinner({value:<?php echo $result->nEveCosto ?>,min:0,max:100,step:10, on_sides: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
                                          }
                                          
                                    </script>
                              </div>
                        </div>
                         
                        <div class="hidden ">
                              <input id="nUsuario" type="hidden" name="nUsuario" value="1"  />
                              <?php echo form_hidden('nEveID',$result->nEveID) ?>
                              <input id="Latitud" type="hidden" name="cEveLatitud" value="<?=$result->cEveLatitud?>" />
                              <input id="Longitud" type="hidden" name="cEveLongitud"  value="<?=$result->cEveLongitud?>" />
                               <input id="cEveEstado" type="hidden" name="cEveEstado" value="H"  />
                               <input id="dEveFechaRegistro" type="hidden" name="dEveFechaRegistro" value="<?=date('Y-m-d');?>"  />
                        </div>
                        
                        

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit" name="submit">
                                          <i class="icon-ok bigger-110"></i>
                                          Editar Evento
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




