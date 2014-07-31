<?php
$atributosForm = array('id ' => 'frm_ins_usuarios', 'name ' => 'frm_ins_usuarios', "class" => 'form-horizontal');
$txt_ins_user_nombres = form_input(array('name' => 'txt_ins_user_nombres', 'id' => 'txt_ins_user_nombres', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_ins_user_apellidos = form_input(array('name' => 'txt_ins_user_apellidos', 'id' => 'txt_ins_user_apellidos', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_ins_user_email = form_input(array('name' => 'txt_ins_user_email', 'id' => 'txt_ins_user_email', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_ins_user_clave = form_input(array('name' => 'txt_ins_user_clave','type'=>'password', 'id' => 'txt_ins_user_clave', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_ins_user_repeclave = form_input(array('name' => 'txt_ins_user_repeclave','type'=>'password', 'id' => 'txt_ins_user_repeclave', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
?>

<div class="page-content">
    <div class="page-header">
        <h1>
            Nuevo Usuario
            <small>
                <i class="icon-double-angle-right"></i>
                Registrar los datos del nuevo usuario
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <?php echo form_open('usuarios/usuariosIns', $atributosForm); ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_user_nombres"> Nombres </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_user_nombres; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_user_apellidos"> Apellidos </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_user_apellidos; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_user_email"> Email </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_user_email; ?>
                </div>
            </div>

            <div class="space-4"></div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_user_clave"> Contraseña </label>

                <div class="col-sm-6">
                    <?php echo $txt_ins_user_clave; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_user_repeclave"> Confirmar contraseña </label>

                <div class="col-sm-6">
                    <?php echo $txt_ins_user_repeclave; ?>
                </div>
            </div>

            <div class="space-4"></div>



            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <span id="sms_ins_user_add"></span>
                    <button class="btn btn-info" id="btn_ins_user_add" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        Guardar datos
                    </button>
                    
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" id="btn_ins_user_cancel" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        Cancelar
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <?php echo validation_errors(); ?>
        </div>
    </div>
</div>

<!-- POPUP DE CONFIRMACIÓN DE REGISTRO DE USUARIOS -->
<div role="dialog" tabindex="-1" id="pop_reg_user" class="bootbox modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="bootbox-close-button close close_popup" type="button">×</button>
                <h4 class="modal-title">Confirmación</h4>
            </div>
            <div class="modal-body">
                <div class="bootbox-body">
                    <span class="bigger-110">
                        El usuario ha sido registrado correctamente.
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary close_popup" type="button" data-bb-handler="click">
                    <i class="icon-check"></i>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/usuarios/jsUsuariosIns.js"></script>

