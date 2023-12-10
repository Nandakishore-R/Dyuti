<?php include("header.php"); ?>
</head>
<body>
    <div class="container demo-2 logohd">


     <?php include("logo_head.php"); ?>
     <?php include("menu_head.php"); ?>


        <!-- slider -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <img src="<?php echo $this->config->item('base_url')."assets/"; ?>images/cmng_sn_02.jpg" class="img-responsive center-block" alt="college_banner">
                </div>
                <div class="row">
                    <div class="sl-slide-inner col-md-12">
                        <h2 class="coming-text"> Coming Soon .. </h2>
                    </div>
                </div>

            </div>
        <!---->
        <?php include("organizedby.php"); ?>

        <?php include("international_partners.php"); ?>

</div>



<div class="content-wrapper"> </div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>

</body>
</html>