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
            <h4 class="col-md-6">ABSTRACT</h4>
            <a href="<?php echo $this->config->item("base_url"); ?>dashboard"><h4 class="col-md-6 prof-edit"><i class="fa fa-user fa-fw"></i>My Profile</h4></a>
        </div></div>
 

    
                <div class="row well">
                    <div class="col-md-12">
                    <div class="row top-head">
                        <div class="col-md-6">
                            <?php strtotime($abstract->submission_date); echo date("d M Y"); ?> 
                        </div> 
                        <div class="col-md-6 pull-right cat-title">
                            <?php echo $abstract->cattitle; ?> 
                        </div> 

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="ab_title"><?php echo $abstract->abtitle; ?></h3>
                        </div> 
                    </div>
 
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $abstract->ab_content; ?>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-12 tags">
                            <?php echo $abstract->tags; ?>
                        </div> 
                    </div>

                </div>
                </div><!-- well end -->
             

    </div>
</section>
</div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>

 

</body>
</html>