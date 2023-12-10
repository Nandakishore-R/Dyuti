<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="GaryMark Infotech" content="yes">
    <meta name="GaryMark Infotech" content="yes">
    <meta name="GaryMark Infotech" content="Outline Admin Theme">
    <meta name="author" content="GaryMark Infotech">

    <link type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600' rel='stylesheet'>

    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/fonts/themify-icons/themify-icons.css" rel="stylesheet">              <!-- Themify Icons -->
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/fonts/weather-icons/css/weather-icons.min.css" rel="stylesheet">      <!-- Weather Icons -->
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>assets/admin/css/styles-alternative.css" id="theme">             <!-- Default CSS: Altenate Style -->
    <link rel="prefetch alternate stylesheet" href="<?php echo $this->config->item('base_url');?>assets/admin/css/styles.css">                 <!-- Prefetched Secondary Style -->
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->

    <!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/respond.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
        <![endif]-->
        <!-- The following CSS are included as plugins and can be removed if unused-->

        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 						<!-- FullCalendar -->
        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"> 			<!-- jVectorMap -->
        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/switchery/switchery.css" rel="stylesheet">   							<!-- Switchery -->
        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/charts-chartistjs/chartist.min.css" rel="stylesheet"> 					<!-- Chartist -->

        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/datatables/dataTables.themify.css" rel="stylesheet">
        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet"> <!-- Touchspin -->
        <script src="<?php echo $this->config->item('base_url');?>assets/admin/validation/js/jquery.js"></script>        
        <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>assets/admin/validation/css/validationEngine.jquery.css" type="text/css"/>

        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.css" rel="stylesheet">   <!-- Tokenfield -->
        <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/scroll/css/style.css" rel="stylesheet">

        <?php 
        if($this->uri->segment(2) == "gallery" && $this->uri->segment(3) == "") { ?>
            <style type="text/css">
                #loader{display: none}
                #preview{display: none}
            </style>
             <script src="<?php echo $this->config->item('base_url').'assets/admin/js/jquery.form.min.js'; ?>"></script>
        <?php } else { ?>

            <script>
                $(document).ready(function(){
                    $("form").validationEngine();
                });
            </script>
             <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script> -->
        <?php } ?>
        <?php if($this->uri->segment(2) == "programs" && $this->uri->segment(3) == "view") { ?>
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" media="screen" /> -->
    <link href="<?php echo $this->config->item("base_url").'assets/plugin_timepick/pygments.css'; ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo $this->config->item("base_url").'assets/plugin_timepick/prettify.css'; ?>" type="text/css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="<?php echo $this->config->item("base_url").'assets/plugin_timepick/timepicker.less'; ?>" />
        <?php  } ?>
       
        
        
        

    </head>

    <body class="animated-content">