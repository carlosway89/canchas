<!DOCTYPE html>
<html>
    <head>

        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="solocanchas reúne información de los mejores centros deportivos del pais, deportes, noticias y reservas"/>
        <meta name="author" content="Grupo SAV"/>
        <meta name="keywords" content="futbol, jugar, canchas, ver, deportes, noticias, en vivo, fixture, eventos, reservas, cerca, arriendo"/>
        <meta name="robots" content="INDEX,FOLLOW">

        <!-- Title -->
        <title><?php echo $title; ?></title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="http://solocanchas.com/portal/img/favicon.ico" />

        <!-- Stylesheets -->
        <link href="<?php echo URL_CSS; ?>bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>fontello.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>flexslider.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_JS; ?>revolution-slider/css/settings.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo URL_CSS; ?>owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>responsive-calendar.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>chosen.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>validate/validacion.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>style.css" rel="stylesheet" type="text/css">


        <style type="text/css" rel="stylesheet">
            .no-fouc {display:none;}
        </style>

        <!-- jQuery -->
        <script src="<?php echo URL_JS; ?>jquery-1.11.0.min.js"></script>
        <script src="<?php echo URL_JS; ?>jquery-ui-1.10.4.min.js"></script>

        <!-- Preloader -->
        

        <script src="<?php echo URL_JS; ?>validacion/jqueryvalidate.js"></script>




        <!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo URL_JS; ?>fancybox/jquery.fancybox.css?v=2.1.5"  />

        <!-- Add Button helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
        <script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

        <!-- Add Thumbnail helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
        <script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

        <!-- Add Media helper (this is optional) -->
        <script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.fancybox').fancybox();
            });
        </script>
                

        <script type="text/javascript" src="<?php echo URL_JS; ?>jquery.queryloader2.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>jsCustomHeader.js"></script>


    </head>

    <body class="tablet-sticky-header boxed-layout">

        <div id="fb-root"></div>

        <!-- Container -->
        <div class="container">

            <!-- Header -->
            <header id="header" class="">

                <!-- Main Header -->
                <div id="main-header">

                    <div class="container">

                        <div class="row">

                            <!-- Logo -->
                            <div id="logo" class="col-xs-12 col-lg-8 col-md-7 col-sm-7">

                                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%" id="banner" align="middle" style="margin-top:-12px;">
                                    <param name="movie" value="<?=URL_IMG?>banner.swf" />
                                    <param name="quality" value="medium" />
                                    <param name="bgcolor" value="#ffffff" />
                                    <param name="play" value="true" />
                                    <param name="loop" value="true" />
                                    <param name="wmode" value="window" />
                                    <param name="scale" value="showall" />
                                    <param name="menu" value="true" />
                                    <param name="devicefont" value="false" />
                                    <param name="salign" value="" />
                                    <param name="allowScriptAccess" value="sameDomain" />
                                    
                                    <object type="application/x-shockwave-flash" data="<?=URL_IMG?>banner.swf" width="700" height="100" style="margin-top:-12px;margin-left:-25px;">
                                        <param name="movie" value="<?=URL_IMG?>banner.swf" />
                                        <param name="quality" value="medium" />
                                        <param name="bgcolor" value="#ffffff" />
                                        <param name="play" value="true" />
                                        <param name="loop" value="true" />
                                        <param name="wmode" value="window" />
                                        <param name="scale" value="showall" />
                                        <param name="menu" value="true" />
                                        <param name="devicefont" value="false" />
                                        <param name="salign" value="" />
                                        <param name="allowScriptAccess" value="sameDomain" />
                                    
                                        <a href="#"><img src="<?php echo URL_IMG; ?>logo.png" alt="Logo" width="331" height="101" style="margin-top:-20px"></a>
                                    
                                    </object>
                                    
                                </object>
                                <!-- <div id="Stage" class="EDGE-17150850" style="margin-top:-12px;margin-left:-25px;">
                                </div>
                                <a id="Stage-mobile" href="http://www.solocanchas.com" target="_blank" title="solo canchas"><img src="<?php echo URL_IMG; ?>logo.png" alt="Logo" width="331" height="101" style="margin-top:-20px"></a>
                             -->
                            </div>
                            <!-- /Logo -->
                            

                            

                            <!-- Newsletter -->
                            <div class="col-xs-12 col-lg-4 col-md-5 col-sm-5">

                                <form id="newsletter" action="http://solocanchas.com/portal/acceso/autentication" method="POST">

                                    <h5 id="titulo-acceder">
                                        <i class="icons icon-laptop"></i>
                                        <?php
                                        if ($this->session->userdata("Nombres") != "") {
                                            $input_disabled = 'disabled = "disabled"';
                                            ?>
                                            SESIÓN INICIADA: 
                                            <strong><?php echo strtoupper($this->session->userdata("Nombres")); ?></strong>
                                            <br> 
                                            <ul class="sesion-opciones list-inline">
                                                <li>
                                                    <a class="logout" href="<?php echo URL_MAIN ?>acceso/logout">
                                                        <i class="icon-off"></i> Cerrar Sesión
                                                    </a>
                                                </li>
                                            </ul>



                                            <?php
                                        } else {
                                            $input_disabled = '';
                                            ?>
                                                ACCEDER AL <strong>SISTEMA</strong>
                                            
                                            
                                            

                                        </h5>
                                        <span id="notificacion-error" class="alert-danger" style="display:none">
                                            Usuario no habilitado o error de contraseña
                                        </span>
                                        <div class="newsletter-form">


                                            <div class="newsletter-email">
                                                <input <?php echo $input_disabled; ?> type="text" id="txt_ins_login_user" name="txt_ins_login_user" placeholder="Usuario">
                                            </div>

                                            <div class="newsletter-zip">
                                                <input <?php echo $input_disabled; ?> type="password" id="txt_ins_login_clave" name="txt_ins_login_clave" placeholder="Contraseña">
                                            </div>

                                            <div class="newsletter-submit">
                                                <input <?php echo $input_disabled; ?> id="btn_ins_login" type="submit" value="">
                                                <i class="icons icon-login"></i>
                                            </div>
                                            <div class="newsletter-loading" style="display:none">
                                                <img src="img/loading.gif">
                                            </div>

                                        </div>
                                    <?php } ?>

                                </form>

                            </div>
                            <!-- /Newsletter -->

                        </div>

                    </div>

                </div>
                <!-- /Main Header -->
                <?php $this->load->view("master/menu_view"); ?>
                <div id="inline1" style="width:700px;display: none;">
                    <?php $this->load->view("registro_usuarios/panel_view"); ?>    
                </div>
                <div id="inline2" style="width:500px;display: none;">
                    Estimado Usuario, sus datos han sido registrados correctamente. 
                    En un período de 24 horas se se le enviará un mensaje a su correo electrónico 
                    <span id="email_user"></span> 
                </div>
            </header>
            <!-- /Header -->
