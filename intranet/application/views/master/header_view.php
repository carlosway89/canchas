<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard - Ace Admin</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?php echo URL_CSS; ?>bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>jquery-ui-1.10.3.custom.min.css" />

        <link rel="stylesheet" href="<?php echo URL_CSS; ?>jquery.gritter.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>chosen.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>bootstrap-timepicker.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>daterangepicker.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>colorpicker.css" />

        <!-- jquery ui -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>jquery-ui-1.10.3.full.min.css" />

        <!-- fonts -->

        <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-fonts.css" />

        <!-- ace styles -->

        <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace.min.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-skins.min.css" />

        <!-- Css Validate -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>validate/validation.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>estilos.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->

        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo URL_JS; ?>jquery-2.0.3.min.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<?php echo URL_JS; ?>jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<?php echo URL_JS; ?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="<?php echo URL_JS; ?>bootstrap.min.js"></script>
        <script src="<?php echo URL_JS; ?>typeahead-bs2.min.js"></script>


        <script src="<?php echo URL_JS; ?>jquery.dataTables.min.js"></script>
        <script src="<?php echo URL_JS; ?>jquery.dataTables.bootstrap.js"></script>
        <script src="<?php echo URL_JS; ?>jquery-ui-1.10.3.full.min.js"></script>


        <script src="<?php echo URL_JS; ?>validacion/jqueryvalidate.js"></script>
        <script src="<?php echo URL_JS; ?>jsGeneral.js"></script>



        <!-- page specific plugin scripts -->

        <script src="<?php echo URL_JS; ?>ace-extra.min.js"></script>

    </head>

    <body onUnload="msjCargando();">
        <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <img src="<?=URL_IMG?>SOLO_CANCHAS.png" alt="logo solocanchas" style="margin-top: 5px;">
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <i class=" icon-group bigger-230"></i>&nbsp;
                                <span class="user-info">
                                    <small>Bienvenido,</small>
                                    <?php echo $this->session->userdata('Nombres'); ?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="<?php echo URL_MAIN; ?>cambiar_clave">
                                        <i class="icon-cog"></i>
                                        Cambiar Clave
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo URL_MAIN; ?>actualizar_datos">
                                        <i class="icon-user"></i>
                                        Actualizar Datos
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <?php 
                                    if ($this->session->userdata('dedonde') == "portal"){
                                        $ruta_logout = URL_PORTAL."acceso/logout";
                                    }else{
                                        $ruta_logout = URL_MAIN."acceso/logout";
                                    } 
                                    ?>
                                    <a href="<?php echo $ruta_logout ?>">
                                        <i class="icon-off"></i>
                                        Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- /.ace-nav -->
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </div>

        <?php $this->load->view("master/menu_left_view"); ?>
        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="<?php echo URL_MAIN ?>manage">Inicio</a>
                    </li>
                    <li class="active"><?= $breadcrumbs ?></li>
                </ul><!-- .breadcrumb -->
            </div>