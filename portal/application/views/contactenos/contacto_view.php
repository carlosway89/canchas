<section id="content">	

    <!-- Page Heading -->
    <section class="section page-heading animate-onscroll">

        <h1>Contáctenos</h1>
        <p class="breadcrumb"><a href="<?php echo URL_MAIN ?>">Inicio</a> / Contáctenos</p>
    </section>
    <!-- Page Heading -->

    <!-- Section -->
    <section class="section full-width-bg gray-bg">

        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="side-segment">
                    <h3>Envíenos un correo electrónico</h3>
                </div>

                <p>
                    Para cualquier duda, comentario, sugerencia, solicitud de información puede contactar con nosotros completando la información en el siguiente formulario.
                    Su petición será respondida dentro de las 24 horas del día.
                </p>
                <br />

                <?php $this->load->view("contactenos/ins_view"); ?>
            </div>



            <!-- Sidebar -->
            <div class="col-lg-5 col-md-5 col-sm-5 sidebar">
                <div class="sidebar-box white animate-onscroll">
                    <div class="side-segment">
                        <h3>Oficina Central</h3>
                    </div>
                    
                    <p><i class="icons icon-home"></i> <b>Dirección</b> Jirón Grau 440 2º Nivel A-13</p>
                    <p><i class="icons icon-email"></i> <b>Email</b>  <a href="#">comercial@gsavt.com</a></p>
                    <p><i class="icons icon-phone"></i> <b>Teléfono</b> (044) - 293750</p>
                </div>


                <div class="sidebar-box white animate-onscroll">
                    <div class="side-segment">
                        <h3>Nuestra Ubicación</h3>
                    </div>

                    <div class="contact-map">
                        <div id="mapa-de-contactos" class="map-contacto clase-maps-google"></div>
                    </div>

                </div>			
            </div>
            <!-- /Sidebar -->

        </div>
    </section>
    <!-- /Section -->
</section>

<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function(){
            initialize_maps()
        }, 500);
    });
    
    // FUNCIÓN PARA CARGAR MAPA DE CONTACTANOS
    function initialize_maps(){
        var popupinicial;
        var myOptions = {
            center: new google.maps.LatLng(-8.115159105817382,-79.02586688413083),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    
        var map = new google.maps.Map(document.getElementById("mapa-de-contactos"),myOptions);       
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-8.115159105817382,-79.02586688413083),
            map: map,	   
            title: 'Grupo Savt Tecnología'		
        });
    
        if(!popupinicial){
            popupinicial = new google.maps.InfoWindow();
        }
           
        var contenido='Grupo Savt Tecnología';
        popupinicial.setContent(contenido);
        popupinicial.open(map, marker);
    }
</script>
