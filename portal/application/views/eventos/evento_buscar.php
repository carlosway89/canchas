<section class="section full-width-bg">
	
	<div class="row related-events">
		
		<div class="col-lg-12 col-md-12 col-sm-12 animate-onscroll">
					
			<h5>Eventos</h5>
			
		</div>
		<?php if (count($result) > 0) { ?>

		<?php
	
			for($i=0;$i<count($result);$i++) { 
				?>
			
			<div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">
				
				<!-- Event Item -->
				<div class="event-item">
					
					<div class="event-image">
						<img src="<?php echo URL_IMG; ?>events/event2.jpg" alt="">
					</div>
					
					<div class="event-info">
					
						<div class="date">
							<span>
								<span class="day"><?=date("d",strtotime($result[$i]['dEveStartTime']));?></span>
								<span class="month"><?=date("M",strtotime($result[$i]['dEveEndTime']));?></span>
							</span>
						</div>
						
						<div class="event-content">
							<h6><a href="<?php echo URL_MAIN ?>eventos/mostrar/<?=$result[$i]['nEveID']?>"><?=$result[$i]['cEveTitulo']?></a></h6>
							<ul class="event-meta">
								<li><i class="icons icon-clock"></i> <?=date("H:i",strtotime($result[$i]['dEveStartTime']));?> - <?=date("H:i",strtotime($result[$i]['dEveEndTime']));?></li>
								<li><i class="icons icon-location"></i><?=$result[$i]['cEveDireccion']?></li>
							</ul>
						</div>
					
					</div>

				</div>
				<!-- /Event Item -->
				
			</div>

		<?php } ?>


		<?php } else { ?>
            <div class="col-lg-12 col-md-12 col-sm-12" style="opacity: 1;">
                <div class="alert-box info">
                    <p><strong>Importante!</strong> No se han encontrado registros de evento con tu búsqueda. </p>
                    <i class="icons icon-cancel-circle-1"></i>
                </div>
            </div>
         <?php } ?>
		
	</div>
	<div class="row event-pagination">			
		<div class="col-lg-12 col-md-12 col-sm-12 align-center animate-onscroll">
			<a href="<?php echo URL_MAIN ?>eventos" class="button big">All events</a>
		</div>
	</div>
<script type="text/javascript" src="<?php echo URL_JS; ?>jsBuscarEventos.js"></script>
</section>