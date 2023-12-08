<?php include("header.php"); ?>
</head>
<body>
    <div class="container demo-2 logohd">


       <?php include("logo_head.php"); ?>
       <?php include("menu_head.php"); ?>

       <!-- slider -->
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row google-maps">
           <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.564251254556!2d76.3125167147946!3d10.052769892815014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080dd2c4bfaed9%3A0x616d1c1cb927fe62!2sRajagiri+College+Of+Social+Sciences!5e0!3m2!1sen!2sin!4v1466771305023" width="1349" height="402" allowfullscreen></iframe> -->
           <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15716.98301807919!2d76.3596917!3d9.9965476!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1a26595e9a6ac9b8!2sRajagiri+Business+School!5e0!3m2!1sen!2sin!4v1468919398673" width="1349" height="402" frameborder="0" style="border:0" allowfullscreen></iframe> -->
           <!-- <div id="map" style="width:100%;height:500px;"></div>-->
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d982.1404590996202!2d76.31522646431681!3d10.052968558987565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080dd2c4bfaed9%3A0x616d1c1cb927fe62!2sRajagiri%20College%20of%20Social%20Sciences!5e0!3m2!1sen!2sin!4v1573194380765!5m2!1sen!2sin" width="1349" height="402" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d694.3646809247406!2d76.35574209792348!3d9.993886412091518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xffe403fa83187691!2sRajagiri%20College%20Of%20Social%20Sciences!5e0!3m2!1sen!2sin!4v1660152795214!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> 
    </div>
    <!---->

    <!-- RCSS -->
    <!-- Contact us -->
    <section>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orgnzd_hd">
                    <h1> CONTACT </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdng address">
                    <p>Rajagiri College of Social Sciences (Autonomous), Rajagiri Valley, Chittethukara, Ernakulam, Kerala 682030,India <br />
                        <i class="fa fa-envelope" aria-hidden="true"></i>   :  dyuti@rajagiri.edu   
                        <i class="fa fa-phone-square fa_icon" aria-hidden="true"></i>            :  +91 484-2911 346 , 2911 321     
                        <!-- <i class="fa fa-mobile fa_icon" aria-hidden="true"></i>         :  +91 8113031199 --></p>
                        <div class="pdng"></div>
                        <div id="message"></div>
                        <form id="contactform" method="post" role="form">

                            <div class="messages"></div>

                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your name " required data-error="Firstname is required.">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input id="phone" type="text" name="phone" class="form-control" placeholder="Please enter your phone number" required data-error="Lastname is required.">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input id="email" type="email" name="email" class="form-control" placeholder="Please enter your email " required data-error="Valid email is required.">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me " rows="4" required data-error="Please,leave us a message."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <?php 
                                        echo "<div class='image'>";
                                        echo $captcha['image'];  
                                        echo "</div>";?>
                                    </div>
                                    <div class="col-md-1">
                                       <?php 
                                       echo "<a class ='refresh'><img alt='refresh' id = 'ref_symbol' src =".$this->config->item('base_url')."assets/images/refresh.png></a>"; ?>
                                   </div>
                                   <div class="col-md-3">
                                    <?php
                                    $data_captcha = array(
                                        'name'          => 'captcha',
                                        'class'         => 'form-control',
                                        'placeholder'   => 'Captcha',
                                        'id'            => 'captcha',
                                        'required'      =>  'required'
                                        );
                                    echo form_input($data_captcha);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-success btn-lg btn-block btn-send" value="SEND">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!---->
    <!---->

  

    <?php /*include("international_partners.php");*/ ?>

</div>



<div class="content-wrapper"> </div>
<?php include("footer.php"); ?>
<?php include("footer_script.php"); ?>

<script type="text/javascript">

    $(document).ready(function()
    {
        $("a.refresh").click(function() 
        {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "contactus/captcha_refresh",
                success: function(res) {
                    if (res)
                    {
                      jQuery("div.image").html(res);
                  }
              }
          });
        });


        /*=================== Ajax Contact Form ===================*/
        $('#contactform').submit(function() {
            var count = 0;
            $('#contactform input').each(function(){

                if($(this).val() == '')
                {

                    $(this).css('border', '1px solid red');
                    count++;
                }

            });
            $('#contactform textarea').each(function(){

                if($(this).val() == '')
                {

                    $(this).css('border', '1px solid red');
                    count++;
                }

            });
            if(count == 0){
                var action = "<?php echo $this->config->item("base_url")."contactus/sendMessage"; ?>";
                $("#message").slideUp(750, function() {
                    $('#message').hide();
                    $(".btn-send").attr('value', "SENDING...");
                    $.post(action, {
                        username        : $('#form_name').val(),
                        emailid         : $('#email').val(),
                        mobile          : $('#phone').val(),
                        subject         : $('#form_message').val(),
                        captcha         : $('#captcha').val()
                    },
                    function(data) {
                        if (data.match('alert-success') != null){
                            $(".btn-send").attr('value', "SEND");
                            $('#contactform').slideUp('slow');
                            $("#message").html(data);
                            $('#message').slideDown('slow');
                            $('.btn-send').attr('disabled', 'disabled');
                            $('.btn-send').attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Sending...');
                        } else if(data.match('alert-warning') != null)
                        {
                            $(".btn-send").attr('value', "SEND");
                            $("#message").html(data);
                            $('#message').slideDown('slow');
                            $('#captcha').val("");
                        } else {
                            $(".btn-send").attr('value', "SEND");
                            $('#contactform')[0].reset();
                            $("#message").html(data);
                            $('#message').slideDown('slow');
                        }
                /*$("#message").html(data);
                $('#message').slideDown('slow');
                $('#contactform img.loader').fadeOut('slow', function() {
                    $(this).remove()
                });
                $('#submit').removeAttr('disabled').html('Submit Now');
                $('#contactform')[0].reset();*/

            }
            )

                    .fail(function() {
                        alert( "error" );
                    })
                });

            }
            return false;
        });

    });

</script>
 <script>
   function initMap(){
     // Map options


      var test= {lat: 10.052823, lng: 76.314562};
       var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 16,
         center: test
       });
       var marker = new google.maps.Marker({
         position: test,
         map: map
       });
var infowindow = new google.maps.InfoWindow({
 content:"Rajagiri Centre for Sustainable Livelihood RCSS"
 
});

google.maps.event.addListener(marker, 'click', function() {
 infowindow.open(map,marker);
});
     }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmW1vjErHZfU4af4BsucK6AeLgk1dajGg&callback=initMap">
    </script>
</body>
</html>