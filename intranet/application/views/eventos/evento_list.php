<script src="<?php echo URL_JS; ?>intranet/eventos/jsEventosList.js"></script>
<div class="page-content">
    <div class="page-header">
        <h1>
            Eventos
            <small>
                <i class="icon-double-angle-right"></i>
                Todos tus evento
            </small>
        </h1>

    </div><!-- /.page-header -->

    <div class="pull-left">
        <div class="col-xs-12">
            <a class="btn btn-app btn-success btn-xs" href="<?= URL_MAIN ?>eventos/add">
                <i class="glyphicon glyphicon-plus "></i> Evento   			
            </a>

        </div>
        <hr>
        <br><br>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="TablaListEventos" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>

                        <th>Titulo</th>
                        <th class="hidden-480">Descripcion</th>
                        <th >
                            <i class="icon-time bigger-110 hidden-480"></i>
                            Fecha Evento
                        </th>

                        <th>

                            Costo (S/.)
                        </th>
                        <th class="hidden-480">Direccion</th>

                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < count($list_eventos); $i++) {
                        ?>
                        <tr>

                            <td>
                                <a href="<?= URL_PORTAL ?>eventos/mostrar/<?= $list_eventos[$i]['nEveID']; ?>" target="_blank"> <?= $list_eventos[$i]['cEveTitulo']; ?></a>
                            </td>
                            <td class="hidden-480"><?php echo substr($list_eventos[$i]['cEveDescripcion'], 0, 40) . '...'; ?></td>
                            <td ><?= date("d-m-Y", strtotime($list_eventos[$i]['dEveStartTime'])); ?></td>
                            <td><?= $list_eventos[$i]['nEveCosto']; ?></td>

                            <td class="hidden-480">
                                <?= $list_eventos[$i]['cEveDireccion']; ?>
                            </td>

                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">

                                    <a class="green" href="<?= URL_MAIN ?>eventos/edit/<?= $list_eventos[$i]['nEveID']; ?>">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#" onClick="return deletechecked('<?= URL_MAIN ?>eventos/delete/<?= $list_eventos[$i]['nEveID']; ?>');" >
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">

                                            <li>
                                                <a href="<?= URL_MAIN ?>eventos/edit/<?= $list_eventos[$i]['nEveID']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" onClick="return deletechecked('<?= URL_MAIN ?>eventos/delete/<?= $list_eventos[$i][nEveID]; ?>');" class="tooltip-error" data-rel="tooltip" title="Delete">
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
