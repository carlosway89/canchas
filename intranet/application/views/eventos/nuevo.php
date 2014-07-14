  


<div class="page-content">
      <div class="page-header">
            <h1>
                  Nuevo Evento
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Crea y publica un nuevo evento
                  </small>
            </h1>
      </div><!-- /.page-header -->
      <div class="row">
            <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <?php   
                  $atributosForm = array('id ' => 'frm_nuevo_evento', "class" => 'form-horizontal');

                  echo form_open(current_url(), $atributosForm); ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Titulo del Evento </label>

                              <div class="col-sm-9">
                                    <input id="cEveTitulo" placeholder="Titulo" class="col-xs-10 col-sm-5" type="text" name="cEveTitulo" value="<?php echo set_value('cEveTitulo'); ?>"  />
                                    <?php echo form_error('cEveTitulo','<div>','</div>'); ?>                              
                              </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Direccion del Evento </label>

                              <div class="col-sm-9">
                                    <input id="cEveDireccion" type="text" placeholder="Direccion" class="col-xs-10 col-sm-5" name="cEveDireccion" value="<?php echo set_value('cEveDireccion'); ?>"  />
                                    <?php echo form_error('cEveDireccion','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion del Evento </label>

                              <div class="col-sm-9">
                                    <textarea id="cEveDescripcion" placeholder="Descripcion del evento" class="col-xs-10 col-sm-5" type="text" name="cEveDescripcion"><?php echo set_value('cEveDescripcion'); ?></textarea>
                                    <?php echo form_error('cEveDescripcion','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Link en facebook </label>

                              <div class="col-sm-9">
                                    <input id="cEveLinkFacebook" type="text" name="cEveLinkFacebook" class="col-xs-10 col-sm-5" placeholder="Evento en Facebook (opcional)" value="<?php echo set_value('cEveLinkFacebook'); ?>"  />
                                    <?php echo form_error('cEveLinkFacebook','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Fecha del Evento</label>

                              <div class="col-xs-10 col-sm-3">
                                    <div class="input-group">
                                          <input class="form-control date-picker " id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="dEveEndTime" value="<?php echo set_value('dEveEndTime'); ?>" />
                                          <span class="input-group-addon">
                                                <i class="icon-calendar bigger-110"></i>
                                          </span>
                                    </div>
                                    <?php echo form_error('dEveEndTime','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Foto del Evento </label>

                              <div class="col-xs-10 col-sm-3">
                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="cEveLinkFoto" value="<?php echo set_value('cEveLinkFoto'); ?>" />                      
                                    <?php echo form_error('cEveLinkFoto','<div>','</div>'); ?>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Costo del Evento S/. </label>

                              <div class="col-sm-9">
                                    <input class="input-mini" id="spinner-numero" type="text" placeholder="Costo del Evento"  name="nEveCosto" value="<?php echo set_value('nEveCosto'); ?>"  />
                                    <?php echo form_error('nEveCosto','<div>','</div>'); ?>
                              </div>
                        </div>
                         
                        <div class="hidden ">
                              <input id="nUsuario" type="hidden" name="nUsuario" value="1"  />
                               <input id="cEveEstado" type="hidden" name="cEveEstado" value="H"  />
                               <input id="dEveFechaRegistro" type="hidden" name="dEveFechaRegistro" value="<?=date('Y-m-d');?>"  />
                        </div>
                        
                        

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="button">
                                          <i class="icon-ok bigger-110"></i>
                                          Publicar
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                          <i class="icon-undo bigger-110"></i>
                                          Cancelar
                                    </button>
                              </div>
                        </div>
                  <?php echo form_close(); ?>
            </div>
      </div>


     
</div>




