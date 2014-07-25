<?php
$atributosForm = array('id ' => 'frm_ins_canchas', 'name ' => 'frm_ins_canchas', "class" => 'form-horizontal');
$txt_ins_can_nombre = form_input(array('name' => 'txt_ins_can_nombre', 'id' => 'txt_ins_can_nombre', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_ins_can_descripcion = form_textarea(array('name' => 'txt_ins_can_descripcion', 'id' => 'txt_ins_can_descripcion', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '500', 'rows' => 2));
$txt_ins_can_direccion = form_input(array('name' => 'txt_ins_can_direccion', 'id' => 'txt_ins_can_direccion', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '200'));
$txt_ins_can_telefono = form_input(array('name' => 'txt_ins_can_telefono', 'id' => 'txt_ins_can_telefono', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '20'));
$txt_ins_can_facebook = form_input(array('name' => 'txt_ins_can_facebook', 'id' => 'txt_ins_can_facebook', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_ins_can_email = form_input(array('name' => 'txt_ins_can_email', 'id' => 'txt_ins_can_email', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_ins_can_web = form_input(array('name' => 'txt_ins_can_web', 'id' => 'txt_ins_can_web', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));


/* Generar el combo de Departamentos */
$cbo_ins_can_departamentos[''] = "Seleccionar Departamento";
foreach ($list_departamentos as $list_departamentos) {
    $cbo_ins_can_departamentos[$list_departamentos->nUbiID] = ucwords(strtolower($list_departamentos->cUbiDescripcion));
}

/* Generar el combo de Provincias */
$cbo_ins_can_provincias[''] = "Seleccionar Provincia";

/* Generar el combo de Distritos */
$cbo_ins_can_distritos[''] = "Seleccionar Distrito";
?>

<div class="page-content">
    <div class="page-header">
        <h1>
            Nueva Cancha
            <small>
                <i class="icon-double-angle-right"></i>
                Registrar los datos de la nueva cancha
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <?php echo form_open('canchas/canchasIns', $atributosForm); ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_nombre"> Nombre </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_can_nombre; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_descripcion"> Descripción </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_can_descripcion; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cbo_ins_can_departamentos"> Departamento </label>

                <div class="col-sm-9">
                        <?php echo form_dropdown('cbo_ins_can_departamentos', $cbo_ins_can_departamentos, '', 'id="cbo_ins_can_departamentos" class="col-sm-3"'); ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cbo_ins_can_provincias"> Provincia </label>

                <div class="col-sm-9">
                    <div id="cont_ins_can_provincias">
                        <?php echo form_dropdown('cbo_ins_can_provincias', $cbo_ins_can_provincias, '', 'id="cbo_ins_can_provincias" class="col-sm-3"'); ?>
                    </div>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cbo_ins_can_distritos"> Distrito </label>

                <div class="col-sm-9">
                    <div id="cont_ins_can_distritos">
                        <?php echo form_dropdown('cbo_ins_can_distritos', $cbo_ins_can_distritos, '', 'id="cbo_ins_can_distritos" class="col-sm-3"'); ?>
                    </div>
                </div>
            </div>

            <div class="space-4"></div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_direccion"> Dirección </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_can_direccion; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_email"> Email </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_can_email; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_web"> Dirección Web </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_can_web; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_facebook"> Facebook </label>

                <div class="col-sm-9">
                    <?php echo $txt_ins_can_facebook; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_telefono"> Teléfono </label>

                <div class="col-sm-5">
                    <?php echo $txt_ins_can_telefono; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_ins_can_nrocanchas"> Nro de Canchas </label>

                <div class="col-sm-9">
                    <input class="input-mini" id="txt_ins_can_nrocanchas" type="text" placeholder="Nro de Canchas"  name="txt_ins_can_nrocanchas" />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <span id="sms_ins_can_add"></span>
                    <button class="btn btn-info" id="btn_ins_can_add" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        Guardar datos
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" id="btn_ins_can_cancel" type="reset">
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

<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/canchas/jsCanchasIns.js"></script>

