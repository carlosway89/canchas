  


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

                  echo form_open('multimedia/guardar_foto', $atributosForm); ?>
                  
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

                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="userfile"  required/>
                                    <div id="image_uploaded" class="text-center" style="display:none">
                                      <img src="" class="img_up">
                                    </div>
                                    <div id="loader_image" class="text-center" style="display:none">
                                      <img src="<?=URL_IMG?>/cargando.gif" class="img_loader"><br>
                                      Subiendo....
                                    </div> 
                              </div>
                        </div>

                        
                        <div class="hidden ">
                              <input id="nMultiTipoID" type="hidden" name="nMultiTipoID" value="1"  />
                              <input id="cMultiEstado" type="hidden" name="cMultiEstado" value="H"  />
                              <input id="nMultCategID" type="hidden" name="nMultCategID" value="4"  />
                              <input id="foto_name" name="foto_name" type="hidden">
                              <input id="foto_url" name="foto_url" type="hidden">
                               <input id="cMultNumVisitas" type="hidden" name="cMultNumVisitas" value="0"  />
                        </div>
                        
                        

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button id="btn_upload" class="btn btn-info" type="submit" name="submit">
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
<style type="text/css">
  .img_loader{
    height: 50px;
  }
  .img_up{
    height: 150px;
    width: 150px;

  }
</style>
<script type="text/javascript">

      if (document.addEventListener) {
         document.addEventListener("DOMContentLoaded", loadScripts, false);
      }

      
      function loadScripts() {          

            $('#id-input-file-2').ace_file_input({
              no_file:'Ningun Archivo Seleccionado ...',
              btn_choose:'Elegir',
              btn_change:'Cambiar',
              droppable:false,
              onchange:null,
              thumbnail:false, //| true | large
              whitelist:'gif|png|jpg|jpeg',
              blacklist:'exe|php|html',
              onchange:'upload_foto()'
              //
            });

            $('#id-input-file-2').on('change',function(e){

                e=e?e:window.event;
                var files = e.target.files || e.dataTransfer.files;


                $('#btn_upload').addClass('disabled');
                $('#loader_image').show();               
                $('div.ace-file-input').hide();
                $('div#image_uploaded').hide();

                var img=files[0];

                var serverUrl = 'https://api.parse.com/1/files/' + img.name;

                $.ajax({
                  type: "POST",
                  beforeSend: function(request) {
                    request.setRequestHeader("X-Parse-Application-Id", 'xdLEwFZLHdiIXJHpuI0scD67SQcGUuFS2xo4KUYW');
                    request.setRequestHeader("X-Parse-REST-API-Key", 'glPBhAwIPdKBq9BRVcXFAiJkJEg5wtqycL0idMzW');
                    request.setRequestHeader("Content-Type", img.type);
                  },
                  url: serverUrl,
                  data: img,
                  processData: false,
                  contentType: false,
                  success: function(data) {

                    //muestra y desahbilita div y botones
                    $('#btn_upload').removeClass('disabled');
                    $('#loader_image').hide();               
                    $('div.ace-file-input').show();
                    $('div.ace-file-input').find('.remove').hide();


                    //pone los valores en los input para enviar por post
                    $('#foto_name').val(data.name);
                    $('#foto_url').val(data.url);

                    //muestra la imagen subida
                    $('.img_up').attr('src',data.url);
                    $('div#image_uploaded').show();
                    

                  },
                  error: function(data) {
                    $('#btn_upload').removeClass('disabled');
                    $('#loader_image').hide();               
                    $('div.ace-file-input').show();
                  }
                });

                

            });

      }

      
</script>



