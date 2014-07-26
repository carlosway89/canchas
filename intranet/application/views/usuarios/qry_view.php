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
                            $css_opcion = "red";
                        } else {
                            $css_estado = "label-danger";
                            $css_opcion = "green";
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
                                    <a data-rel="tooltip" data-original-title="Default" class="blue ver-permisos cursor_pointer" data-id = "<?php echo $list_usuarios->nUsuID; ?>">
                                        <i class="icon-external-link bigger-130"></i>
                                    </a>

                                    <a data-rel="tooltip" data-original-title="Default" class="<?php echo $css_opcion; ?> cursor_pointer del-user" data-id = "<?php echo $list_usuarios->nUsuID; ?>">
                                        <i class="icon-exchange  bigger-130"></i>
                                    </a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                    <span class="blue">
                                                        <i class="icon-zoom-in bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                    <span class="red">
                                                        <i class="icon-trash bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
