

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
 
 
        <!-- slider -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <img src="<?php echo $this->config->item('base_url')."assets/"; ?>images/attraction/attraction_bnr_02.jpg" class="img-responsive center-block" alt="kochi_banner">
                </div> 
            </div>
        <!---->

<div class="content-wrapper">
<section class="filter-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">


                <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orgnzd_hd">
                            <h1> DYUTI THROUGH THE YEARS </h1>
                        </div>
                    </div>
           
                <div class="filter-container isotopeFilters">
                    <ul class="list-inline filter">
                        <!-- <li class="active"><a href="#" data-filter="*" class="btn btn-primary galbtn">All </a><span></span></li> -->
                        <?php /* foreach ($gallery as $key => $value) { ?>
                             <li><a href="#" data-filter=".<?php echo $value['slug']; ?>" class="btn btn-primary galbtn"><?php echo $value['catname']; ?></a><span> </span></li>
                        <?php } */ ?> 
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>


<section class="portfolio-section port-col">
    <div class="container">
        <div class="row">
            <div class="isotopeContainer">
            

            <?php foreach ($gallery as $key => $value) { 

                foreach ($value['catImages'] as $key1 => $value1) { ?>
                    
               

            <div class="col-sm-3 isotopeSelector <?php echo $value['slug']; ?>">
                    <figure>
                        <img src="<?php echo $this->config->item('base_url')."uploads/gallery/".$value1->image; ?>" alt="">
                        <div class="overlay">
                            <div class="inner-overlay">
                                <div class="inner-overlay-content with-icons">
                                    <a title="<?php echo $value1->image_name; ?>" class="fancybox-pop " href="<?php echo $this->config->item('base_url')."uploads/gallery/".$value1->image; ?>" data-fancybox-group="portfolio_1">
                                    <i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </figure>
                    <div class="article-title"><a href="#"><?php echo $value1->image_name; ?></a></div>
            </div>

            
            <?php }  } ?> 
           
            
            </div>
        </div>
    </div>
</section>
</div>



<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>
<script src="<?php echo $this->config->item('base_url')."assets/plugin_gallery/"; ?>js/isotope.min.js"></script>
<script src="<?php echo $this->config->item('base_url')."assets/plugin_gallery/"; ?>js/jquery.fancybox.pack.js"></script>
<script src="<?php echo $this->config->item('base_url')."assets/plugin_gallery/"; ?>js/main.js"></script>
</body>
	</html>