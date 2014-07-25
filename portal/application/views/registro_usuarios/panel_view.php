<html>
    <head>
        <link href="<?php echo URL_CSS; ?>bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>fontello.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>flexslider.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_JS; ?>revolution-slider/css/settings.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo URL_CSS; ?>owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>responsive-calendar.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>chosen.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_JS; ?>jackbox/css/jackbox.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_CSS; ?>cloud-zoom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_CSS; ?>colorpicker.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_CSS; ?>style.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            #clase_prueba { 
                -webkit-background-size: cover; 
                -moz-background-size: cover; 
                -o-background-size: cover; 
                background-image: url('<?php echo URL_IMG ?>background/background_registro_usuarios.jpg'); 
                /*                background-size: cover; */
                background-size: 100% 100%; 
                height: 100%; 
                /*                height: 100%; */
                width: 100%; 
                margin: 0 auto; 
                background-position: left top, right bottom, 0 0;
            }

            .cont_form_register{
                margin-top:35px; 
            }
        </style>

        <!-- jQuery -->
        <script src="<?php echo URL_JS; ?>jquery-1.11.0.min.js"></script>
        <script src="<?php echo URL_JS; ?>jquery-ui-1.10.4.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>jsRegistroUsuarios.js"></script>

    </head>
    <body id="clase_prueba">

        <div class="row cont_form_register">
            <div class="col-lg-6 col-md-6 col-sm-6">
                &nbsp;
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="banner-wrapper">
                    <div class="banner donate-banner3 animate-onscroll">
                        <div class="side-segment">
                            <h5> Registro de <strong>Usuarios</strong></h5>
                        </div>

                        <?php
                        $atributosForm = array('id ' => 'frm_ins_registro_users', 'name ' => 'frm_ins_registro_users', "style" => 'margin-bottom:30px;');
                        $txt_ins_user_nombres = form_input(array('name' => 'txt_ins_user_nombres', 'id' => 'txt_ins_user_nombres', 'placeholder' => 'Ingresar nombres', 'maxlength' => '100'));
                        $txt_ins_user_apellidos = form_input(array('name' => 'txt_ins_user_apellidos', 'id' => 'txt_ins_user_apellidos', 'placeholder' => 'Ingresar apellidos', 'maxlength' => '100'));
                        $txt_ins_user_email = form_input(array('name' => 'txt_ins_user_email', 'id' => 'txt_ins_user_email', 'placeholder' => 'Ingresar email', 'maxlength' => '100'));
                        $txt_ins_user_clave = form_input(array('name' => 'txt_ins_user_clave', 'id' => 'txt_ins_user_clave', 'placeholder' => 'Ingresar contraseña', 'maxlength' => '100'));
                        $txt_ins_user_repeclave = form_input(array('name' => 'txt_ins_user_repeclave', 'id' => 'txt_ins_user_repeclave', 'placeholder' => 'Repetir contraseña', 'maxlength' => '100'));

                        $btn_ins_users = form_button('btn_ins_users', 'GUARDAR DATOS', 'id="btn_ins_users" class="button donate3 btn_submit"');
                        ?>

                        <?php echo form_open('../registro_usuarios/usuariosIns', $atributosForm); ?>
                        <?php echo $txt_ins_user_nombres; ?>
                        <?php echo $txt_ins_user_apellidos; ?>
                        <?php echo $txt_ins_user_email; ?>
                        <?php echo $txt_ins_user_clave; ?>
                        <?php echo $txt_ins_user_repeclave; ?>
                        <?php echo $btn_ins_users; ?>
                        <?php echo form_close(); ?>
                        <?php echo validation_errors(); ?>
                    </div>
                </div>											
            </div>
        </div>
    </body>
</html>

