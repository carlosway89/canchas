<!DOCTYPE html>
<html>
    <head>

        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title><?php echo $title; ?></title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

        <!-- Stylesheets -->
        <link href="<?php echo URL_CSS; ?>bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>fontello.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>flexslider.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_JS; ?>revolution-slider/css/settings.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo URL_CSS; ?>owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>responsive-calendar.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>chosen.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>cloud-zoom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_CSS; ?>colorpicker.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>style.css" rel="stylesheet" type="text/css">


        <!--[if IE 9]>
                <link rel="stylesheet" href="<?php echo URL_JS; ?>ie9.css">
        <![endif]-->

        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <link href="<?php echo URL_JS; ?>jackbox-ie8.css" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="<?php echo URL_JS; ?>ie.css">
<![endif]-->

        <!--[if gt IE 8]>
                <link href="<?php echo URL_CSS; ?>jackbox-ie9.css" rel="stylesheet" type="text/css" />
        <![endif]-->

        <!--[if IE 7]>
                <link rel="stylesheet" href="<?php echo URL_CSS; ?>fontello-ie7.css">
        <![endif]-->

        <style type="text/css">
            .no-fouc {display:none;}
        </style>

        <!-- jQuery -->
        <script src="<?php echo URL_JS; ?>jquery-1.11.0.min.js"></script>
        <script src="<?php echo URL_JS; ?>jquery-ui-1.10.4.min.js"></script>

        <!-- Preloader -->
        <script src="<?php echo URL_JS; ?>jquery.queryloader2.min.js"></script>
        <script src="<?php echo URL_JS; ?>jsCustomHeader.js"></script>


    </head>

    <body class="tablet-sticky-header boxed-layout">

        <div id="fb-root"></div>

        <!-- Container -->
        <div class="container">

            <!-- Header -->
            <header id="header" class="animate-onscroll">

                <!-- Main Header -->
                <div id="main-header">

                    <div class="container">

                        <div class="row">

                            <!-- Logo -->
                            <div id="logo" class="col-lg-4 col-md-3 col-sm-3">

                                <a href="main-v1.html"><img src="<?php echo URL_IMG; ?>logo.png" alt="Logo" width="331" height="101" style="margin-top:-20px"></a>



                            </div>
                            <!-- /Logo -->

                            <!-- Main Quote -->
                            <div class="col-lg-4 col-md-4 col-sm-4">

                                <!--                                <blockquote>Nam elit agna,enderit sit amet, tinciunt ac,<br>viverra sed, nulla..</blockquote>-->

                            </div>
                            <!-- /Main Quote -->

                            <!-- Newsletter -->
                            <div class="col-lg-4 col-md-5 col-sm-5">

                                <form id="newsletter" action="http://solocanchas.com/portal/acceso/autentication" method="POST">

                                    <h5>
                                        <i class="icons icon-laptop"></i>
                                        <?php
                                        if ($this->session->userdata("Nombres") != "") {
                                            $input_disabled = 'disabled = "disabled"';
                                            ?>
                                            SESIÓN INICIADA: 
                                            <strong><?php echo strtoupper($this->session->userdata("Nombres")); ?></strong> 

                                            <a class="logout" href="<?php echo URL_MAIN ?>acceso/logout">
                                                Cerrar Sesión
                                            </a>

                                        <?php
                                        } else {
                                            $input_disabled = '';
                                            ?>
                                            ACCEDER AL <strong>SISTEMA</strong>
<?php } ?>
                                    </h5>
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

                                    </div>

                                </form>

                            </div>
                            <!-- /Newsletter -->

                        </div>

                    </div>

                </div>
                <!-- /Main Header -->
<?php $this->load->view("master/menu_view"); ?>
            </header>
            <!-- /Header -->
