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
            <h4 class="col-md-6">ABSTRACT SUBMISSION</h4>
            <a href="<?php echo $this->config->item("base_url"); ?>dashboard"><h4 class="col-md-6 prof-edit"><i class="fa fa-user fa-fw"></i>My Profile</h4></a>
        </div></div>
        <div class="row reg-resp"></div>

        <form id="abs_form">
                <div class="row well">
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Abstract Category <span class="imp">*</span></label>
                            <select name="category" id="category" class="form-control validate[required]">
                                <option value="">--Select--</option>
                                <?php foreach ($category as $key => $value) { 
                                    if($value->id == $abData->category)
                                    {
                                        $sel    =   "selected='selected'";
                                    } else {
                                        $sel    = "";
                                    }
                                    echo "<option ".$sel." value='".$value->id."'>".$value->title."</option>";
                                } ?>
                            </select>
                        </div></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Abstract Title <span class="imp">*</span></label>
                            <input type="text" placeholder="Abstract Title" name="title" id="title" class="form-control validate[required]" value="<?php echo $abData->abtitle; ?>">
                        </div></div>
                    </div>
 
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Abstract Content <span class="imp">*</span></label>
                            <textarea rows="15" name="ab_content" id="ab_content" class="form-control validate[required]"><?php echo $abData->ab_content; ?></textarea>
                        </div></div> 
                    </div>  

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Keywords <span class="imp">*</span></label>
                            <textarea rows="3" name="tags" id="tags" class="form-control validate[required]" placeholder="Keywords"><?php echo $abData->tags; ?></textarea>
                        </div></div> 
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" class="btn sub-bt" id="abstract-sub">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div><!-- well end -->
            </form>

    </div>
</section>
</div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>


<script type="text/javascript">
    $(document).ready(function() {

        $("#abstract-sub").click(function()
        {
            var title               =   $("#title").val();
            var category            =   $("#category").val();
            var tags                =   $("#tags").val();
            var ab_content          =   $("#ab_content").val();
            /*var ab_content          =   CKEDITOR.instances['ab_content'].getData();*/
            dataString              =   "category="+category+"&title="+title+"&ab_content="+ab_content+"&tags="+tags;
            if($("form").validationEngine('validate'))
            {   
                if(ab_content != "") {
                $("#abstract-sub").html('Updating..');
                $.ajax({
                    data    :   dataString,
                    type    :   "POST",
                    url     :   "<?php echo $this->config->item('base_url')."dashboard/updateabstract"; ?>",
                    success : function(resp)
                    {
                        $(window).scrollTop($('.nav').offset().top);
                        $(".reg-resp").html(resp);
                        $("#abstract-sub").html('Submit');
                        /*CKEDITOR.instances['ab_content'].setData('');*/
                        setTimeout(function(){$(".reg-resp").html("")},4000);
                    }
                });
                } else {
                    $(".reg-resp").html("<div class='alert alert-danger'><strong>Error !</strong> Please add Abstract Content.</div>");
                    setTimeout(function(){$(".reg-resp").html("")},2000);
                }
            } 
        });
    });
</script>

</body>
</html>