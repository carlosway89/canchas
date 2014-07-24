  


<div class="page-content">
      <div class="page-header">
            <h1>
                  Nueva Noticia
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Crea y publica una noticia
                  </small>
            </h1>
      </div><!-- /.page-header -->
      <div class="row">
            <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <?php   
                  $atributosForm = array('id ' => 'frm_nueva_noticia', "class" => 'form-horizontal');

                  echo form_open('multimedia/guardar_noticia', $atributosForm); ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Titulo de la Notcia </label>

                              <div class="col-sm-9">
                                    <input placeholder="Titulo" class="col-xs-10 col-sm-5" id="cInfoTitulo" type="text" name="cInfoTitulo" value="<?php echo set_value('cInfoTitulo'); ?>" required />
                                    <?php echo form_error('cInfoTitulo','<div class="col-md-12 text-warning">','</div>'); ?>                              
                              </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Sumilla de la Noticia </label>

                              <div class="col-sm-9">
                                    <input  placeholder="Sumilla" class="col-xs-10 col-sm-5" id="cInfoSumilla" type="text" name="cInfoSumilla" value="<?php echo set_value('cInfoSumilla'); ?>" required />      
                                    <?php echo form_error('cEveDireccion','<div class="col-md-12 text-warning">','</div>'); ?>
                                    
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion de la Noticia </label>

                              <div class="col-sm-9">
                                    <textarea id="cInfoDescripcion" name="cInfoDescripcion" placeholder="Descripcion" class="col-xs-10 col-sm-5" required><?php echo set_value('cInfoDescripcion'); ?></textarea>
                                    <?php echo form_error('cInfoDescripcion','<div class="col-md-12 text-warning">','</div>'); ?>
                              </div>
                        </div>
                        <div class="space-4"></div>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Foto de la Noticia </label>
                              <div class="col-xs-10 col-sm-3">
                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="cInfoLinkFoto"  required/> 
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Lugar de la Noticia </label>

                              <div class="col-sm-5">
                                    <input  placeholder="Lugar" class="col-xs-10 col-sm-5" id="cInfoLugar" type="text" name="cInfoLugar" value="<?php echo set_value('cInfoLugar'); ?>" required  />      
                                    <?php echo form_error('cInfoLugar','<div class="col-md-12 text-warning">','</div>'); ?>
                                    
                              </div>
                        </div>
                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Autor de la Noticia </label>

                              <div class="col-sm-4">
                                    <input  placeholder="Autor" class="col-xs-10 col-sm-5" id="cInfoAutor" type="text" name="cInfoAutor" value="<?php echo set_value('cInfoAutor'); ?>" required />      
                                    <?php echo form_error('cInfoAutor','<div class="col-md-12 text-warning">','</div>'); ?>
                                    
                              </div>
                        </div>
                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> tipo de Noticia </label>

                              <div class="col-sm-4">
                                    
                                    <select class="form-control" id="nParID" type="text" name="nParID" value="<?php echo set_value('nParID');?>">
                                      <option value="24">Futbol Internacionl</option>
                                      <option value="25">Futbol Peruano</option>
                                    </select>    
                                    <?php echo form_error('nParID','<div class="col-md-12 text-warning">','</div>'); ?>
                                    
                              </div>
                        </div>
                        <div class="hidden ">
                              <input id="nInfoTipoID" type="text" name="nInfoTipoID" value="1"  />
                              <input id="cInfoEstado" type="text" name="cInfoEstado" value="H"  />
                              <input id="nPcaID" type="text" name="nPcaID" value="23"  />
                               <input id="nInfoVisitas" type="text" name="nInfoVisitas" value="0"  />
                               <input id="nUsuID" type="text" name="nUsuID" value="1"  />

                        </div>
                        
                        

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit" name="submit">
                                          <i class="icon-ok bigger-110"></i>
                                          Publicar
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <a href="<?=URL_MAIN?>multimedia/noticias" class="btn">
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





