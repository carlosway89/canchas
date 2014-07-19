<script src="<?php echo URL_JS; ?>intranet/canchas/jsCanchasQry.js"></script>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Listado de Canchas
        </div>
        <div class="table-responsive">
            <table id="TablaListCanchas" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Usuario</th>
                        <th class="hidden-480">Estado</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>    
                    <?php foreach ($list_canchas as $list_canchas) { ?>
                        <?php
                        
                        $text_cancha = substr($list_canchas->cCanDescripcion, 0, 120);
                        
                        if(strlen($text_cancha) >= 120){
                            $descripcion_cancha = $text_cancha."...";
                        }else{
                            $descripcion_cancha = $text_cancha;
                        }
                        
                        if ($list_canchas->cCanEstado == "Habilitado") {
                            $css_estado = "label-success";
                            $css_opcion = "red";
                        } else {
                            $css_estado = "label-danger";
                            $css_opcion = "green";
                        }
                        ?>
                        <tr>
                            <td><?php echo $list_canchas->cCanNombre; ?></td>
                            <td><?php echo $descripcion_cancha; ?></td>
                            <td class="hidden-480">
                                <span class="label label-sm <?php echo $css_estado; ?>">
                                    <?php echo $list_canchas->cCanEstado; ?>
                                </span>
                            </td>
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a data-rel="tooltip" data-original-title="Default" class="blue ver-permisos cursor_pointer" data-id = "<?php echo $list_canchas->nUsuID; ?>">
                                        <i class="icon-search bigger-130"></i>
                                    </a>
                                    
                                    <a data-rel="tooltip" data-original-title="Default" class="orange ver-permisos cursor_pointer" data-id = "<?php echo $list_canchas->nUsuID; ?>">
                                        <i class="icon-edit bigger-130"></i>
                                    </a>
                                    
                                    <a data-rel="tooltip" data-original-title="Default" class="purple ver-permisos cursor_pointer" data-id = "<?php echo $list_canchas->nUsuID; ?>">
                                        <i class="icon-picture bigger-130"></i>
                                    </a>

                                    <a data-rel="tooltip" data-original-title="Default" class="<?php echo $css_opcion; ?> cursor_pointer del-user" data-id = "<?php echo $list_canchas->nUsuID; ?>">
                                        <i class="icon-exchange  bigger-130"></i>
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
