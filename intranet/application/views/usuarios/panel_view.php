<script src="<?php echo URL_JS; ?>intranet/usuarios/jsUsuarios.js"></script>

<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="tabbable">
                <ul id="tab_mod_users" class="nav nav-tabs">
                    <li class="active">
                        <a href="#registrar" id="tab_user_registrar" data-toggle="tab">
                            <i class="blue icon-plus-sign bigger-110"></i>
                            Registrar
                        </a>
                    </li>

                    <li>
                        <a href="#listar" id="tab_user_listar" data-toggle="tab">
                            <i class="red icon-list bigger-110"></i>
                            Listado
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane in active" id="registrar">
                        <?php $this->load->view("usuarios/ins_view"); ?>
                    </div>

                    <div class="tab-pane" id="listar">
                        <div id="cont_div_qry_usuarios"></div>

                        <!-- Contenedor de Resultado de permisos al seleccionar un usuario -->
                        <div id="cont_content_permisos" class="switchs">
                            <a href="#" id="anc_back">
                                <span><img src="<?php echo URL_IMG ?>iconos_regresar.png"></span>
                            </a>
                            <div id="cont_div_qry_permisos"></div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- END PAGE CONTENT BEGINS -->
        </div>
    </div>
</div>




