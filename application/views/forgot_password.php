<?php include("header.php"); ?>
</head>
<body>
<div class="container demo-2 logohd">


	<?php include("logo_head.php"); ?>
	<?php include("menu_head.php"); ?>



</div>

 

<div class="content-wrapper">
	<section>
        <div id="data-wrap">  
                <div class="row "><div class="col-md-12 form-top">
                    <h4>PASSWORD RESET</h4>
                </div></div>
                <div class="row reg-resp"></div>
                    <form id="resp_form">
                 
                <div class="row well"><div class="col-md-12">

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Email ID<span class="imp">*</span></label>
                            <input type="text" placeholder="Email ID" name="emailid" id="emailid" class="form-control validate[required,custom[email]]">
                        </div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" name="sub" class="btn sub-bt" id="for_sub">Submit</button>
                        </div>
                </div>
                    </div>

            </div>
            </div><!-- well end -->
        </form>

        </div>
    </section>
</div>
		<?php include("footer.php"); ?>
		<?php include("footer_script.php"); ?>
		<script type="text/javascript">
            $(document).ready(function() {
                $("#for_sub").click(function()
                {
                    if($("form").validationEngine('validate'))
                    {
                        $("#for_sub").html('Sending..');
                        var dataString  =   $("form").serialize();
                        $.ajax({
                            data    :   dataString,
                            type    :   "POST",
                            url     :   "<?php echo $this->config->item('base_url')."registration/mailer"; ?>",
                            success : function(resp)
                            {
                                $(".reg-resp").html(resp);
                                $("#resp_form")[0].reset();
                                setTimeout(function(){$(".reg-resp").html("")},3000);
                            }
                        });
                    }  
                });
            });
        </script>

	</body>
</html>