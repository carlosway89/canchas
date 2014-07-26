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
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th class="hidden-480">Estado</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>    
                    <?php foreach ($list_canchas as $list_canchas) { ?>
                        <?php
                       
                        if ($list_canchas->cCanEstado == "Habilitado") {
                            $css_estado = "label-success";
                            $css_opcion = "red";
                        } else {
                            $css_estado = "label-danger";
                            $css_opcion = "green";
                        }
                        ?>
                        <tr>
                            <td style="text-align: center;">
                                <img width="100" height="70" src="<?php echo $list_canchas->cCanFotoPortada; ?>" />
<!--                                <img width="100" height="70" src="<?php echo URL_PORTAL ?>img/img-demo-canchas/<?php echo $list_canchas->cCanFotoPortada; ?>" />-->
                            </td>
                            <td><?php echo $list_canchas->cCanNombre; ?></td>
                            <td style="width: 50%;text-align: justify;"><?php echo $list_canchas->cCanDescripcion; ?></td>
                            <td class="hidden-480">
                                <span class="label label-sm <?php echo $css_estado; ?>">
                                    <?php echo $list_canchas->cCanEstado; ?>
                                </span>
                            </td>
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a data-rel="tooltip" data-original-title="Default" class="blue ver-cancha cursor_pointer" data-id = "<?php echo $list_canchas->nCanID; ?>">
                                        <i class="icon-search bigger-130"></i>
                                    </a>
                                    
                                    <a data-rel="tooltip" data-original-title="Default" class="orange edit-cancha cursor_pointer" data-id = "<?php echo $list_canchas->nCanID; ?>">
                                        <i class="icon-edit bigger-130"></i>
                                    </a>
                                    
                                    <a data-rel="tooltip" data-original-title="Default" class="purple subir-foto cursor_pointer" data-id = "<?php echo $list_canchas->nCanID; ?>">
                                        <i class="icon-picture bigger-130"></i>
                                    </a>

                                    <a data-rel="tooltip" data-original-title="Default" class="<?php echo $css_opcion; ?> cursor_pointer del-cancha" data-id = "<?php echo $list_canchas->nCanID; ?>">
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
