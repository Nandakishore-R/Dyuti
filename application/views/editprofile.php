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
                    <h4 class="col-md-6">EDIT PROFILE</h4>
                    <a href="<?php echo $this->config->item("base_url"); ?>dashboard"><h4 class="col-md-6 prof-edit"><i class="fa fa-user fa-fw"></i>My Profile</h4></a>
                </div></div>
                <div class="row reg-resp"></div>
                  <form id="reg_form">
                <div class="row well"><div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Title <span class="imp">*</span></label>
                            <select class="form-control validate[required]" id="title" name="title">
                                <option <?php if($row->title=="Mr") { echo "selected=''";} ?> value="Mr">Mr</option>
                                <option <?php if($row->title=="Ms") { echo "selected=''";} ?> value="Ms">Ms</option>
                                <option <?php if($row->title=="Mrs") { echo "selected=''";} ?> value="Mrs">Mrs</option>
                                <option <?php if($row->title=="Prof") { echo "selected=''";} ?> value="Prof">Prof</option>
                                <option <?php if($row->title=="Dr") { echo "selected=''";} ?> value="Dr">Dr</option>
                                <option <?php if($row->title=="Assist Prof Dr") { echo "selected=''";} ?> value="Assist Prof Dr">Assist Prof Dr</option>
                                <option <?php if($row->title=="Assoc Prof Dr") { echo "selected=''";} ?> value="Assoc Prof Dr">Assoc Prof Dr</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name <span class="imp">*</span></label>
                            <input type="text" placeholder="First Name" name="first_name" id="first_name" class="form-control validate[required]" value="<?php echo $row->first_name; ?>">
                        </div></div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name <span class="imp">*</span></label>
                            <input type="text" placeholder="Last Name" name="last_name" id="last_name" class="form-control validate[required]" value="<?php echo $row->last_name; ?>">
                        </div></div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Date Of Birth <span class="imp">*</span></label>
                            <input type="text" placeholder="Date Of Birth" name="dob" id="dob" class="form-control validate[required] dob" value="<?php echo $row->dob; ?>">
                        </div></div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>City <span class="imp">*</span></label>
                            <input type="text" placeholder="City" name="city" id="city" class="form-control validate[required]" value="<?php echo $row->city; ?>">
                        </div></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>State <span class="imp">*</span></label>
                            <input type="text" placeholder="State" name="state" id="state" class="form-control validate[required]" value="<?php echo $row->state; ?>">
                        </div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Country <span class="imp">*</span></label>
                            <select class="form-control validate[required]" name="country" id="country" required="">
                                <?php echo $country; ?>
                            </select>
                        </div></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Company/University Name <span class="imp">*</span></label>
                            <input type="text" placeholder="Company/University Name" name="company" id="company" class="form-control validate[required]" value="<?php echo $row->company; ?>">
                        </div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number <span class="imp">*</span></label>
                            <input type="text" placeholder="Phone Number" name="phone" id="phone" class="form-control validate[required,maxSize[10],custom[phone]]" value="<?php echo $row->phone; ?>">
                        </div></div>
                         
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Address <span class="imp">*</span></label>
                            <textarea name="address" id="address" class="form-control validate[required]"><?php echo $row->address; ?></textarea>
                        </div></div> 
                    </div>  

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" class="btn sub-bt" id="update-sub">Submit</button>
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
                $("#update-sub").click(function()
                {
                    if($("form").validationEngine('validate'))
                    {
                        $("#update-sub").html('Updating..');
                        var dataString  =   $("form").serialize();
                        $.ajax({
                            data    :   dataString,
                            type    :   "POST",
                            url     :   "<?php echo $this->config->item('base_url')."dashboard/updateProfile"; ?>",
                            success : function(resp)
                            {
                                $(".reg-resp").html(resp);
                                $("#update-sub").html('Submit');
                                setTimeout(function(){$(".reg-resp").html("")},3000);
                                $(window).scrollTop($('.nav').offset().top);
                            }
                        });
                    }  
                });
            });
        </script>
	</body>
</html>