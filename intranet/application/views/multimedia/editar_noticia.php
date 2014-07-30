  


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

                  echo form_open('multimedia/editar_noticia', $atributosForm);
                    

                    foreach ($list_noticias as $list_noticias) {
                      
                    
                   ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Titulo de la Notcia </label>

                              <div class="col-sm-9">
                                    <input placeholder="Titulo" class="col-xs-10 col-sm-5" id="cInfoTitulo" type="text" name="cInfoTitulo" value="<?=$list_noticias->cInfoTitulo; ?>" required />                              
                              </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Sumilla de la Noticia </label>

                              <div class="col-sm-9">
                                    <input  placeholder="Sumilla" class="col-xs-10 col-sm-5" id="cInfoSumilla" type="text" name="cInfoSumilla" value="<?=$list_noticias->cInfoSumilla; ?>" required />      
                                    
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Descripcion de la Noticia </label>

                              <div class="col-sm-9">
                                    <textarea id="cInfoDescripcion" name="cInfoDescripcion" placeholder="Descripcion" class="col-xs-10 col-sm-5" required><?=$list_noticias->cInfoDescripcion; ?></textarea>
                              </div>
                        </div>
                        <div class="space-4"></div>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Foto de la Noticia </label>
                              <div class="col-xs-10 col-sm-3">
                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="userfile" value="<?=$list_noticias->cMultLink; ?>" />
                                    <div id="image_uploaded" class="text-center" >
                                      <img src="<?=$list_noticias->cMultLink; ?>" class="img_up">
                                    </div>
                                    <div id="loader_image" class="text-center" style="display:none">
                                      <img src="<?=URL_IMG?>/cargando.gif" class="img_loader"><br>
                                      Subiendo....
                                    </div>  
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Lugar de la Noticia </label>

                              <div class="col-sm-6">
                                    <input  placeholder="Lugar" class="col-xs-10 col-sm-5" id="cInfoLugar" type="text" name="cInfoLugar" value="<?=$list_noticias->cInfoLugar; ?>" required  />      
                                    
                              </div>
                        </div>
                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Autor de la Noticia </label>

                              <div class="col-sm-6">
                                    <input  placeholder="Autor" class="col-xs-10 col-sm-5" id="cInfoAutor" type="text" name="cInfoAutor" value="<?=$list_noticias->cInfoAutor; ?>" required />      
                                    
                              </div>
                        </div>
                        <div class="space-4"></div>

                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> tipo de Noticia </label>

                              <div class="col-sm-4">
                                    
                                    <select class="form-control" id="nParID" type="text" name="nParID" >
                                      <option value="24" <?=$list_noticias->nParID=='24'?'selected="selected"':' '; ?> >Futbol Internacional</option>
                                      <option value="25" <?=$list_noticias->nParID=='25'?'selected="selected"':' '; ?> >Futbol Peruano</option>
                                    </select>    
                                    
                              </div>
                        </div>
                        <div class="hidden ">
                              <input id="nInfoTipoID" type="text" name="nInfoTipoID" value="1"  />
                              <input id="cInfoEstado" type="text" name="cInfoEstado" value="H"  />
                              <input id="foto_url" name="foto_url" type="hidden" />
                              <input id="nPcaID" type="text" name="nPcaID" value="23"  />
                               <input id="nInfoVisitas" type="text" name="nInfoVisitas" value="0"  />
                               <input id="nUsuID" type="text" name="nUsuID" value="1"  />
                               <input id="nInfoID" name="nInfoID" value="<?=$list_noticias->nInfoID; ?>" type="hidden">
                               <input id="nMultID" name="nMultID" value="<?=$list_noticias->nMultID; ?>" type="hidden">

                        </div>
                        
                        

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button id="btn_upload" class="btn btn-info" type="submit" name="submit">
                                          <i class="icon-ok bigger-110"></i>
                                          Editar
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <a href="<?=URL_MAIN?>multimedia/noticias" class="btn">
                                          <i class="icon-undo bigger-110"></i>
                                          Cancelar
                                    </a>
                              </div>
                        </div>
                  <?php 
                  }
                  echo form_close(); ?>
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





