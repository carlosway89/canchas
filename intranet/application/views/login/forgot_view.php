<div id="forgot-box" class="forgot-box widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header red lighter bigger">
                <i class="icon-key"></i>
                Recuperar Contraseña
            </h4>

            <div class="space-6"></div>
            <p>
                Ingrese su correo electrónico
            </p>

            <?php
            $atributosForm = array('id' => 'frm_upd_recu_clave', 'name' => 'frm_upd_recu_clave');
            echo form_open('acceso/recuperar_clave', $atributosForm);
            $txt_upd_recu_clave = array('name' => 'txt_upd_recu_clave', 'id' => 'txt_upd_recu_clave', 'class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required' => 'required');
            ?>
            <fieldset>
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo form_input($txt_upd_recu_clave); ?>
                        <i class="icon-envelope"></i>
                    </span>
                </label>

                <div class="clearfix">
                    <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
                        <i class="icon-lightbulb"></i>
                        Enviar
                    </button>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo validation_errors(); ?>
        </div><!-- /widget-main -->

        <div class="toolbar center">
            <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                Regresar
                <i class="icon-arrow-right"></i>
            </a>
        </div>
    </div><!-- /widget-body -->
</div><!-- /forgot-box -->
<script type="text/javascript" src='<?php echo URL_JS; ?>login/jsRecuperarClave.js'></script>