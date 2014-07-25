  


<div class="page-content">
      <div class="page-header">
            <h1>
                  Nuevo Video
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Sube y publica un video
            </h1>
      </div><!-- /.page-header -->
      <div class="row">
            <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <?php   
                  $atributosForm = array('id ' => 'frm_nuevo_video', "class" => 'form-horizontal');

                  echo form_open('multimedia/guardar_video', $atributosForm); ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Titulo del video </label>

                              <div class="col-sm-9">
                                    <input placeholder="Titulo" class="col-xs-10 col-sm-5" id="cMultTitulo" type="text" name="cMultTitulo" value="<?php echo set_value('cMultTitulo'); ?>"  />
                                    <?php echo form_error('cMultTitulo','<div class="col-md-12 text-warning">','</div>'); ?>                              
                              </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion del video </label>

                              <div class="col-sm-9">
                                    <input  placeholder="Descripcion" class="col-xs-10 col-sm-5" id="cMultDescripcion" type="text" name="cMultDescripcion" value="<?php echo set_value('cMultDescripcion'); ?>"  />      
                                    <?php echo form_error('cMultDescripcion','<div class="col-md-12 text-warning">','</div>'); ?>
                                    
                              </div>
                        </div>
                        <div class="space-4"></div>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> insertar link del video </label>
                              <div class="col-xs-10 col-sm-3">
                                    <input type="url"  class="form-control" name="cMultLink" placeholder="link del video youtube o vimeo"  /> 
                              </div>
                        </div>

                        
                        <div class="hidden ">
                              <input id="nMultiTipoID" type="hidden" name="nMultiTipoID" value="2"  />
                              <input id="cMultiEstado" type="hidden" name="cMultiEstado" value="H"  />
                              <input id="nMultCategID" type="hidden" name="nMultCategID" value="4"  />
                               <input id="cMultNumVisitas" type="hidden" name="cMultNumVisitas" value="0"  />
                        </div>
                        
                        

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit" name="submit">
                                          <i class="icon-ok bigger-110"></i>
                                          Publicar
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <a href="<?=URL_MAIN?>multimedia/videos" class="btn">
                                          <i class="icon-undo bigger-110"></i>
                                          Cancelar
                                    </a>
                              </div>
                        </div>
                  <?php echo form_close(); ?>
            </div>
      </div>


     
</div>





