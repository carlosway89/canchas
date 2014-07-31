<?php
$atributosForm = array('id ' => 'frm_ins_permisos', 'name ' => 'frm_ins_permisos', 'class' => 'form-horizontal');
$hid_ins_usu_codigo = form_hidden("hid_ins_usu_codigo", $code_user, "hid_ins_usu_codigo", true);
?>

<div class="page-content">
    <div class="page-header">
        <h1>
            PERMISOS
            <small>
                <i class="icon-double-angle-right"></i>
                <?php echo strtoupper($nombreuser); ?>
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <?php echo form_open('', $atributosForm); ?>
            <?php echo $hid_ins_usu_codigo; ?>
            <?php
            $i = 1;
            $AplicacionAnterior = '';
            foreach ($Opciones as $Opciones) {
                if ($Opciones->nAplID != $AplicacionAnterior) {
                    ?>

                    <legend class="class_sub_legend"><i class="<?php echo $Opciones->cAplIcono; ?> icon-black"></i> MÓDULO DE <?php echo $Opciones->aplicacion; ?> </legend>

                <?php }
                ?>

                &nbsp;&nbsp;&nbsp;
                <input style="margin-top:-2px;" type="checkbox" name="<?php echo $Opciones->nOpcID; ?>"  id="<?php echo $Opciones->nOpcID; ?>"  <?php if ($Opciones->nUsuID > 0) echo "checked" ?>/>
                &nbsp;
                <?php echo $Opciones->opcion; ?>
                <br/>
                <?php
                $AplicacionAnterior = $Opciones->nAplID;
                $i++;
            }
            ?>

            <br />
            <center>
                <?php echo $hid_ins_usu_codigo; ?>
                <button class="btn btn-primary" id="btn_ins_permisos">
                    <i class="icon-ok bigger-110"></i>
                    Guardar permisos
                </button> <span id="sms_ins_permisos"></span>
            </center>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript" src='<?php echo URL_JS; ?>intranet/usuarios/jsPermisosUsers.js'></script>

