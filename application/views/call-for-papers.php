<?php include("header.php"); ?>
<style>
     .custom-button {
      width: 300px; /* Adjust the width as needed */
      padding: 15px;
      background-color: #dc3545; /* Red color */
      color: #fff; /* White text color */
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
</style>
</head>
<body>
    <div class="container demo-2 logohd">


     <?php include("logo_head.php"); ?>
     <?php include("menu_head.php"); ?>

        <!-- slider -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <img src="<?php echo $this->config->item('base_url')."assets/"; ?>images/pic.png" class="img-responsive center-block" alt="Call for papers">
                </div> 
            </div>
        <!---->


        <!-- call for paper -->
        <section>
           <div class="content-wrapper">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orgnzd_hd">
                        <h1> CALL FOR PAPERS </h1>
                    </div></div>
            
            <div class ="panel-group" id = "accordion">
              
              <!-- <p class="btn-abstract top-bt">
       <a href="<?php echo $this->config->item("base_url")."registration"; ?>"> -->
        <!--<a href="https://forms.gle/4np1nJLdQutwUSxv5" target="_blank">
      <i class="fa fa-file fa-fw"></i> SUBMIT ABSTRACT</a>
      </p>-->

                <p><br/>Abstracts based on original research and
practice models are invited for the following<br><br>
• Oral Presentation<br>
• Poster Presentation<br>
</p>
<br>
<p><b>Conference Brochure:</b> <a href="<?php echo $this->config->item('base_url')."pdf/"; ?>DYUTI 2024 Brochure.pdf" target = "_blank">Click here to View/ Download</a></p>
<br>
<h3>Publication</h3>
  <p>Selected papers presented at the
conference may be considered
for publication in <b>Scopus-indexed
journals</b> proceedings after due
review process.</p>
<br>
  <h2>Guidelines for Abstract</h2>
                <ul class="cal_ul">
                <li class="cal_lst"><i class="fa fa-circle fa-fw"></i>
                    The abstract should be within 300 words
                    of text including the title and keywords (MSWord Doc.)</li>
                  <li class="cal_lst"><i class="fa fa-circle fa-fw"></i>
                  The text should be arranged according tothe following headlines: Objectives,
                   Design, Model, Result and conclusion.</li>
                      <li class="cal_lst"><i class="fa fa-circle fa-fw"></i>
                      The abstract’s title page should include the paper’s title, Author’s
                       name, designation, institution affiliation, mailing address,
                      contact number and email id.</li>
                      <li class="cal_lst"><i class="fa fa-circle fa-fw"></i>
                      It is essential that you specify the Theme and Subtheme to which your abstract
                      pertains when submitting it.
                      </li>
                    <!--      <li class="cal_lst"><i class="fa fa-play fa-fw"></i>Intersectional Inequalities in Indian Education: Challenges and Lessons</li>-->
                    <!--<li class="cal_lst"><i class="fa fa-play fa-fw"></i> Social Work in Equitable and Inclusive Education: Setting the Tone for Professional Practice </li>-->
                    <!--<li class="cal_lst"><i class="fa fa-play fa-fw"></i>Organisational Responses in Equitable Access to Education: Case Studies from the Social Development Sector</li>-->
                 <!-- <li class="cal_lst"><i class="fa fa-play fa-fw"></i> Volunteerism among social workers/ students during covid-19</li>
                   <li class="cal_lst"><i class="fa fa-play fa-fw"></i> Social Work Research responses during COVID- 19</li>
                    <li class="cal_lst"><i class="fa fa-play fa-fw"></i> 	COVID-19 crisis and beyond:  challenges  for sustainable  public policies</li> -->
                      
                </ul> 
              

              <h3 class="sub-head">Important Dates & Deadlines</h3>
              <table class="table table-bordered">
                <tbody>
                  <tr><td class="td1cls">Last Date of Abstract Submission</td><td>
                  15th December 2023</td></tr>
                  <!--<tr><td>Acceptance of Abstract</td><td>10th  December 2019</td></tr>-->
                  <tr><td>Last Date of Full Paper Submission</td><td>
                  20th December 2023</td></tr>
                   
                </tbody>
              </table>
              


 <!--             <h3 class="sub-head">Registration Fees</h3>-->
 <!--             <table class="table table-bordered">-->
             
 <!--               <tbody>-->
                 
 <!--                 <tr><td class="td1cls">Professionals / Academicians / Practitioners</td><td><i class="fa fa-inr" aria-hidden="true"></i> 900</td></tr>-->
                  
 <!--<tr><td class="td1cls">Students / Research Scholars</td><td><i class="fa fa-inr" aria-hidden="true"></i> 600</td></tr>-->

                     
 <!--               </tbody>-->
 <!--             </table>-->

              <h3 class="sub-head">Mode of Payment</h3>


<table class="table table-bordered">
              
               <tbody>
                 <tr><td class="td1cls">Account Name:  </td><td style="font-weight:bold;">Rajagiri College of Social Sciences, Kalamassery</td></tr>
                 <tr><td class="td1cls">Account No:</td><td style="font-weight:bold;">0224053000005056</td></tr>
                 <tr><td class="td1cls">Bank:</td><td style="font-weight:bold;">South Indian Bank</td>
                 <tr><td class="td1cls">IFSC/NEFT Code:</td><td style="font-weight:bold;">SIBL0000224</td>
                  
                 </tr>
                     
                        
               </tbody>
</table>
<div style = "text-align : center;margin: 50px 0;">
<a href="https://cmt3.research.microsoft.com/RajagiriSDG2024" class="custom-button">CLICK HERE TO SUBMIT</a>
</div>


          <!--    <h3 class="sub-head">Major Sub themes of the Conference</h3>
              <p>The conference invites responses of the Social Work profession to address health needs of the elderly, in domains of direct service, administration of services and policies.</p>
               
      <?php foreach ($themes as $key => $value) { if($key % 2 ==0) {$clz = "panel-heading2"; } else { $clz = "panel-heading";} ?>
            <div class = "panel panel-default">
              <div class = "<?php echo $clz; ?>">
                 <h4 class = "panel-title"><?php echo $value->title; ?></h4>
                  <button data-toggle="collapse" data-parent ="#accordion" data-target= "#collapse<?php echo $value->id; ?>" class="more_btn3 pull-right">MORE >></button> 
              </div>
              
              <div id = "collapse<?php echo $value->id; ?>" class = "panel-collapse collapse" >
                 <div class = "panel-body bodydesc"><?php echo $value->description; ?></div>
              </div>
              
           </div>
      <?php } ?>      

      <p class="btn-abstract">
        <a href="<?php echo $this->config->item("base_url")."registration"; ?>"> <i class="fa fa-file fa-fw"></i> SUBMIT ABSTRACT</a>
      </p>-->
</div>


 



</div></section>
            
        <!---->

    
        <?php include("organizedby.php"); ?>

        <?php /*include("international_partners.php");*/ ?>


</div>



<div class="content-wrapper"> </div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>

</body>
</html>