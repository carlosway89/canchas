<section id="content">

    <!-- Page Heading -->
    <section class="section page-heading animate-onscroll">       
        
        <h1><?php echo $cCanNombre; ?></h1>
        <p class="breadcrumb"><a href="<?php echo URL_MAIN ?>">Inicio</a> / <a href="<?php echo URL_MAIN ?>canchas/busqueda">Búsqueda de Canchas</a> / Información de la Cancha seleccionada</p>

    </section>
    <!-- Page Heading -->


    <!-- Event Map -->
    <section class="section full-width full-width-image animate-onscroll">
        <a class="media-icon" rel="prettyPhoto[slider_gallery1]"  href="<?= $cCanFotoPortada; ?>"><img src="<?= $cCanFotoPortada; ?>"alt="solocanchas.com" style="width: 100%;"></a>
    </section>
    <!-- /Event Map -->


    <!-- Section -->
    <section class="section full-width-bg">

        <div class="row">
            
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
                            <i class="icons icon-globe"></i> <b>Web: </b> <a><?=$cCanSitioWeb?></a>
                        </p>
                        <p>
                            <i class="icons icon-mail-alt"></i> <b>Email: </b> <a href="mailto:<?php echo $cCanEmail; ?>"> <?php echo $cCanEmail; ?></a>
                        </p>
                        <p>
                            <i class="icons icon-location"></i> <b>Dirección: </b>  <?php echo $cCanDireccion; ?>
                        </p>
                        <!-- <p>
                            <i class="icons icon-ticket"></i> <b>Precio: </b> S/.30.00 Nuevos Soles
                        </p> -->
                        <a class="button donate btn_reservar fancybox media-icon" href="#modal-cancha-reservar" data-value="<?=$nCanEnlace?>" ><i class="icons icon-right-hand"></i> Reservar</a>
                        <a class="button donate2 btn_reservar fancybox" href="#modal-pagar" > Pagar</a>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-6 animate-onscroll">
                        <div class="side-segment">
                            <h6><i class="icons icon-picture"></i> GALERÍA DE FOTOS</h6>
                        </div>

                        <div class="portfolio-slideshow flexslider animate-onscroll">

                            <ul class="slides">
                                <?php
                                  $n=count($list_galeria);
                                  if($n==0){
                                ?>
                                  <div class="alert alert-info">No dispone de una galeria a&uacute;n </div>
                                <?php    
                                    
                                  }
                                  else{
                                    foreach ($list_galeria as $list_galeria){ 
                                        ?>

                                <li><a class="media-icon" rel="prettyPhoto[slider_gallery1]"  href="<?=$list_galeria->cMultLink?>"><img src="<?=$list_galeria->cMultLink?>" alt=""></a></li>
                                <?php
                                            } 
                                  }
                                        ?>						
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

    <!-- modal de reserva-->
    <div id="modal-cancha-reservar" style="width: 850px;height:550px;display: none;">
        <?php 
        if($nCanEnlace==''){?>
        <h3>Lo sentimos!!!</h3>
        <div class="alert alert-warning">
            Esta cancha aún no esta habilitada para reservas.
        </div>
        <?php 
        }
        else{?>
        <iframe src="http://solocanchas.com/WebCanchas/frmReserva.aspx?IdEmpresa=<?=$nCanEnlace?>" width="100%" height="100%">
        </iframe>
        <?php
        }
        ?>
    </div>

    <div id="modal-pagar" style="width: 850px;height:650px;display: none;">
        <H4>Realizar Pago de Reserva</H4>        
        <div class="payment-options">
            <ul>
                <li>
                    <div class="payment-header">
                        <input type="radio" name="payment-option" checked="checked" id="direct-bank-transfer-radio">
                        <label for="direct-bank-transfer-radio" class="text-info">Pagar Con Tarjeta de Credito o Debito <img src="<?=URL_IMG?>logotipo-visa.jpg" alt="visa logo"></label>
                    </div>
                    <div class="payment-content">
                        <p class="text-warning">Ingresar los Datos Requeridos para realizar el pago de su reserva con tarjeta Visa</p>
                        <form class="">
                            <div class="row inline-inputs">                                
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label>Nombres*</label>
                                    <input type="text" required>
                                </div>                                
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label>Apellidos*</label>
                                    <input type="text" required>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label>N° Tarjeta*</label>
                                    <input type="text" required>
                                </div>                                
                            </div>
                            <br>
                            
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label>Expiracion*</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <select name="month" class="chosen-select">
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option selected>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <select name="year" class="chosen-select">
                                                <option selected>2014</option>
                                                <option>2015</option>
                                                <option>2016</option>
                                                <option>2017</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                                <option>2023</option>
                                                <option>2024</option>
                                                <option>2025</option>
                                                <option>2026</option>
                                            </select>
                                        </div> 
                                    </div>                                                                        
                                    
                                </div> 
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <label>Codigo CVV*</label>
                                    <input type="text" required>
                                </div> 
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-11" >
                                    <button class="btn btn-lg">Pagar</button>
                                <img src="<?=URL_IMG?>logotipo-verified-by-visa.jpg" alt="visa logo">
                                </div>
                                

                            </div>
                            

                        </form>
                        
                    </div>
                </li>
                <li>
                    <div class="payment-header">
                        <input type="radio" name="payment-option" id="cheque-payment-radio">
                        <label for="cheque-payment-radio" class="text-info">Pagado por Agente o Banco (Ingresar Voucher)</label>
                    </div>
                    <div class="payment-content">
                        <p class="text-warning">Ingresar los Datos Requeridos que acontinuacion se le pide para confirmar el pago de su reserva</p>
                        <form class="">
                            <div class="row inline-inputs">                                
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label>Nombres y Apellidos*</label>
                                    <input type="text" required>
                                </div>                                
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label>N° Documento*</label>
                                    <input type="text" required>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label>N° Voucher*</label>
                                    <input type="text" required>
                                </div>  
                                                             
                            </div>
                            <div class="row">
                                <div class="col-lg-11">
                                    <button class="btn btn-lg">Confirmar</button>
                                </div> 
                            </div>
                            

                        </form>
                    </div>
                </li>
                <li>
                    <div class="payment-header">
                        <input type="radio" name="payment-option" id="paypal-radio">
                        <label for="paypal-radio" class="text-info">Pagar por PayPal <img src="<?=URL_IMG?>paypal.png" alt=""></label>
                    </div>
                    <div class="payment-content">
                        <p class="text-warning">Realize el pago de su reserva por medio de Paypal</p>
                        <button class="btn btn-lg">Pagar</button>
                    </div>
                </li>
            </ul>
        </div>

    </div>

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

