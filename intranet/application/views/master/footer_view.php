				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo URL_JS; ?>jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<?php echo URL_JS; ?>jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<?php echo URL_JS; ?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo URL_JS; ?>bootstrap.min.js"></script>
		<script src="<?php echo URL_JS; ?>typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="<?php echo URL_JS; ?>excanvas.min.js"></script>
		<![endif]-->

		<script src="<?php echo URL_JS; ?>jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.slimscroll.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.easy-pie-chart.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.sparkline.min.js"></script>
		<script src="<?php echo URL_JS; ?>flot/jquery.flot.min.js"></script>
		<script src="<?php echo URL_JS; ?>flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo URL_JS; ?>flot/jquery.flot.resize.min.js"></script>

		<!-- scrip form with datetime pages-->
		<script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>
		<script src="<?php echo URL_JS; ?>fuelux/fuelux.spinner.min.js"></script>
		<script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo URL_JS; ?>date-time/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo URL_JS; ?>date-time/moment.min.js"></script>
		<script src="<?php echo URL_JS; ?>date-time/daterangepicker.min.js"></script>
		<script src="<?php echo URL_JS; ?>bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.knob.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.autosize.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo URL_JS; ?>jquery.maskedinput.min.js"></script>
		<script src="<?php echo URL_JS; ?>bootstrap-tag.min.js"></script>
		
		

	

		<!-- ace scripts -->

		<script src="<?php echo URL_JS; ?>ace-elements.min.js"></script>
		<script src="<?php echo URL_JS; ?>ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
				$(this).prev().focus();
			});

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

			
			$('#spinner-numero').ace_spinner({value:0.0,min:0,max:100,step:10, on_sides: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
		</script>

	</body>

</html>