<section id="content">

    <!-- Page Heading -->
    <section class="section page-heading animate-onscroll">

        <h1><?php echo $cCanNombre; ?></h1>
        <p class="breadcrumb"><a href="<?php echo URL_MAIN ?>">Inicio</a> / <a href="<?php echo URL_MAIN ?>canchas/busqueda">Búsqueda de Canchas</a> / Información de la Cancha seleccionada</p>

    </section>
    <!-- Page Heading -->


    <!-- Event Map -->
    <section class="section full-width full-width-image animate-onscroll">
        <img src="<?php echo URL_IMG; ?>portada.jpg" alt="" style="width: 100%;">
    </section>
    <!-- /Event Map -->


    <!-- Section -->
    <section class="section full-width-bg">

        <div class="row">
            <?php ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row event-details">

                    <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
                        <div class="side-segment">
                            <h6><i class="icons icon-info-circled"></i> INFORMACIÓN GENERAL</h6>
                        </div>
                        <p style="text-align: justify;">
                            <?php echo $cCanDescripcion; ?>
                        </p>
                        <p>
                            <i class="icons icon-globe"></i> <b>Web: </b> <a>http://companyname.com</a>
                        </p>
                        <p>
                            <i class="icons icon-mail-alt"></i> <b>Email: </b> <a href="mailto:mail@companyname.com"> <?php echo $cCanEmail; ?></a>
                        </p>
                        <p>
                            <i class="icons icon-location"></i> <b>Dirección: </b>  <?php echo $cCanDireccion; ?>
                        </p>
                        <p>
                            <i class="icons icon-ticket"></i> <b>Precio: </b> S/.30.00 Nuevos Soles
                        </p>
                        <a class="button donate btn_reservar" target="_blank"      href="http://solocanchas.com/WebCanchas/frmReserva.aspx?IdEmpresa=11><i class="icons icon-right-hand"></i> Reservar</a>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-6 animate-onscroll">
                        <div class="side-segment">
                            <h6><i class="icons icon-picture"></i> GALERÍA DE FOTOS</h6>
                        </div>

                        <div class="portfolio-slideshow flexslider animate-onscroll">

                            <ul class="slides">

                                <li><a class="media-icon" rel="prettyPhoto[slider_gallery1]"  href="<?php echo URL_IMG; ?>galley1.jpg"><img src="<?php echo URL_IMG; ?>galley1.jpg" alt=""></a></li>
                                <li><a class="media-icon" rel="prettyPhoto[slider_gallery1]"  href="<?php echo URL_IMG; ?>galley2.jpg"><img src="<?php echo URL_IMG; ?>galley2.jpg" alt=""></a></li>
                                <li><a class="media-icon" rel="prettyPhoto[slider_gallery1]"  href="<?php echo URL_IMG; ?>galley3.jpg"><img src="<?php echo URL_IMG; ?>galley3.jpg" alt=""></a></li>												
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 animate-onscroll">
                        <div class="side-segment">
                            <h6><i class="icons icon-location"></i> UBICACIÓN GEOGRÁFICA</h6>
                        </div>

                        <div class="event-image animate-onscroll">
                            <div id="maps" class="detail-google-maps"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Section -->


    <section class="section full-width-bg">
        <div class="row">
            <?php $this->load->view("canchas/comentarios_canchas_view"); ?>
        </div>
        <!-- /Post Comments -->
    </section>

    <!-- Related Events -->
    <section class="section full-width-bg">
        <?php $this->load->view("canchas/otras_canchas_view"); ?>
    </section>
    <!-- /Related Events -->

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
            center: new google.maps.LatLng(<?php echo $cCanLatitud; ?>,<?php echo $cCanLongitud; ?>),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    
        var map = new google.maps.Map(document.getElementById("maps"),myOptions);       
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $cCanLatitud; ?>,<?php echo $cCanLongitud; ?>),
            map: map,	   
            title: 'Ubicación de <?php echo $cCanNombre; ?>'		
        });
    
        if(!popupinicial){
            popupinicial = new google.maps.InfoWindow();
        }
           
        var contenido='<?php echo $cCanNombre; ?>';
        popupinicial.setContent(contenido);
        popupinicial.open(map, marker);
    }
</script>

