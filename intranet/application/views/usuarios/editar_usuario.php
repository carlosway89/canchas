<div class="page-content">
    <div class="page-header">
        <h1>
            Actualizar Datos
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <?php
            $atributosForm = array('id ' => 'frm_upd_usuarios', 'name ' => 'frm_upd_usuarios', "class" => 'form-horizontal');
            $txt_upd_user_nombres = form_input(array('value' => $NombresUser, 'name' => 'txt_upd_user_nombres', 'id' => 'txt_upd_user_nombres', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
            $txt_upd_user_apellidos = form_input(array('value' => $ApellidosUser, 'name' => 'txt_upd_user_apellidos', 'id' => 'txt_upd_user_apellidos', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
            $txt_upd_user_email = form_input(array('value' => $EmailUser, 'name' => 'txt_upd_user_email', 'id' => 'txt_upd_user_email', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
            ?>

            <?php echo form_open('usuarios/usuariosUpd/' . $nPerID, $atributosForm); ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_user_nombres"> Nombres </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_user_nombres; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_user_apellidos"> Apellidos </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_user_apellidos; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_user_email"> Email </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_user_email; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <span id="sms_upd_user_edit"></span>
                    <button class="btn btn-info" id="btn_upd_user_edit" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        Guardar cambios
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" id="btn_upd_user_cancel" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        Cancelar
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <?php echo validation_errors(); ?>

            <!-- POPUP MENSAJE EXITO DE ACTUALIZACIÓN DE DATOS -->
            <div id="dialog-upd-user" class="hide">
                <p>
                    Sus datos han sido actualizados correctamente, por favor vuelva autenticarse para ver los cambios.
                </p>
            </div><!-- #dialog-message -->

            <script type="text/javascript" src="<?php echo URL_JS; ?>intranet/usuarios/jsUsuariosUpd.js"></script>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->