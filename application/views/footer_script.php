<?php include('analyticstracking.php'); ?>
<script src="<?php echo $this->config->item('base_url')."assets/"; ?>js/jquery.min.js"></script>		
<script type="text/javascript" src="<?php echo $this->config->item('base_url')."assets/"; ?>js/bootstrap.min.js"></script>
<!--date picker start-->
<script src="<?php echo $this->config->item('base_url')."assets/"; ?>datepicker/js/bootstrap-datepicker.js"></script>
<!--date picker end-->
<!--Validation engine start-->
<script src="<?php echo $this->config->item('base_url')."assets/"; ?>admin/validation/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $this->config->item('base_url')."assets/"; ?>admin/validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<!--Validation engine end-->
<script src="<?php echo $this->config->item('base_url')."assets/"; ?>owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url')."assets/"; ?>js/jquery.ba-cond.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url')."assets/"; ?>js/jquery.slitslider.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url')."assets/"; ?>js/modernizr.custom.79639.js"></script>

<script type="text/javascript">	
	$(document).ready(function($) {
		$('.loginform').validationEngine({promptPosition : "bottomLeft"});
		$('.dob').datepicker({
			endDate: '+0d',
			autoclose: true
		});
		$("#owl-example").owlCarousel({ autoPlay : true, });
 
		$("#login").click(function()
		{
			var username        =   $("#username").val();
			var password        =   $("#lpassword").val();
			var logString       =   "username="+username+"&password="+password;
			if($(".loginform").validationEngine('validate')){
			$("#log-resp").html("Please wait..");
			$.ajax({
				type: "POST",
				url: "<?php echo $this->config->item('base_url')."registration/auth"; ?>",
				data: logString,
				cache: false,
				success: function(resp)
				{
					if(resp.match("error") != null)
					{
						$("#log-resp").html(resp);
					} else {
						window.location.href = "<?php echo $this->config->item('base_url')."dashboard"; ?>";
					}
				}
			});
		}
		});


	});

/*	$(function() {
		var Page = (function() {
			var $nav = $( '#nav-dots > span' ),
			slitslider = $( '#slider' ).slitslider( {
				onBeforeChange : function( slide, pos ) {
					$nav.removeClass( 'nav-dot-current' );
					$nav.eq( pos ).addClass( 'nav-dot-current' );
				},
				autoplay: true, 
				interval: 20000,
			} ),

			init = function() {
				initEvents();
			},
			initEvents = function() {
				$nav.each( function( i ) {
					$( this ).on( 'click', function( event ) {
						var $dot = $( this );
						if( !slitslider.isActive() ) {
							$nav.removeClass( 'nav-dot-current' );
							$dot.addClass( 'nav-dot-current' );
						}
						slitslider.jump( i + 1 );
						return false;
					} );
				} );
			};
			return { init : init };
		})();
		Page.init();
	});*/
	


</script>
    <script>
        jssor_1_slider_init();
    </script>
