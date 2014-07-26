<?php
$atributosForm = array('id ' => 'frm_upd_canchas', 'name ' => 'frm_upd_canchas', "class" => 'form-horizontal');
$txt_upd_can_nombre = form_input(array('value' => $cCanNombre ,'name' => 'txt_upd_can_nombre', 'id' => 'txt_upd_can_nombre', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100', "required" => "required"));
$txt_upd_can_foto = form_input(array('value' => $cCanFotoPortada , 'name' => 'txt_upd_can_foto', 'id' => 'txt_upd_can_foto', 'class' => 'col-xs-10 col-sm-5', 'style' => 'display:none'));
$txt_upd_can_descripcion = form_textarea(array('value' => $cCanDescripcion ,'name' => 'txt_upd_can_descripcion', 'id' => 'txt_upd_can_descripcion', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '500', 'rows' => 2, "required" => "required"));
$txt_upd_can_direccion = form_input(array('value' => $cCanDireccion ,'name' => 'txt_upd_can_direccion', 'id' => 'txt_upd_can_direccion', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '200', "required" => "required"));
$txt_upd_can_telefono = form_input(array('value' => $cCanTelefono ,'name' => 'txt_upd_can_telefono', 'id' => 'txt_upd_can_telefono', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '20', "required" => "required"));
$txt_upd_can_facebook = form_input(array('value' => $cCanFacebook ,'name' => 'txt_upd_can_facebook', 'id' => 'txt_upd_can_facebook', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));
$txt_upd_can_email = form_input(array('value' => $cCanEmail ,'name' => 'txt_upd_can_email', 'id' => 'txt_upd_can_email', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100', "required" => "required"));
$txt_upd_can_web = form_input(array('value' => $cCanSitioWeb , 'name' => 'txt_upd_can_web', 'id' => 'txt_upd_can_web', 'class' => 'col-xs-10 col-sm-5', 'maxlength' => '100'));


/* Generar el combo de Departamentos */
$cbo_upd_can_departamentos[''] = "Seleccionar Departamento";
foreach ($list_departamentos as $list_departamentos) {
    $cbo_upd_can_departamentos[$list_departamentos->nUbiID] = ucwords(strtolower($list_departamentos->cUbiDescripcion));
}

/* Generar el combo de Provincias */
$cbo_upd_can_provincias[''] = "Seleccionar Provincia";

/* Generar el combo de Distritos */
$cbo_upd_can_distritos[''] = "Seleccionar Distrito";
?>

<div class="page-content">
    <div class="page-header">
        <h1>
            Editar datos de la Cancha
            <small>
                <i class="icon-double-angle-right"></i>
                <?php echo $cCanNombre; ?>
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <?php echo form_open('canchas/canchasIns', $atributosForm); ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_nombre"> Nombre </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_can_nombre; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_descripcion"> Descripción </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_can_descripcion; ?>
                </div>
            </div>

            <div class="space-4"></div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Foto de la cancha </label>

                <div class="col-xs-10 col-sm-4">
                    <?= $txt_upd_can_foto; ?>
                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="userfile" required="required" />
                    <div id="image_uploaded" class="text-center" style="display:none">
                        <img src="" class="img_up">
                    </div>
                    <div id="loader_image" class="text-center" style="display:none">
                        <img src="<?= URL_IMG ?>/cargando.gif" class="img_loader"><br>
                        Subiendo....
                    </div>
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Ubicación </label>

                <div class="col-sm-4">
                    <div class="input-group">
                        <input id="txt_upd_can_ubicacion" type="text" placeholder="Latitud y Longitud" class="form-control" name="txt_upd_can_ubicacion" />
                        <span class="input-group-btn">
                            <button id="pasar" class="btn btn-sm btn-default" type="button">
                                Buscar en el mapa
                            </button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right">&nbsp;</label>

                <div class="col-sm-9">
                    <h6 class="text-info">Arrastre la flecha para ubicar su evento</h6>
                    <div id="mapa_canchas" class="col-xs-10 col-sm-5" style="height: 250px;"></div>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cbo_upd_can_departamentos"> Departamento </label>

                <div class="col-sm-9">
                    <?php echo form_dropdown('cbo_upd_can_departamentos', $cbo_upd_can_departamentos, '', 'id="cbo_upd_can_departamentos" required = "required" class="col-sm-3"'); ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cbo_upd_can_provincias"> Provincia </label>

                <div class="col-sm-9">
                    <div id="cont_upd_can_provincias">
                        <?php echo form_dropdown('cbo_upd_can_provincias', $cbo_upd_can_provincias, '', 'id="cbo_upd_can_provincias" required = "required" class="col-sm-3"'); ?>
                    </div>
                </div>
            </div>

            <div class="space-4"></div>
           
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cbo_upd_can_distritos"> Distrito </label>

                <div class="col-sm-9">
                    <div id="cont_upd_can_distritos">
                        <?php echo form_dropdown('cbo_upd_can_distritos', $cbo_upd_can_distritos, '', 'id="cbo_upd_can_distritos" required = "required" class="col-sm-3"'); ?>
                    </div>
                </div>
            </div>

            <div class="space-4"></div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_direccion"> Dirección </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_can_direccion; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_email"> Email </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_can_email; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_web"> Dirección Web </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_can_web; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_facebook"> Facebook </label>

                <div class="col-sm-9">
                    <?php echo $txt_upd_can_facebook; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_telefono"> Teléfono </label>

                <div class="col-sm-5">
                    <?php echo $txt_upd_can_telefono; ?>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="txt_upd_can_nrocanchas"> Nro de Canchas </label>

                <div class="col-sm-9">
                    <input class="input-mini" id="txt_upd_can_nrocanchas" type="text" placeholder="Nro de Canchas" required="required" value="<?= $nCanNroCanchas; ?>"  name="txt_upd_can_nrocanchas" />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <input id="hid_upd_can_latitud" type="hidden" name="hid_upd_can_latitud" value="" />
                    <input id="hid_upd_can_longitud" type="hidden" name="hid_upd_can_longitud"  value="" />


                    <span id="sms_upd_can_add"></span>
                    <button class="btn btn-info" id="btn_upd_can_add" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        Guardar datos
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" id="btn_upd_can_cancel" type="reset">
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
<style type="text/css">
  .img_loader{
    height: 50px;
  }
  .img_up{
    height: 150px;
    width: 150px;

  }
</style>
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/canchas/jsCanchasUpd.js"></script>

