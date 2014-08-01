


<section id="content">			

	
	<!-- Section -->
	<section class="section full-width-bg gray-bg">
		
		<div class="row">
		
		
			<div class="col-lg-12 col-md-12 col-sm-12">
				
				
				<form id="busqueda_eventos" class="white-box animate-onscroll">
					
					<h5>Buscar eventos</h5>
					
					<div class="inline-inputs">
						
						<div class="col-lg-7 col-md-7 col-sm-5">
							<input id="evento_nombre" type="text" placeholder="Buscar por nombre">
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-3">
							<button id="buscar_evento" class="medium"><i class="icons icon-search"></i> Buscar</button>
						</div>
						
					</div>
					
				</form>
				
				
				<!-- Events Calendar -->
				<div class="events-calendar">
					

					<!-- /Events Calendar Header -->
					
					
					<div class="page-header calendar-header animate-onscroll">

						<div class="pull-right form-inline">
							<div class="btn-group">
								<button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
								<button class="btn" data-calendar-nav="today">Hoy</button>
								<button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
							</div>
						</div>

						<h3 class="col-xs-4"></h3>
	
					</div>
					<br>
					<table id="calendar" class="event-calendar animate-onscroll">
						
					</table>
					
					
				</div>
				<!-- /Events Calendar -->
				
				
			</div>
			
		
		</div>
		
	</section>


	<!-- /Section -->
<script type="text/javascript" src="<?php echo URL_JS; ?>jsBuscarEventos.js"></script>

<script type="text/javascript">

if (document.addEventListener) {
         document.addEventListener("DOMContentLoaded", loadScripts, false);
      }


function loadScripts() { 
	var script = document.createElement('script'); 
	script.type = 'text/javascript'; 
	script.src = '<?php echo URL_JS; ?>calendar.js'; 
	document.body.appendChild(script); 

	var script = document.createElement('script'); 
	script.type = 'text/javascript'; 
	script.src = '<?php echo URL_JS; ?>app.js'; 
	document.body.appendChild(script); 

	
}

</script>


</section>

