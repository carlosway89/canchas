<div id="login-box" class="login-box visible widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header blue lighter bigger">
                <i class="icon-laptop green"></i>
                Acceso a la Intranet
            </h4>

            <div class="space-6"></div>
            <?php
            $atributosForm = array('id' => 'frm_ins_login', 'name' => 'frm_ins_login');
            echo form_open('acceso/autentication', $atributosForm);
            $txt_ins_login_user = form_input(array('name' => 'txt_ins_login_user', 'id' => 'txt_ins_login_user', 'class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required' => 'required'));
            $txt_ins_login_clave = form_password("txt_ins_login_clave", '', "id='txt_ins_login_clave' class='form-control' placeholder = 'Contraseña'  required='required'");
            ?>
            <div id="notificacion-error" class="alert-danger" style="display:none">
                <p>
                    Usuario no habilitado o error de contraseña
                </p>
            </div>
            <fieldset>
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo $txt_ins_login_user; ?>
                        <i class="icon-envelope"></i>
                    </span>
                </label>

                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo $txt_ins_login_clave; ?>
                        <i class="icon-lock"></i>
                    </span>
                </label>

                <div class="space"></div>

                <div class="clearfix">
                    <label class="inline">
                        <input type="checkbox" class="ace" />
                        <span class="lbl"> Recordar contraseña</span>
                    </label>

                    <button id="btn_ins_login" type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                        <i class="icon-key"></i>
                        Ingresar
                    </button>
                </div>

                <div class="space-4"></div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo validation_errors(); ?>
        </div><!-- /widget-main -->

        <div class="toolbar clearfix">
            <div>
                <a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
                    <i class="icon-arrow-left"></i>
                    ¿Olvidaste tu contraseña?
                </a>
            </div>
        </div>
    </div><!-- /widget-body -->
</div><!-- /login-box -->
<script type="text/javascript" src="<?php echo URL_JS; ?>login/jsAccesoIntranet.js"></script>