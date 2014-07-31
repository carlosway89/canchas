<?php
$atributosForm = array('id ' => 'frm_fnd_canchas', 'name ' => 'frm_fnd_canchas');
$txt_fnd_cancha_nombre = form_input(array('name' => 'txt_fnd_cancha_nombre', 'id' => 'txt_fnd_cancha_nombre', 'placeholder' => 'Nombre de la cancha', 'maxlength' => '100'));

/* Generar el combo de Departamentos */
$cbo_fnd_cancha_departamentos[''] = "Seleccionar Departamento";
foreach ($list_departamentos as $list_departamentos) {
    $cbo_fnd_cancha_departamentos[$list_departamentos->nUbiID] = ucwords(strtolower($list_departamentos->cUbiDescripcion));
}

/* Generar el combo de Provincias */
$cbo_fnd_cancha_provincias[''] = "Seleccionar Provincia";

/* Generar el combo de Distritos */
$cbo_fnd_cancha_distritos[''] = "Seleccionar Distrito";

$btn_fnd_canchas = form_button('btn_fnd_canchas', 'BUSCAR', 'id="btn_fnd_canchas" class="button donate2 btn_submit"');
?>

<?php echo form_open('', $atributosForm); ?>
<?php echo $txt_fnd_cancha_nombre; ?>
<div>
    <?php echo form_dropdown('cbo_fnd_cancha_departamentos', $cbo_fnd_cancha_departamentos, '', 'id="cbo_fnd_cancha_departamentos" class="margin-bottom-control"'); ?>
</div>
<div id="cont_fnd_cancha_provincias">
    <?php echo form_dropdown('cbo_fnd_cancha_provincias', $cbo_fnd_cancha_provincias, '', 'id="cbo_fnd_cancha_provincias" class="margin-bottom-control"'); ?>
</div>
<div id="cont_fnd_cancha_distritos">
    <?php echo form_dropdown('cbo_fnd_cancha_distritos', $cbo_fnd_cancha_distritos, '', 'id="cbo_fnd_cancha_distritos" class="margin-bottom-control"'); ?>
</div>
<?php echo $btn_fnd_canchas; ?>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>

<script type="text/javascript" src="<?php echo URL_JS; ?>jsBuscarCanchas.js"></script>