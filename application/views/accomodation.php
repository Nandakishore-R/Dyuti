<?php include("header.php"); ?>
</head>
<body>
    <div class="container demo-2 logohd">


       <?php include("logo_head.php"); ?>
       <?php include("menu_head.php"); ?>

       <!-- slider -->
       <!-- slider -->
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <img src="<?php echo $this->config->item('base_url')."assets/"; ?>images/organizer-rajagiri.jpg" class="img-responsive center-block" alt="Speakers">
        </div> 
    </div>
    <!---->
    <!---->

    
    <!-- Speakers -->
    <section>
        <div class="content-wrapper">
            <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rajagirihead">
                        <h1> DYUTI - ACCOMODATION</h1>
                    </div>
                    
                            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 rss_pic">
                       <p style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic,text-align;justify;margin-bottom:25px;" align="justify"><b>DYUTI- 2020 ACCOMODATION FACILITES</b><br>
                    <b>Dormitory -</b>&nbsp;<i class="fa fa-inr" aria-hidden="true"></i> 100/-&nbsp; rupees per person per day (2 km away from college).</br>
                     <b>Shared rooms -</b>&nbsp;<i class="fa fa-inr" aria-hidden="true"></i> 350/- &nbsp; rupees per person per day (2 person per room) 10 km away from college.</br>
                      <b>Single room -</b>&nbsp;<i class="fa fa-inr" aria-hidden="true"></i> 700/- &nbsp; rupees per person per day (10 km away from college).</br>
                      <b>Note:</b><br> 1. People who are choosing shared room and single room should take their own travel<br> &nbsp;&nbsp;&nbsp;&nbsp;facilities to reach the college.<br> 2.Those who need accommodation should confirm it before January 1 2020

</p><br>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12 footer">
                         <ul><li><a href="">&nbsp;&nbsp;<b>For more details contact :</b></a</li></ul>
                    	<div class="content-wrapper">
                    	   
                    	    
		<div class="row">
			<div class="col-lg-14 col-md-12 col-sm-12 col-xs-12">
				<ul>
					
					<li><a></a>&nbsp;&nbsp;&nbsp;&nbsp;<b>+917025584750</b></li>
                    <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ajith K Remesan </a></li> 
                    <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accommodation and Transportation</a></li>
					<li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Committee DYUTI 2020</a></li>
				</ul>
			</div>
			</div>


                    </div>
                    


                    </div>


           


        </div>
    </section>
    <!---->

    <!-- Modal -->
    <div id="viewSpeaker" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" id="modal_content">

            </div>

        </div>
    </div>


    <?php include("organizedby.php"); ?>

    <?php /* include("international_partners.php");*/ ?>

</div>



<div class="content-wrapper"> </div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>
<script type="text/javascript">
    $(".more_btn1").click(function()
    {
        var spid       =   $(this).data("spid");
        $.ajax({
            data    : "spid="+spid,
            type    : "POST",
            url     : "<?php echo $this->config->item("base_url")."speakers/viewSpeaker"; ?>",
            success : function(resp)
            {
                $("#modal_content").html(resp);
            }
        });
    });
</script>
</body>
</html>