<div class="page-content">
	<div class="page-header">
            <h1>
                  Publicidad
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Todos la publicidad en la web
                  </small>
            </h1>

    </div><!-- /.page-header -->

    <div class="pull-left">
    	<div class="col-xs-12">
    		<a class="btn btn-app btn-success btn-xs" href="<?=URL_MAIN?>publicidad/add_foto">
    			<i class="glyphicon glyphicon-plus "></i> Imagen   			
    		</a>

    	</div>
    	<hr>
    	<br><br>
    </div>
    
	<div class="row">
		<div class="col-xs-12">

			<div class="row-fluid">
				<div class="col-xs-12">
					<h4>Publicidad Principal (Slider)</h4>
					<hr>
					<ul class="ace-thumbnails">
					<?php
			
					for($i=0;$i<count($list_multimedia);$i++) { 

						if($list_multimedia[$i]['cMultTitulo']=='principal'){
					?>

						<li>
							<a href="#" data-rel="colorbox">
								<img id="foto_list" alt="150x150" src="<?= $list_multimedia[$i]['cMultLink']; ?>" />
							</a>

							<div class="tools tools-right">
																	
								<a href="#" onClick="return deletechecked('<?=URL_MAIN?>publicidad/delete_foto/<?=$list_multimedia[$i]['nMultID'];?>');" >
									<i class="icon-remove red"></i>
								</a>
							</div>
						</li>

					<?php
						}	
					} 
					?>
					</ul>
					<br></br>

				</div>
				
				<div class="col-xs-12">
					<h4>Publicidad Secundaria</h4>
					<hr>
					<ul class="ace-thumbnails">
					<?php
			
					for($i=0;$i<count($list_multimedia);$i++) { 

						if($list_multimedia[$i]['cMultTitulo']!='principal'){
					?>

						<li>
							<a href="#" data-rel="colorbox">
								<img id="foto-<?=$list_multimedia[$i]['cMultTitulo']?>" alt="150x150" src="<?= $list_multimedia[$i]['cMultLink']; ?>" />
							</a>

							<div class="tools tools-right">
																	
								<a href="#" onClick="return deletechecked('<?=URL_MAIN?>multimedia/delete_foto/<?=$list_multimedia[$i]['nMultID'];?>');" >
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
	</div>

</div>
<style type="text/css">
	img#foto_list{
		width: 250px;
		height: 100px;
	}
	img#foto-abajo{
		width: 450px;
	}
	img#foto-derecha{
		width: 150px;
	}
</style>


<script type="text/javascript">
	function deletechecked(link)
	{
	    var answer = confirm('Esta seguro de Eliminar esta publicidad?')
	    if (answer){
	        window.location = link;
	    }
	    
	    return false;  
	}

</script>