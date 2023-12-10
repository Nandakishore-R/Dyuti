<?php if($this->uri->segment(2) == "programs" && $this->uri->segment(3) == "view") { ?>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/jquery-1.10.2.min.js"></script>  
    <script type="text/javascript" src="<?php echo $this->config->item("base_url").'assets/plugin_timepick/prettify.js'; ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item("base_url").'assets/plugin_timepick/bootstrap-timepicker.js'; ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#timepicker1').timepicker();
            setTimeout(function() {
              $('#timeDisplay').text($('#timepicker1').val());
          }, 100);
            $('#timepicker1').on('changeTime.timepicker', function(e) {
              $('#timeDisplay').text(e.time.value);
          });
            $('#timepicker2').timepicker();
            setTimeout(function() {
              $('#timeDisplay').text($('#timepicker2').val());
          }, 100);
            $('#timepicker2').on('changeTime.timepicker', function(e) {
              $('#timeDisplay').text(e.time.value);
          });
        });
    </script>
    <?php  } ?>


    <?php if($this->uri->segment(2) == "gallery") { ?>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/validation/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/settings.js"></script>    
        <?php  } else { ?>  
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/settings.js"></script>                         <!-- Load jQuery -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/jqueryui-1.10.3.min.js"></script>  
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/validation/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
            <?php } ?>

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/enquire.min.js"></script> 									<!-- Load Enquire -->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/velocityjs/velocity.ui.min.js"></script> 
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/wijets/wijets.js"></script>                           <!-- Wijet -->


            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>      <!-- Touchspin -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck -->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script> <!-- Mousewheel support needed for Mapael -->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/application.js"></script>
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/demo/demo.js"></script>
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/demo/demo-switcher.js"></script>

            <!-- End loading site level scripts -->

            <!-- Load page level scripts-->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-chartistjs/chartist.min.js"></script>               <!-- Chartist -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-chartistjs/chartist-plugin-tooltip.js"></script>    <!-- Chartist -->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-chartjs/Chart.js"></script>  						<!-- Chart.js -->

            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/easypiechart/jquery.easypiechart.js"></script> 			<!-- EasyPieChart -->



            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-flot/jquery.flot.min.js"></script>
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-flot/jquery.flot.pie.min.js"></script>         <!-- Flot Pie Chart Plugin -->
            <!-- Flot Ordered Bars Plugin-->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-flot/jquery.flot.resize.js"></script>          <!-- Flot Responsive -->
            <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-flot/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->

            <?php if($this->uri->segment(2) == "dashboard") { ?>    
                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/demo/demo-index.js"></script> 									<!-- Initialize scripts for this page-->
                <?php } ?>
                <!-- End loading page level scripts-->

                <!-- Load page level scripts-->
                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/form-fseditor/jquery.fseditor-min.js"></script> 

                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/demo/demo-datatables.js"></script>

                <!-- End loading page level scripts-->
                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/card/lib/js/card.js"></script>  

                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>          <!-- Tokenfield -->

                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/form-typeahead/typeahead.bundle.min.js"></script> 

                <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/switchery/switchery.js"></script>                                     <!-- Switchery --> 
            </body>

            <!-- /1.2/ /3.x [XR&CO'2014], Fri, 29 Jan 2016 05:59:29 GMT -->
            </html>