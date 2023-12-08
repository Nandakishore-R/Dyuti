<?php include("header.php"); ?>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/ckeditor/ckeditor.js"></script>
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
            <h4 class="col-md-6">NOTIFICATIONS</h4>
            <a href="<?php echo $this->config->item("base_url"); ?>dashboard"><h4 class="col-md-6 prof-edit"><i class="fa fa-user fa-fw"></i>My Profile</h4></a>
        </div></div>
        <div class="row reg-resp"></div>

        <div class="row ">
             <?php if($notis){ foreach ($notis as $key => $value) { ?>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 notification_bg white-back">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <i class="fa fa-calendar datedis"></i><?php echo date("h:i A d M Y",strtotime($value->alert_time)); ?> 
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 notification">
                                            <?php echo $value->message; ?>
                                        </div>
                                    </div></div><div class="row">
           <?php  } } else {?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-warning">
              No notifications !!
            </div>
            <?php } ?>
        </div>

    </div>
</section>
</div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>


 

</body>
</html>