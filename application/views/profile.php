<?php include("header.php"); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url')."assets/plugin_gallery/"; ?>css/jquery.fancybox.css">
<link rel="stylesheet" href="<?php echo $this->config->item('base_url')."assets/plugin_gallery/"; ?>css/styles.css">
</head>
<body>
    <div class="container demo-2 logohd">
       <?php include("logo_head.php"); ?>
       <?php include("menu_head.php"); ?>
   </div>
   <!---->
   <!--About Dyuti-->
 


  <div class="content-wrapper">
    <div class="row">
                        
                        
                        
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                                    <span id="profilephoto">
                                        <?php if($userdata->image) { ?> 
                                        <img src="<?php echo $this->config->item("base_url")."uploads/userprofile/".$userdata->image; ?>" alt="icon" class="img-responsive profile_pic img-circle" style="height:200px;">
                                        <?php } else { ?>
                                            <img src="<?php echo $this->config->item("base_url"); ?>assets/images/profile_03.png" alt="icon" class="img-responsive profile_pic img-circle" style="height:200px;">
                                        <?php } ?>
                                    </span>
                                        <span class="changep" data-toggle='modal' data-target='#galModal'><i class="fa fa-camera fa-fw"></i>Change Photo</span> 
                                        <span class="removep"><i class="fa fa-trash fa-fw"></i> Remove Photo</span>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 profile">
                                        <ul>
                                            <li><h2><?php echo $userdata->first_name." ".$userdata->last_name;; ?></h2></li>
                                            <li><h4><?php echo $userdata->phone; ?></h4></li>
                                            <li><h4><?php echo $userdata->email; ?></h4></li>
                                            <li><h4><?php $dob = strtotime($userdata->dob); echo date("d M Y") ; ?></h4></li>
                                            <li><h4><?php echo $userdata->company; ?></h4></li>
                                            <li><h4><?php echo $userdata->address; ?></h4></li>
                                            <li><h4><?php echo $userdata->city. " , ". $userdata->state." , ".$userdata->country; ?></h4></li> 
                                       </ul>
                                       <a href="<?php echo $this->config->item("base_url")."dashboard/editprofile" ?>"><span class="profilechnage"><i class="fa fa-pencil fa-fw"></i>Change Profile</span></a>
                                 </div>
                                 </div>
                                <div class="row block-sec"> 
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 center-block">
                                 <div class="col-md-12 abstract">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 icn">
                                        <i class="fa fa-pencil-square-o fa-2x"></i>
                                    </div>
                                    <?php if(!$abstatus) {?> 
                                    <a href="<?php echo $this->config->item("base_url")."dashboard/addabstract" ?>">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <h3>Abstract Submission</h3>
                                        <p>Submit your abstract to any of the mentioned tracks. All related abstracts are accepted.</p>
                                    </div></a>
                                    <?php } else { 
                                        if($abStatusId==0){ 
                                        ?>
                                        <a href="<?php echo $this->config->item("base_url")."dashboard/editabstract" ?>">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <h3>Edit Abstract</h3>
                                        <p>If you want to make any changes in your submitted abstract. Please do it now.</p>
                                    </div></a>
                                    <?php } else { ?>
                                        <a href="<?php echo $this->config->item("base_url")."dashboard/viewabstract" ?>">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <h3>View Abstract</h3>
                                        <p>Abstract Updation has been disabled.View your abstract submitted to Dyuti 2017.</p>
                                    </div></a>
                                    <?php } } ?>

                                 </div>
                                 </div>

                                 <?php if($userdata->payment_status==0){ ?>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 center-block ">
                                  <div class="col-md-12 payment" data-toggle="modal" data-target="#paymentData">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 icn">
                                        <i class="fa fa-money fa-2x"></i>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <h3>Make a Payment</h3>
                                        <p>Developmental Yearning for a United and Transformed India Rajagiri with its vision</p>
                                    </div>
                                    </div>
                                 </div>
                                 <?php } ?>

                              </div>
                            </div>
                            
                            
                            
                                  <!-- Make a Payment -->
  <div class="modal fade" id="paymentData" role="dialog">

                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    
                                                    <div class="modal-header payment-head">
                                                        <ul class="nav nav-tabs nav-payment">
                                                            <li class="active"><a data-toggle="tab" href="#op">Online Payment</a></li>
                                                            <li><a data-toggle="tab" href="#ddp">Demand Draft Payment</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                                     
                                                    <div class="tab-content">

                                                                    <div id="op" class="tab-pane fade in active">
                                                                        <p>Please use below information for transferring registration fee through online<br/><br/></p>
                                                                        <p><b>Account Name    :</b> Rajagiri College of Social Sciences.</p>
                                                                        <p><b>Account Number :</b>        0224053000005056</p>
                                                                        <p><b>Bank Name :  </b>      South Indian Bank Ltd.</p>
                                                                        <p><b>Branch Name  : </b>   Kalamassery South branch, Cochin, Kerala</p>
                                                                        <p><b>IFSC :   </b>               SIBL0000224</p>
                                                                        <p><b>Swift Code  :</b>   SOININ55</p>
                                                                    </div>
                                                                    <div id="ddp" class="tab-pane fade">
                                                                    <p>Please take a demand draft from a bank and share the details with us.</p>
                                                                    </div>

                                                    </div>
                                                                    
                                                                
                                                             
                                                         <div class="modal-footer paybtm">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          </div>
                                                         
                                                    </div>


                                                </div>

                                            </div>
                                        
                                        </div>



                            
                            
                            
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ntfctn_hd ntfctn">
                                        <div class="row">
                                            <h2>Notification</h2>
                                        </div>
                                    </div>

                                    <?php if($noti){foreach ($noti as $key => $value) { ?>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 notification_bg white-back">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <i class="fa fa-calendar datedis"></i><?php echo date("h:i A",strtotime($value->alert_time)); ?><br/><?php echo date("d M Y",strtotime($value->alert_time)); ?>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 notification">
                                            <?php echo substr($value->message,0,89); ?>
                                        </div>
                                    </div>
                                    <?php  } }  else {?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-warning">
                                        No notifications !!
                                        </div>
                                    <?php } ?>
                                    
                                    <div class="row">
                                    <a href="<?php echo $this->config->item("base_url")."dashboard/notifications"; ?>"><button class="btn btn-success viewmore">view all >></button> </a>
                                    </div>


                                </div>
                            </div>
                        </div>
  </div>




<!--Add Product Gallery -->
<div id="galModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">UPDATE PHOTO</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row clear-fix">
                            <div class="col-md-12">
                                <div id="response">

                                </div>  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <?php echo form_open_multipart($imgaction); ?>
                        <div class="form-group">
                            <input type="hidden" name="imid" id="imid">
                            <label for="">Choose image (275 X 275)</label>
                            <input type="file" name="userfile" id="userfile">
                        </div>
                        <div class="form-group">
                            <button class="btn-success btn" type="submit">Save</button>
                        </div>
                        <div class="form-group">
                            <i id="loader" class="fa fa-spinner fa-spin"></i>
                        </div>
                        <div class="form-group">
                            <img id="preview" src="#" style="height: 80px;border: 1px solid #DDC; " />
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-sm-6">
                        <div style="margin-top: 1%;">

                            <ul class="list-inline"  id="gallery">

                            </ul>

                        </div>  
                    </div>

                </div>

 

            </div>

            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>


  <?php include("footer.php"); ?>
  <?php include("footer_script.php"); ?> 

<script src="<?php echo $this->config->item('base_url').'assets/admin/js/jquery.form.min.js'; ?>"></script>
<script>
    $(document).ready(function (){
        $(document).on("click", ".changep", function () 
        {
            loadgallery();
        });
        $(document).on("click", ".removep", function () 
        {
            $.ajax({
                url   : '<?php echo $this->config->item('base_url').'dashboard/removePhoto'; ?>',
                type  : 'POST'
            }).done(function (data){
                $("#profilephoto").html(data);
            $("#profilephoto").html(data);
            });
        });
         
        function readURL(input) {
            $("#preview").show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#userfile").change(function(){
            readURL(this);
        });
        $('form').ajaxForm({
            beforeSend: function() {
                $("#loader").show();
            },
            complete: function(xhr) {
                $(".modal-body #response").html(xhr.responseText);
                $("#loader").hide();
                $("#preview").hide();
                $('form').resetForm(); 
                loadgallery();
                setTimeout(function(){ $('#galModal').modal('hide'); },1000);
                setTimeout(function(){ $(".alert").hide();} ,1500);
            }
        }); 

        function  loadgallery(){ 
            $.ajax({
                url   : '<?php echo $this->config->item('base_url').'dashboard/fillGallery'; ?>',
                type  : 'POST'
            }).done(function (data){
                /*$(".modal-body #gallery").html(data);*/
                $("#profilephoto").html(data);
                var btnDelete  = $(".modal-body #gallery").find($(".btn-delete"));
                (btnDelete).on('click', function (e){
                    e.preventDefault();
                    var id = $(this).attr('id');
                    $("#"+id+"g").hide();
                    $.ajax({
                        url:'<?php echo $this->config->item('base_url').'dashboard/deleteimg'; ?>',
                        data:'id='+id,
                        type:'POST'
                    }).done(function (data){
                        $(".modal-body #response").html(data);
                        setTimeout(function(){ $(".alertOne").hide();} ,2000); 
                    });
                });

            });
        }

    });


</script>


</body>
</html>