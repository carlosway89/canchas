
<style type="text/css" rel="stylesheet">
    #clase_prueba { 
        -webkit-background-size: cover; 
        -moz-background-size: cover; 
        -o-background-size: cover; 
        background-image: url('<?php echo URL_IMG ?>background/background_registro_usuarios.jpg'); 
        background-size: cover; 
        height: 500px; 
        width: 100%; 
        margin: 0 auto; 
        background-position: left top, right bottom, 0 0;
    }
</style>
<script type="text/javascript" src="<?php echo URL_JS; ?>jsRegistroUsuarios.js"></script>
<div id="clase_prueba">
    <div class="col-lg-6 col-md-6 col-sm-6">
        &nbsp;
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <br>

        <div class="banner-wrapper">
            <div class="banner_new donate-banner3 animate-onscroll">
                <div class="side-segment">
                    <h5> <i class="icons icon-edit-3"></i> Registro de <strong>Usuarios</strong></h5>
                </div>

                <?php
                $atributosForm = array('id ' => 'frm_ins_registro_users', 'name ' => 'frm_ins_registro_users', "style" => 'margin-bottom:30px;');
                $txt_ins_user_nombres = form_input(array('name' => 'txt_ins_user_nombres', 'id' => 'txt_ins_user_nombres', 'placeholder' => 'Ingresar nombres', 'maxlength' => '100'));
                $txt_ins_user_apellidos = form_input(array('name' => 'txt_ins_user_apellidos', 'id' => 'txt_ins_user_apellidos', 'placeholder' => 'Ingresar apellidos', 'maxlength' => '100'));
                $txt_ins_user_email = form_input(array('name' => 'txt_ins_user_email', 'id' => 'txt_ins_user_email', 'placeholder' => 'Ingresar email', 'maxlength' => '100'));
                $txt_ins_user_clave = form_password(array('name' => 'txt_ins_user_clave', 'id' => 'txt_ins_user_clave', 'placeholder' => 'Ingresar contraseña', 'maxlength' => '100'));
                $txt_ins_user_repeclave = form_password(array('name' => 'txt_ins_user_repeclave', 'id' => 'txt_ins_user_repeclave', 'placeholder' => 'Repetir contraseña', 'maxlength' => '100'));

                $btn_ins_users = form_button('btn_ins_users', 'GUARDAR DATOS', 'id="btn_ins_users" class="button donate3 btn_submit"');
                ?>

                <?php echo form_open('http://localhost/canchas/portal/registro_usuarios/usuariosIns', $atributosForm); ?>
                <div id="error_form_register_users"></div>
                <?php echo $txt_ins_user_nombres; ?>
                <?php echo $txt_ins_user_apellidos; ?>
                <?php echo $txt_ins_user_email; ?>
                <?php echo $txt_ins_user_clave; ?>
                <?php echo $txt_ins_user_repeclave; ?>
                <?php echo $btn_ins_users; ?> <span id="sms_ins_user"></span>
                <?php echo form_close(); ?>
                <?php echo validation_errors(); ?>
            </div>
        </div>			

    </div>

</div>


