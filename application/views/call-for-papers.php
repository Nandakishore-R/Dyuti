<?php include("header.php"); ?>
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

                <p><br/>The conference invites conceptual as well as empirical papers on any of the sub-themes proposed. All papers should be of original work and not have been previously published nor have been presented or be in consideration for any journal, book, conference or workshop.
</p>
<br>
<p>Conference Brochure: <a href="<?php echo $this->config->item('base_url')."pdf/"; ?>DYUTI 2024 Brochure.pdf">Click here to View/ Download</a></p>

<br>
  <h2> Sub-themes</h2>
                <ul class="cal_ul">
                <li class="cal_lst"><i class="fa fa-play fa-fw"></i>Investment for Health</li>
                  <li class="cal_lst"><i class="fa fa-play fa-fw"></i>Social Responsibility for Health</li>
                      <li class="cal_lst"><i class="fa fa-play fa-fw"></i>Health Promotion Strategies</li>
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
                  <tr><td class="td1cls">Abstract submission last date</td><td>10 November 2022</td></tr>
                  <!--<tr><td>Acceptance of Abstract</td><td>10th  December 2019</td></tr>-->
                  <tr><td>Final paper submission</td><td>01 December 2022</td></tr>
                   
                </tbody>
              </table>


 <!--             <h3 class="sub-head">Registration Fees</h3>-->
 <!--             <table class="table table-bordered">-->
             
 <!--               <tbody>-->
                 
 <!--                 <tr><td class="td1cls">Professionals / Academicians / Practitioners</td><td><i class="fa fa-inr" aria-hidden="true"></i> 900</td></tr>-->
                  
 <!--<tr><td class="td1cls">Students / Research Scholars</td><td><i class="fa fa-inr" aria-hidden="true"></i> 600</td></tr>-->

                     
 <!--               </tbody>-->
 <!--             </table>-->

<!--               <h3 class="sub-head">Mode of Payment</h3>-->
<!--                <ul style="padding-left:15px;">-->
<!--                <li>At Par Cheque/Bank Demand Draft /E – transfer transferred to the colleges account.</li>-->
<!--<li>The reference number of bank transfer/Demand Draft/E – transfer /At Par Cheque is to be quoted in the Registration form.</li>-->
<!--<li>The forms without reference numbers of transfer /DD will not be considered.</li>-->
<!--</ul>-->

<!--<table class="table table-bordered">-->
              
<!--                <tbody>-->
<!--                  <tr><td class="td1cls">Account Name:  </td><td style="font-weight:bold;">Rajagiri College of Social Sciences, Kalamassery</td></tr>-->
<!--                  <tr><td class="td1cls">Account No:</td><td style="font-weight:bold;">0224053000005056</td></tr>-->
<!--                  <tr><td class="td1cls">Bank:</td><td style="font-weight:bold;">South Indian Bank</td>-->
<!--                  <tr><td class="td1cls">IFSC Code:</td><td style="font-weight:bold;">SIBL0000224</td>-->
                  
                  
<!--                  </tr>-->
                  
<!--                   <tr><td class="td1cls">SWIFT CODE:</td><td style="font-weight:bold;">SOININ55</td>-->
                  
                  
<!--                  </tr>-->
                     
                        
<!--                </tbody>-->
<!--              </table>-->



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