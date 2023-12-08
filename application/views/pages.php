<?php include("header.php"); ?>
</head>
<body>
    <div class="container demo-2 logohd">


     <?php include("logo_head.php"); ?>
     <?php include("menu_head.php"); ?>
        
        <?php if($output['page_name'] != 'VENUE') { ?>
        
        <?php if($output['banner_image']) {?>
        <!-- slider -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <img src="<?php echo $this->config->item('image_url')."pages/banner/".$output['banner_image']; ?>" class="img-responsive">
                </div> 
            </div>
        <!---->
        <?php }} else { ?>
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7858.580772519675!2d76.35041687745698!3d9.992854671084688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080ca4749dfc7d%3A0xcc847e920764c1ac!2sRajagiri+Centre+for+Business+Studies!5e0!3m2!1sen!2sin!4v1542790576949" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
   <?php } ?>
   <!-- ATTRACTION -->
            <section>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orgnzd_hd">
                            <h1> <?php echo $output['page_name']; ?> </h1>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdng">
                    	<?php echo $output['description']; ?>
                    </div>
                        
                    </div>
                </div>
            </section>
        <!---->


    


</div>



<div class="content-wrapper"> </div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>

</body>
</html>