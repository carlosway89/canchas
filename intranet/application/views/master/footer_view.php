</div><!-- /.main-content -->


</div><!-- /.main-container-inner -->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->



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
<!--<script src="<?php echo URL_JS; ?>jquery.dataTables.min.js"></script>
<script src="<?php echo URL_JS; ?>jquery.dataTables.bootstrap.js"></script>-->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 





<!-- ace scripts -->

<script src="<?php echo URL_JS; ?>ace-elements.min.js"></script>
<script src="<?php echo URL_JS; ?>ace.min.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    jQuery(function($) {
        var oTable1 = $('#sample-table-2').dataTable( {
            "aoColumns": [
                { "bSortable": false },
                null, null,null, null, null,
                { "bSortable": false }
            ] } );
				
        $('#table_eventos_list').dataTable( {
            serverSide: true,
            "sAjaxSource":'<?= URL_MAIN ?>eventos/list_json',
            "aoColumns": [
                { "bSortable": false },
                null, null,null, null, null,
                { "bSortable": false }
            ]
        } );
    })
</script>



</body>

</html>