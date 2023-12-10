<?php include("header.php"); ?>
</head>
<body>
    <div class="container demo-2 logohd">


     <?php include("logo_head.php"); ?>
     <?php include("menu_head.php"); ?>

        <!-- slider -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <img src="<?php echo $this->config->item('base_url')."assets/"; ?>images/attraction/attraction_bnr_02.jpg" class="img-responsive center-block" alt="kochi_banner">
                </div> 
            </div>
        <!---->


            <!-- ATTRACTION -->
            <section>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orgnzd_hd">
                            <h1> NEWS & EVENTS </h1>
                        </div>
                    </div>
                    <div class="row">

                        <p><br/>The conference invites conceptual as well as empirical papers on any of the sub-themes proposed. All papers should be of original work and not have been previously published nor have been presented or be in consideration for any journal, book, conference or workshop.
</p>
<br>
<p>Conference Brochure: <a href="<?php echo $this->config->item('base_url')."pdf/"; ?>DYUTI 2021 - Brochure.pdf">Click here to View/ Download</a></p>
                        
                    </div>
                </div>
            </section>
  


    
        <?php /* include("organizedby.php"); */?>

        <?php /*include("international_partners.php"); */?>


</div>



<div class="content-wrapper"> </div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>

</body>
</html>