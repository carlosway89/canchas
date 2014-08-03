<?php

error_reporting(0);

?>
<section id="content">
	

	<!-- Page Heading -->
	<section class="section page-heading animate-onscroll">
		
		<h1><?=$result[0]['cEveTitulo']?></h1>
		
	</section>
	<!-- Page Heading -->
	
	
	<!-- Event Map -->
	<div class="section full-width full-width-map animate-onscroll">
		<div id="evento_detalle_map" width="900" height="480" >
		</div>
		
	</div>
	<!-- /Event Map -->
	
	
	<!-- Section -->
	<section class="section full-width-bg gray-bg">
		
		<div class="row">
		
			<div class="col-lg-12 col-md-12 col-sm-12">
				
				<!-- Event Single -->
				<div class="event-single">
					
					<div class="row">
						
						<div class="col-lg-9 col-md-9 col-sm-8 animate-onscroll">
							<div class="col-md-6">
								<h6>Description</h6>
							
								<p><?=$result[0]['cEveDescripcion']?> </p>
							</div>
							<div class="col-md-6">
								<div class="event-image">
									<img src="<?=$result[0]['cEveLinkFoto']?>" alt="">
								</div>
							</div>
							<br>
							
						</div>
						
						<div class="col-lg-3 col-md-3 col-sm-4">
							
							<!-- Event Meta -->
							<div class="event-meta">
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-calendar"></i>
									<p class="title">Fecha Empiezo - Fecha Termino</p>
									<p><?= date("d/m/y",strtotime($result[0]['dEveStartTime']));?> - <?= date("d/m/y",strtotime($result[0]['dEveEndTime']));?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-clock"></i>
									<p class="title">Hora Empiezo - Hora Termino</p>
									<p><?=date("H:i",strtotime($result[0]['dEveStartTime']));?> - <?=date("H:i",strtotime($result[0]['dEveEndTime']));?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-location"></i>
									<p class="title">Direccion del Evento</p>
									<p><?=$result[0]['cEveDireccion']?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-ticket"></i>
									<p class="title">Costo</p>
									<p><?=$result[0]['nEveCosto']==0?'Entrada Libre':'S/.'.$result[0]['nEveCosto']?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-share"></i>
									<p class="title">Share This</p>
									<ul class="social-share">
										<li class="facebook"><a href="#" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
										<li class="email"><a href="#" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
									</ul>
									
								</div>
								
								
							</div>
							<!-- /Event Meta -->
							
						</div>
						
					</div>
				
				</div>
				<!-- /Event Single -->
				
				
				<div class="row event-pagination">
				
					<!-- <div class="col-lg-4 col-md-4 col-sm-4 align-left animate-onscroll">
						<a href="#" class="button big button-arrow-before">Prev event</a>
					</div> -->
					
					<div class="col-lg-12 col-md-12 col-sm-12 align-center animate-onscroll">
						<a href="<?php echo URL_MAIN ?>eventos" class="button big">All events</a>
					</div>
					
					<!-- <div class="col-lg-4 col-md-4 col-sm-4 align-right animate-onscroll">
						<a href="#" class="button big button-arrow">Next event</a>
					</div> -->
				
				</div>
				
			</div>
		</div>
						
	</section>
</section>
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
           lat = <?=$result[0]['cEveLatitud']?>;
           lng = <?=$result[0]['cEveLongitud']?>;
             

           //Inicializamos la función de google maps una vez el DOM este cargado
          initialize();

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
              map = new google.maps.Map(document.getElementById("evento_detalle_map"), myOptions);



              //creamos el marcador en el mapa
              marker = new google.maps.Marker({
                  map: map,//el mapa creado en el paso anterior
                  position: latLng,//objeto con latitud y longitud
                  title: 'Ubicación de <?=$result[0][cEveTitulo]?>',
                  draggable: false //que el marcador se pueda arrastrar
              });

              popupinicial = new google.maps.InfoWindow();
               var contenido='<?=$result[0][cEveTitulo]?>';
        		popupinicial.setContent(contenido);

        		popupinicial.open(map, marker);
                             
               
          }
           
          //funcion que traduce la direccion en coordenadas
    

</script>