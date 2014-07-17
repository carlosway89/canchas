<div class="page-content">
	<div class="page-header">
            <h1>
                  Noticias
                  <small>
                        <i class="icon-double-angle-right"></i>
                        Todos tus noticias
                  </small>
            </h1>

    </div><!-- /.page-header -->

    <div class="pull-left">
    	<div class="col-xs-12">
    		<a class="btn btn-app btn-success btn-xs" href="<?=URL_MAIN?>multimedia/add_noticia">
    			<i class="glyphicon glyphicon-plus "></i> Noticia   			
    		</a>

    	</div>
    	<hr>
    	<br><br>
    </div>
    
	<div class="row">
		<div class="col-xs-12">
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						
						<th>Titulo</th>
						<th class="hidden-480">Descripcion</th>
						<th >
							<i class="icon-time bigger-110 hidden-480"></i>
							Fecha Registro
						</th>

						<th>
							
							Nº Visitas
						</th>
						<th class="hidden-480">Foto</th>

						<th>Opciones</th>
					</tr>
				</thead>

				<tbody>
					<?php
	
					foreach ($list_noticias as $list_noticias) {
						?>
						<tr>
							
							<td>
								<a href="<?=URL_PORTAL?>noticias/detalle/_<?=$list_noticias->nInfoID;?>" target="_blank"> <?=$list_noticias->cInfoTitulo; ?></a>
							</td>
							<td class="hidden-480"><?php echo substr($list_noticias->cInfoDescripcion, 0, 40).'...'; ?></td>
							<td ><?=date("d-m-Y",strtotime($list_noticias->dInfoFechaRegistro));?></td>
							<td><?=$list_noticias->nInfoVisitas?></td>

							<td class="hidden-480 text-center">
								<img src="<?=URL_PORTAL?>img/noticias/<?=$list_noticias->foto_noticia; ?>" class="lista_multimedia_foto">								
							</td>

							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									
									<a class="green" href="<?=URL_MAIN?>multimedia/edit_noticia/<?=$list_noticias->nMultID;?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a class="red" href="#" onClick="return deletechecked('<?=URL_MAIN?>multimedia/delete/<?=$list_noticias->nMultID;?>');" >
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>

								<div class="visible-xs visible-sm hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
											<i class="icon-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
											
											<li>
												<a href="<?=URL_MAIN?>multimedia/edit_noticia/<?=$list_noticias->nMultID;?>" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="icon-edit bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" onClick="return deletechecked('<?=URL_MAIN?>multimedia/delete/<?=$list_noticias->nMultID;?>');" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
														<i class="icon-trash bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
					<?php }?>

				</tbody>
			</table>
		</div>
	</div>

</div>
<style type="text/css">
	.lista_multimedia_foto{
	   height: 60px;
	}
</style>
<script type="text/javascript">
	function deletechecked(link)
	{
	    var answer = confirm('Esta seguro de Eliminar esta noticia?')
	    if (answer){
	        window.location = link;
	    }
	    
	    return false;  
	}

</script>