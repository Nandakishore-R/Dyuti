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
                            <h1> ATTRACTION </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pdng">
                            <a class="touristplc" target="_blank" href="https://www.tripadvisor.in/Attractions-g297631-Activities-Kerala.html">10 Best Places to Visit in Kerala</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pdng">
                            <a class="touristplc" target="_blank" href="https://www.keralatourism.org/destination/">Tourist Destinations of Kerala. Category listing page | Kerala Tourism</a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pdng">
                            <a class="touristplc" target="_blank" href="https://www.keralatourism.org/">Welcome to Kerala Tourism </a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pdng">
                            <a class="touristplc" target="_blank" href="http://www.keralatourism.com/">Kerala Tourism - Promoting Kerala | Gods own Country</a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pdng">
                            <a class="touristplc" target="_blank" href="https://www.tripadvisor.in/Attractions-g297633-Activities-Kochi_Cochin_Kerala.html">10 Best Places to Visit in Kochi</a>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pdng">
                            <a class="touristplc" target="_blank" href="http://paradise-kerala.com/blog/9-must-see-places-near-kochi/">19 Must See Places Near Kochi</a>
                        </div> 





                    <?php foreach ($attractions as $key => $value) { if($key%2==0){ ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdng">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <img src="<?php echo $this->config->item('base_url')."uploads/attractions/".$value->image; ?>" class="img-responsive" alt="<?php echo $value->title; ?>"> 
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h3 class="place_hd"><?php echo $value->title; ?></h3>
                                <p class="dtils"><?php echo $value->description; ?></p>
                            </div>
                        </div>
                    <?php } else { ?>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdng">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h3 class="place_hd"><?php echo $value->title; ?></h3>
                                <p class="dtils"><?php echo $value->description; ?></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <img src="<?php echo $this->config->item('base_url')."uploads/attractions/".$value->image; ?>" class="img-responsive pull-right" alt="<?php echo $value->title; ?>">
                            </div>
                        </div>

                    <?php } }  ?>
                        
                    </div>
                </div>
            </section>
        <!---->


    

        <?php /*include("international_partners.php");*/ ?>


</div>



<div class="content-wrapper"> </div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>

</body>
</html>