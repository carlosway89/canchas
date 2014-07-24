<!-- POPUP DE CONFIRMACIÓN EXITOSA DE RECUPERACIÓN DE CLAVE -->
<div role="dialog" tabindex="-1" class="bootbox modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="bootbox-close-button close close_popup" type="button">×</button>
                <h4 class="modal-title">Confirmación</h4>
            </div>
            <div class="modal-body">
                <div class="bootbox-body">
                    <span class="bigger-110">
                        Estimado Usuario, se le ha enviado un mensaje a su correo electrónico <span id="email_ingresado"></span> donde se especifica su nueva clave para acceder a la Intranet.
                        <br /><br />

                        <center>
                            <a target="_blank" href="http://www.hotmail.com"><img class="loco" src="<?php echo URL_IMG ?>icon-hotmail.png" /></a> 
                            <a target="_blank" href="http://www.outlook.com"><img class="loco" src="<?php echo URL_IMG ?>icon-outlook.png" /></a> 
                        </center>

                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary close_popup" type="button" data-bb-handler="click">
                    <i class="icon-check"></i>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>

