  


<div class="page-content">
      <div class="page-header">
            <h1>
                  Nueva Foto
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Sube y publica una Foto
                  </small>
            </h1>
      </div><!-- /.page-header -->
      <div class="row">
            <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <?php   
                  $atributosForm = array('id ' => 'frm_nueva_foto', "class" => 'form-horizontal');

                  echo form_open_multipart('multimedia/guardar_foto', $atributosForm); ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Titulo de la Foto </label>

                              <div class="col-sm-9">
                                    <input placeholder="Titulo" class="col-xs-10 col-sm-5" id="cMultTitulo" type="text" name="cMultTitulo" value="<?php echo set_value('cMultTitulo'); ?>"  />
                                    <?php echo form_error('cMultTitulo','<div class="col-md-12 text-warning">','</div>'); ?>                              
                              </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion de la Foto </label>

                              <div class="col-sm-9">
                                    <input  placeholder="Descripcion" class="col-xs-10 col-sm-5" id="cMultDescripcion" type="text" name="cMultDescripcion" value="<?php echo set_value('cMultDescripcion'); ?>"  />      
                                    <?php echo form_error('cMultDescripcion','<div class="col-md-12 text-warning">','</div>'); ?>
                                    
                              </div>
                        </div>
                        <div class="space-4"></div>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Selecionar Foto </label>
                              <div class="col-xs-10 col-sm-3">
                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="userfile"  /> 
                              </div>
                        </div>

                        
                        <div class="hidden ">
                              <input id="nMultiTipoID" type="hidden" name="nMultiTipoID" value="1"  />
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
                                    <a href="<?=URL_MAIN?>multimedia/fotos" class="btn">
                                          <i class="icon-undo bigger-110"></i>
                                          Cancelar
                                    </a>
                              </div>
                        </div>
                  <?php echo form_close(); ?>
            </div>
      </div>


     
</div>

<script type="text/javascript">

      if (document.addEventListener) {
         document.addEventListener("DOMContentLoaded", loadScripts, false);
      }

      
      function loadScripts() {          

            $('#id-input-file-1 , #id-input-file-2').ace_file_input({
              no_file:'Ningun Archivo Seleccionado ...',
              btn_choose:'Elegir',
              btn_change:'Cambiar',
              droppable:false,
              onchange:null,
              thumbnail:false, //| true | large
              whitelist:'gif|png|jpg|jpeg',
              blacklist:'exe|php|html'
              //onchange:''
              //
            });

      }  

</script>



