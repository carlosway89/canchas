<?php
$atributosForm = array('id ' => 'frm_ins_permisos', 'name ' => 'frm_ins_permisos', 'class' => 'form-horizontal');
$hid_ins_usu_codigo = form_hidden("hid_ins_usu_codigo", $code_user, "hid_ins_usu_codigo", true);
$btn_grb_permisos = form_button('btn_ins_permisos', 'Guardar permisos', 'id="btn_ins_permisos" class="btn btn-primary"');
?>

<div class="page-content">
    <div class="page-header">
        <h1>
            PERMISOS
            <small>
                <i class="icon-double-angle-right"></i>
                LUIGGI CHIRINOS PLASENCIA
<!--                 <h3>PERMISOS ► <?php echo strtoupper("luiggi"); ?></h3>-->
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <?php echo form_open('', $atributosForm); ?>
            <?php echo $hid_ins_usu_codigo; ?>
            <?php
            $i = 1;
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
            <center><?php echo $btn_grb_permisos; ?> <span id="sms_ins_permisos"></span></center>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>




<!--<script type="text/javascript" src='<?php echo URL_JS; ?>admin/mantenedores/permisos/jsPermisos_<?php echo $this->uri->segment(1); ?>.js'></script> -->

