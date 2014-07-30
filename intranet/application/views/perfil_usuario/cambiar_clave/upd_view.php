<?php
$atributos = array('id' => 'frm_upd_clave', 'name' => 'frm_upd_clave', 'class' => 'form-horizontal');
$usuID = $this->session->userdata('nUsuID');

$txt_upd_clave_anterior = array('name' => 'txt_upd_clave_anterior', 'id' => 'txt_upd_clave_anterior', 'maxlength' => '20', 'class' => 'col-xs-10 col-sm-4', 'required' => 'required');
$txt_upd_clave_nueva = array('name' => 'txt_upd_clave_nueva', 'id' => 'txt_upd_clave_nueva', 'maxlength' => '20', 'class' => 'col-xs-10 col-sm-4', 'required' => 'required');
$txt_upd_clave_repeat = array('name' => 'txt_upd_clave_repeat', 'id' => 'txt_upd_clave_repeat', 'maxlength' => '20', 'class' => 'col-xs-10 col-sm-4', 'required' => 'required');
?>
<div id="c_result_search_clave_anterior"></div>
<?php echo form_open('cambiar_clave/claveUserUpd/' . $usuID, $atributos); ?>
<div class="form-group">
    <label class="col-sm-4 control-label no-padding-right" for="txt_upd_clave_anterior"> Clave anterior </label>

    <div class="col-sm-8">
        <?php echo form_password($txt_upd_clave_anterior); ?>
        <span id="preload"></span>
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-4 control-label no-padding-right" for="txt_upd_clave_nueva"> Clave nueva </label>

    <div class="col-sm-8">
        <?php echo form_password($txt_upd_clave_nueva); ?>
        <div id="pswd_info_clave">
            <h4><b>Seguridad: </b><span id="fuerza_contraseña" class="fuerza_contraseña"></span></h4> 
        </div>
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-4 control-label no-padding-right" for="txt_upd_clave_repeat"> Confirmar clave </label>

    <div class="col-sm-8">
        <?php echo form_password($txt_upd_clave_repeat); ?>
    </div>
</div>

<div class="space-4"></div>

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <span id="sms_upd_claveuser"></span>
        <button class="btn btn-info" id="btn_upd_clave" type="submit">
            <i class="icon-ok bigger-110"></i>
            Guardar cambios
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" id="btn_upd_clave_cancel" type="reset">
            <i class="icon-undo bigger-110"></i>
            Cancelar
        </button>
    </div>
</div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>

<!-- POPUP MENSAJE EXITO DE ACTUALIZACIÓN DE CONTRASEÑA -->
<div id="dialog-upd-clave" class="hide">
    <p>
        Su contraseña ha sido actualizada correctamente, por favor vuelva autenticarse para ver los cambios.
    </p>
</div><!-- #dialog-message -->

<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/perfil_usuario/cambiar_clave/jsClaveUserUpd.js"></script>
