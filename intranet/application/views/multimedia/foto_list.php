<div class="page-content">
	<div class="page-header">
            <h1>
                  Fotos
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Todos tus fotos
                  </small>
            </h1>

    </div><!-- /.page-header -->

    <div class="pull-left">
    	<div class="col-xs-12">
    		<a class="btn btn-app btn-success btn-xs" href="<?=URL_MAIN?>eventos/add">
    			<i class="glyphicon glyphicon-plus "></i> Foto   			
    		</a>

    	</div>
    	<hr>
    	<br><br>
    </div>
    
	<div class="row">
		<div class="col-xs-12">

			<div class="row-fluid">
				<ul class="ace-thumbnails">
				<?php
		
					for($i=0;$i<count($list_multimedia);$i++) { 
				?>

					<li>
						<a href="#" data-rel="colorbox">
							<img id="foto_list" alt="150x150" src="<?=URL_MAIN?>img/img2.jpg" />
						</a>

						<div class="tools tools-right">

							<a href="#">
								<i class="icon-remove red"></i>
							</a>
						</div>
					</li>

				<?php
					} 
				?>
				</ul>
			</div>
		</div>
	</div>

</div>
<style type="text/css">
	img#foto_list{
		width: 150px;
	}
</style>


<script type="text/javascript">
	function deletechecked(link)
	{
	    var answer = confirm('Esta seguro de Eliminar este evento?')
	    if (answer){
	        window.location = link;
	    }
	    
	    return false;  
	}

</script>