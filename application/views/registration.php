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
                    <h4>REGISTRATION</h4>
                </div></div>
                <div class="row reg-resp"></div>
                 <form id="reg_form">
                <div class="row well"><div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Title<span class="imp">*</span></label>
                            <select class="form-control validate[required]" id="title" name="title">
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Prof">Prof</option>
                                <option value="Dr">Dr</option>
                                <option value="Assist Prof Dr">Assist Prof Dr</option>
                                <option value="Assoc Prof Dr">Assoc Prof Dr</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name<span class="imp">*</span></label>
                            <input type="text" placeholder="First Name" name="first_name" id="first_name" class="form-control validate[required]">
                        </div></div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name<span class="imp">*</span></label>
                            <input type="text" placeholder="Last Name" name="last_name" id="last_name" class="form-control validate[required]">
                        </div></div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Date Of Birth<span class="imp">*</span></label>
                            <input type="text" placeholder="Date Of Birth" name="dob" id="dob" class="form-control validate[required] dob">
                        </div></div>
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender<span class="imp">*</span></label>
                            <select class="form-control" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div></div>
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label>Your Position<span class="imp">*</span></label>
                            <select class="form-control" name="position">
                                <option value="Student">Student</option>
                                <option value="Faculty">Faculty</option>
                                <option value="Practitioner">Practitioner</option>
                            </select>
                        </div></div>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label>Company/University Name<span class="imp">*</span></label>
                            <input type="text" placeholder="Company/University Name" name="company" id="company" class="form-control validate[required]">
                        </div></div>
                        
                        
                          <div class="col-md-6">
                        <div class="form-group">
                            <label>Area of Specialization<span class="imp">*</span></label>
                            <input type="text" placeholder="Area of Specialization" name="areap" id="areap" class="form-control validate[required]">
                        </div></div>
                        
                          <div class="col-md-6">
                        <div class="form-group">
                            <label>Food Preference<span class="imp">*</span></label>
                            <select class="form-control" name="food">
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Non-Vegetarian">Non-Vegetarian</option>
                                
                            </select>
                        </div></div>
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label>Do you require accomodation<span class="imp">*</span></label>
                            <select class="form-control" name="accomodation">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                
                            </select>
                        </div></div>


	
                    </div>

                    <div class="row">
                        
                          <div class="col-md-6">
                        <div class="form-group">
                            <label>Registration Category<span class="imp">*</span></label>
                            <select class="form-control" name="category">
                                <option value="Indian Professional / Academicians">Indian Professional / Academicians</option>
                                <option value="Indian Students">Indian Students</option>
                                <option value="Foreign Professional / Academicians">Foreign Professional / Academicians</option>
                                <option value="Foreign Students">Foreign Students </option>
                                <option value="Research Scholars">Research Scholars</option>
                                
                            </select>
                        </div></div>
                        
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>City<span class="imp">*</span></label>
                            <input type="text" placeholder="City" name="city" id="city" class="form-control validate[required]">
                        </div></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>State<span class="imp">*</span></label>
                            <input type="text" placeholder="State" name="state" id="state" class="form-control validate[required]">
                        </div></div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Country<span class="imp">*</span></label>
                            <select class="form-control validate[required]" name="country" id="country" required="">
                                <?php echo $country; ?>
                            </select>
                        </div></div>
                       
                    </div>

                    <div class="row">
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number<span class="imp">*</span></label>
                            <input type="text" placeholder="Phone Number" name="phone" id="phone" class="form-control validate[required,maxSize[10],custom[phone]]">
                        </div></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Email<span class="imp">*</span><span class="emresp"></span></label>
                            <input type="email" placeholder="Email" name="emailid" id="emailid" class="form-control validate[required,custom[email]]">
                        </div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Password<span class="imp">*</span></label>
                            <input type="password" placeholder="Password" name="password" id="password" class="form-control validate[required]">
                        </div></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password<span class="imp">*</span></label>
                            <input type="password" placeholder="Confirm Password" name="password1" id="password1" class="form-control validate[required,equals[password]]">
                        </div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Address<span class="imp">*</span></label>
                            <textarea name="address" id="address" class="form-control validate[required]"></textarea>
                        </div></div> 
                    </div>  

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <input type="checkbox" name="terms" class="validate[required]"> I agree <a href="<?php echo $this->config->item("base_url")."terms.html" ?>" target="_blank" class="terms"> terms and conditions</a>
                        </div></div> 
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" class="btn sub-bt" id="reg-sub">Sign Me Up</button>
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
                $("#reg-sub").click(function()
                {
                    if($("form").validationEngine('validate'))
                    {
                        $("#reg-sub").html('Sending..');
                        var dataString  =   $("form").serialize();
                        $.ajax({
                            data    :   dataString,
                            type    :   "POST",
                            url     :   "<?php echo $this->config->item('base_url')."registration/insert"; ?>",
                            success : function(resp)
                            {
                                $(".reg-resp").html(resp);
                                $("#reg-sub").html('Sign Me Up');
                                setTimeout(function(){$(".reg-resp").html("")},5000);
                                $("#reg_form")[0].reset();
                                $(window).scrollTop($('.nav').offset().top);
                            }
                        });
                    }  
                });


                $("#emailid").blur(function()
                {
                        var emailid     =   $("#emailid").val();
                        var dataString  =   "emailid="+emailid;
                        if(emailid != "") {
                        $(".emresp").html("<i class='fa fa-spinner fa-spin'></i>checking..");
                        $.ajax({
                            data    :   dataString,
                            type    :   "POST",
                            url     :   "<?php echo $this->config->item('base_url')."registration/checkEmail"; ?>",
                            success : function(resp)
                            {
                                if(resp==0)
                                {
                                    $(".emresp").html("<i class='fa fa-times fa-fw btn-danger'></i>Already Exist");
                                    $('#reg-sub').prop('disabled', true);
                                }
                                else {
                                    $(".emresp").html("<i class='fa fa-check fa-fw btn-success'></i> Available");
                                    $('#reg-sub').prop('disabled', false);
                                }
                            }
                        }); 
                        }
                });


            });
        </script>
    </body>
</html>