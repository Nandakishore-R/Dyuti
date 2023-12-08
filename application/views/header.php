<?php $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
  $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
  $this->output->set_header('Pragma: no-cache'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!--<title><?php echo $title; ?></title>-->
	<title>DYUTI-2024</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="description">  <!--content="<?php echo $mdesc; ?>"-->
	<meta name="keywords" >    <!--content="<?php echo $mkey; ?>"-->
	<meta name="author" content="Hege Refsnes">
	<link href="<?php echo $this->config->item('base_url')."assets/"; ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $this->config->item('base_url')."assets/"; ?>css/stylesheet.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="<?php echo $this->config->item('base_url')."assets/"; ?>images/dyutilogo.png"> 
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url')."assets/"; ?>css/demo.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url')."assets/"; ?>css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url')."assets/"; ?>css/custom.css" />
	<!-- Owl Carousel Assets -->
	<link href="<?php echo $this->config->item('base_url')."assets/"; ?>owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo $this->config->item('base_url')."assets/"; ?>owl-carousel/owl.theme.css" rel="stylesheet">

	<!-- date picker -->
    <link href="<?php echo $this->config->item('base_url')."assets/"; ?>datepicker/css/datepicker.css" rel="stylesheet">
    <!-- date picker End-->
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url')."assets/"; ?>admin/validation/css/validationEngine.jquery.css" type="text/css"/>
    
	<script type="text/javascript" src="<?php echo $this->config->item('base_url')."assets/"; ?>js/modernizr.custom.79639.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	
	<noscript>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url')."assets/"; ?>css/styleNoJS.css" />
	</noscript>
	        <?php 
        if($this->uri->segment(1) == "dashboard") { ?>
            <style type="text/css">
                #loader{display: none}
                #preview{display: none}
            </style>
             
        <?php } ?>
       

    <script type="text/javascript" src="<?php echo $this->config->item("base_url")."assets/" ?>js/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideoTransitions = [
              [{b:5500,d:3000,o:-1,r:240,e:{r:2}}],
              [{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],
              [{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],
              [{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],
              [{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('<?php echo $this->config->item("base_url")."assets/" ?>images/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('<?php echo $this->config->item("base_url")."assets/" ?>images/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
    </style>