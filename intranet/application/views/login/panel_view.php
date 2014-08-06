<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->
        <link href="<?php echo URL_CSS; ?>bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo URL_CSS; ?>font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <!-- fonts -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace.min.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-rtl.min.css" />

        <!-- Css Validate -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>validate/validation.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>estilos.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo URL_CSS; ?>ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->


        <!-- BASIC SCRIPTS -->
        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo URL_JS; ?>jquery-2.0.3.min.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->
        
        <script type="text/javascript" src='<?php echo URL_JS ?>bootstrap.min.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS; ?>bootbox.min.js'></script>
        <script src="<?php echo URL_JS; ?>validacion/jqueryvalidate.js"></script>
        <script src="<?php echo URL_JS; ?>jsGeneral.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>login/jsLogin.js"></script>

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo URL_JS; ?>jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo URL_JS; ?>html5shiv.js"></script>
        <script src="<?php echo URL_JS; ?>respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <img src="<?=URL_IMG?>SOLO_CANCHAS.png" alt="logo solocanchas" style="margin-top: 60px;">
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <?php $this->load->view("login/login_view"); ?>
                                <?php $this->load->view("login/forgot_view"); ?>
                            </div><!-- /position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.main-container -->
        
        <?php $this->load->view("login/popup_view"); ?>

        <div id="mensajecarga" class="message_loading"></div> 

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='<?php echo URL_JS; ?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>

    </body>
</html>
