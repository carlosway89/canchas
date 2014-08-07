<script src="<?php echo URL_JS; ?>intranet/canchas/jsCanchas.js"></script>

<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="tabbable">
                <ul id="tab_mod_canchas" class="nav nav-tabs">
                    <li class="active">
                        <a href="#listar" id="tab_cancha_listar" data-toggle="tab">
                            <i class="red icon-list bigger-110"></i>
                            Canchas
                        </a>
                    </li>
                    <li >
                        <a href="#registrar" id="tab_cancha_registrar" data-toggle="tab">
                            <i class="blue icon-plus-sign bigger-110"></i>
                            Registrar una Cancha
                        </a>
                    </li>

                    
                </ul>

                <div class="tab-content">
                    <div class="tab-pane " id="registrar">
                        <?php $this->load->view("canchas/ins_view"); ?>
                    </div>

                    <div class="tab-pane in active" id="listar">
                        <div id="cont_div_qry_canchas"></div>
                        
                        <!-- Contenedor de formulario para editar canchas -->
                        <div id="cont_content_edit_canchas" class="switchs">
                            <a href="#" id="anc_back">
                                <span><img src="<?php echo URL_IMG ?>iconos_regresar.png"></span>
                            </a>
                            <div id="cont_div_form_edit_canchas"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END PAGE CONTENT BEGINS -->
        </div>
    </div>
</div>




