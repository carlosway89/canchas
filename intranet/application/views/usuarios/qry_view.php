<script src="<?php echo URL_JS; ?>intranet/usuarios/jsUsuariosQry.js"></script>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Listado de Usuarios
        </div>
        <div class="table-responsive">
            <table id="TablaListUsuarios" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Usuario</th>
                        <th class="hidden-480">Estado</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>    
                    <?php foreach ($list_usuarios as $list_usuarios) { ?>
                        <?php
                        if ($list_usuarios->cUsuEstado == "Habilitado") {
                            $css_estado = "label-success";
                        } else {
                            $css_estado = "label-danger";
                        }
                        ?>
                        <tr>
                            <td><?php echo $list_usuarios->cPerNombres; ?></td>
                            <td><?php echo $list_usuarios->cUsuNick; ?></td>
                            <td class="hidden-480">
                                <span class="label label-sm <?php echo $css_estado; ?>">
                                    <?php echo $list_usuarios->cUsuEstado; ?>
                                </span>
                            </td>
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
<!--                                    <a data-rel="tooltip" data-original-title="Default" class="blue tooltip-info cursor_pointer" data-id = "<?php echo $list_usuarios->nUsuID; ?>">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>-->

                                    <a data-rel="tooltip" data-original-title="Default" class="green ver-permisos cursor_pointer" data-id = "<?php echo $list_usuarios->nUsuID; ?>">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a data-rel="tooltip" data-original-title="Default" class="red cursor_pointer del-user" data-id = "<?php echo $list_usuarios->nUsuID; ?>">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
