<div class="page-content">
	<div class="page-header">
            <h1>
                  Galeria de Fotos
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Galeria de fotos de las canchas
                  </small>
            </h1>

    </div><!-- /.page-header -->

    
    
	<div class="row">
		<div class="col-xs-12">

			<div class="row-fluid">
				<ul class="ace-thumbnails">
				<?php
          $n=count($list_galeria);
          if($n==0){
        ?>
          <div class="alert alert-warning">No tiene fotos de su cancha aún </div>
        <?php    
            
          }
          else{
            foreach ($list_galeria as $list_galeria){ 
				?>

					<li>
						<a href="#" data-rel="colorbox">
							<img id="foto_list" alt="150x150" src="<?=$list_galeria->cMultLink?>" />
						</a>

						<div class="tools tools-right">
							<?php 
                $imagen_link=str_replace('http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/','',$list_galeria->cMultLink);
                $imagen_link= str_replace('.jpg','',$imagen_link);
              ?>
							<a href="#" onClick="return deletechecked('<?=URL_MAIN?>canchas/delete_foto/<?=$list_galeria->nMultID?>/<?=$list_galeria->nCanID?>/<?=$imagen_link;?>');" >
								<i class="icon-remove red"></i>
							</a>
						</div>
					</li>

				<?php
  					} 
          }
				?>
				</ul>
			</div>
		</div>
	</div>

	<div class="row">
    	<div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <hr>
                  <h4>Agregar Nueva Foto</h4>
                  <?php   
                  $atributosForm = array('id ' => 'frm_nueva_foto', "class" => 'form-horizontal');

                  echo form_open('canchas/agregar_foto', $atributosForm); ?>
                  
                        <div class="form-group">
                              <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Selecionar Foto </label>
                              <div class="col-xs-10 col-sm-3">
                                    
                                    <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="userfile"  required/>
                                    <span class="text-warning">Solo fotos *.jpg o *.JPG permitido </span>
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
                              <input id="foto_name" name="foto_name" type="hidden">
                              <input id="foto_url" name="foto_url" type="hidden">
                              <input id="nCanID" name="nCanID" value="<?=$nCanID?>" type="hidden">
                        </div>
                                               

                        <div class="clearfix form-actions">
                              <div class="col-md-offset-3 col-md-9">
                                    <button id="btn_upload" class="btn btn-info" type="submit" name="submit">
                                          <i class="icon-ok bigger-110"></i>
                                          Agregar
                                    </button>
                              </div>
                        </div>
                  <?php echo form_close(); ?>
            </div>
    </div>

</div>
<style type="text/css">
	img#foto_list{
		width: 150px;
		height: 100px;
	}
</style>

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
              maxSize: 100000, //~100 KB
              before_change:function(files, dropped){
                console.log(files[0].type);

                if(files[0].type=='image/jpg' || files[0].type=='image/jpeg'){
                  return true;
                }
              },
              allowExt:  ['jpg', 'jpeg', 'png', 'gif', 'tif', 'tiff', 'bmp'],
              allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/tif', 'image/tiff', 'image/bmp'] //html5 browsers only
            });

            $('#id-input-file-2').on('change',function(e){

                e=e?e:window.event;
                var files = e.target.files || e.dataTransfer.files;
                var img=files[0];
                if(img.type=='image/jpg' || img.type=='image/jpeg'){

                  $('#btn_upload').addClass('disabled');
                  $('#loader_image').show();               
                  $('div.ace-file-input').hide();
                  $('div#image_uploaded').hide();

                  

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

                }

             });

      }
      
</script>


<script type="text/javascript">
	function deletechecked(link)
	{
	    var answer = confirm('Esta seguro de Eliminar esta foto?')
	    if (answer){
	        window.location = link;
	    }
	    
	    return false;  
	}

</script>