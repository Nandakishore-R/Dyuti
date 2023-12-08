<?php include("header.php"); ?>
        <script>
        $(document).ready(function(){
            $("form").validationEngine();
           });
        </script>
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
                    <h4>CHANGE PASSWORD</h4>
                </div></div>
                <div class="row res-resp"></div>
                 <?php echo form_open_multipart($action,array("id"=>"reg_form")); ?>
                <div class="row well"><div class="col-md-12">

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>New password<span class="imp">*</span></label>
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input id="password" name="password" type="password" class="form-control validate[required]" placeholder="New password">
                        </div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Password Again<span class="imp">*</span></label>
                            <input id="password2" name="password2" type="password" class="form-control validate[required,equals[password]]" placeholder="Password again">
                        </div></div>
                    </div>
                    


                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                             <button type="button" name="sub" class="btn sub-bt" id="res_sub">Submit</button>
                        </div>
                </div>
                    </div>

            </div>
            </div><!-- well end -->
            <?php echo form_close(); ?>

        </div>
    </section>
</div>
		<?php include("footer.php"); ?>
		<?php include("footer_script.php"); ?>
	   <script type="text/javascript">
            $(document).ready(function() {
                $("#res_sub").click(function()
                {
                    if($("#reg_form").validationEngine('validate'))
                    {
                        $("#reg-sub").html('Sending..');
                        var dataString  =   $("form").serialize();
                        $.ajax({
                            data    :   dataString,
                            type    :   "POST",
                            url     :   "<?php echo $this->config->item('base_url')."registration/resetpassword"; ?>",
                            success : function(resp)
                            {
                                $(".res-resp").html(resp);
                                $("#reg_form")[0].reset();
                                setTimeout(function(){$(".res-resp").html("")},3000);
                            }
                        });
                    }  
                });
            });
        </script>
	</body>
</html>