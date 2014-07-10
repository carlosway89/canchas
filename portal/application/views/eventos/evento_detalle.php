<?php

error_reporting(0);

?>
<section id="content">
	

	<!-- Page Heading -->
	<section class="section page-heading animate-onscroll">
		
		<h1><?=$result[0]['cEveTitulo']?></h1>
		
	</section>
	<!-- Page Heading -->
	
	
	<!-- Event Map -->
	<section class="section full-width full-width-map animate-onscroll">
	
		<iframe width="900" height="480" src="https://maps.google.rs/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=marmora+road&amp;sll=44.210767,20.922416&amp;sspn=4.606139,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Marmora+Rd,+London+SE22+0RX,+United+Kingdom&amp;t=m&amp;z=14&amp;ll=51.451955,-0.055755&amp;output=embed"></iframe>
		
	</section>
	<!-- /Event Map -->
	
	
	<!-- Section -->
	<section class="section full-width-bg gray-bg">
		
		<div class="row">
		
			<div class="col-lg-12 col-md-12 col-sm-12">
				
				<!-- Event Single -->
				<div class="event-single">
					
					<div class="row">
						
						<div class="col-lg-9 col-md-9 col-sm-8 animate-onscroll">
							
							<div class="event-image">
								<img src="img/events/event1.jpg" alt="">
							</div>
							
							<h6>Description</h6>
							
							<p><?=$result[0]['cEveDescripcion']?> </p>
							
						</div>
						
						<div class="col-lg-3 col-md-3 col-sm-4">
							
							<!-- Event Meta -->
							<div class="event-meta">
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-calendar"></i>
									<p class="title">Fecha Empiezo - Fecha Termino</p>
									<p><?= date("d/m/y",strtotime($result[0]['dEveStartTime']));?> - <?= date("d/m/y",strtotime($result[0]['dEveEndTime']));?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-clock"></i>
									<p class="title">Hora Empiezo - Hora Termino</p>
									<p><?=date("H:i",strtotime($result[0]['dEveStartTime']));?> - <?=date("H:i",strtotime($result[0]['dEveEndTime']));?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-location"></i>
									<p class="title">Direccion del Evento</p>
									<p><?=$result[0]['cEveDireccion']?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-ticket"></i>
									<p class="title">Costo</p>
									<p><?=$result[0]['nEveCosto']==0?'Entrada Libre':'S/.'.$result[0]['nEveCosto']?></p>
									
								</div>
								
								<div class="event-meta-block animate-onscroll">
									
									<i class="icons icon-share"></i>
									<p class="title">Share This</p>
									<ul class="social-share">
										<li class="facebook"><a href="<?=$result[0]['cEveLinkFacebook']?>" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
										<li class="email"><a href="#" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
									</ul>
									
								</div>
								
								
							</div>
							<!-- /Event Meta -->
							
						</div>
						
					</div>
				
				</div>
				<!-- /Event Single -->
				
				
				<div class="row event-pagination">
				
					<!-- <div class="col-lg-4 col-md-4 col-sm-4 align-left animate-onscroll">
						<a href="#" class="button big button-arrow-before">Prev event</a>
					</div> -->
					
					<div class="col-lg-12 col-md-12 col-sm-12 align-center animate-onscroll">
						<a href="<?php echo URL_MAIN ?>eventos/" class="button big">All events</a>
					</div>
					
					<!-- <div class="col-lg-4 col-md-4 col-sm-4 align-right animate-onscroll">
						<a href="#" class="button big button-arrow">Next event</a>
					</div> -->
				
				</div>
				
			</div>
		</div>
						
	</section>
</section>