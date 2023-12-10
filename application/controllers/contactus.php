<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$this->load->helper('captcha');
	}

	function index()
	{
		$seo 								=	$this->Seo->getSeoVariables("contactus");
		$data['title'] 						=	$seo->mtitle;
		$data['mkey'] 						=	$seo->mkey;
		$data['mdesc'] 						=	$seo->mdesc;

		$values = array(
                'word' 					=> '',
                'word_length' 			=> 8,
                'img_path' 				=> './images/',
                'img_url' 				=>  base_url() .'images/',
                'font_path'  			=> base_url() . 'system/fonts/texb.ttf',
                'img_width' 			=> '150',
                'img_height' 			=> 35,
                'expiration' 			=> 3600
               );

		$cap 							=	create_captcha($values);
        $data['captcha'] 				= 	$cap;
        $u_value['captchaWord'] 		=	$cap['word'];
		$this->session->set_userdata($u_value);

		$this->load->view('contactus',$data);
	}

	public function captcha_refresh(){
            $values = array(
                'word' 				=> '',
                'word_length' 		=> 8,
                'img_path' 			=> './images/',
                'img_url' 			=>  base_url() .'images/',
                'font_path'  		=> 	base_url() . 'system/fonts/texb.ttf',
                'img_width' 		=> '150',
                'img_height' 		=> 35,
                'expiration' 		=> 3600
               );
            $data = create_captcha($values);
            $u_value['captchaWord'] 		=	$data['word'];
			$this->session->set_userdata($u_value);
            echo $data['image'];
      } 


      function sendMessage()
       {

       	$emailid	 			=	$this->input->post("emailid");
		$mobile	 				=	$this->input->post("mobile");
		$subject	 			=	$this->input->post("subject");
		$username	 			=	$this->input->post("username");
		$captcha 				=	$this->input->post('captcha');
		$or_captcha 			=	$this->session->userdata('captchaWord');
		if (strcasecmp($or_captcha, $captcha) == 0 && $emailid <> "" && $mobile <> "" && $subject <> "" && $username <> "") {
			$message   = "
<html><body style='border:1px solid #CCC;padding:15px;border-radius:5px; width:70%;'>

<h3 style='color:#333333;font-size:22px;'><img src='".$this->config->item('base_url')."assets/images/admin_logo.png'> Enquiry from Dyuti 2017</h3>
<table>

<tr><td style='border:1px solid #CCC; padding:8px; background-color:#03Af9A;min-width:150px;'><p style='color:#fff;font-size:15px;'><strong>Name</strong></p></td><td style='background-color: #f4f4f4;padding:8px;min-width:216px; font-size:12px;'> ".$username." </td></tr>
<tr><td style='border:1px solid #CCC; padding:8px;background-color:#03Af9A;min-width:150px;'><p style='color:#fff;font-size:15px;'><strong>E-mail Address</strong></p></td><td style='background-color: #f4f4f4;padding:8px;min-width:216px; font-size:12px;'> ".$emailid."</td></tr>

<tr><td style='border:1px solid #CCC; padding:8px;background-color:#03Af9A;min-width:150px;'><p style='color:#fff;font-size:15px;'><strong>Phone</strong></p></td><td style='background-color: #f4f4f4;padding:8px;min-width:216px;font-size:12px; font-size:12px;'> ".$mobile."</td></tr>


<tr><td style='border:1px solid #CCC; padding:8px;background-color:#03Af9A;min-width:150px;'><p style='color:#fff;font-size:15px;'><strong>Message</strong></p></td><td style='background-color: #f4f4f4;padding:8px;min-width:216px;line-height:22px; font-size:12px;'> ".$subject."</td></tr><br/><br/>
</table>


</body></html>


";

		$this->load->library('email');

		$this->email->set_mailtype("html");

		$this->email->from("info@dyuti.in","Garymark Infotech");

		$this->email->to('dyuti@rajagiri.edu');

		$this->email->subject('Contact '.$username.' On '.date("d/m/Y").'');

		$this->email->message($message);
		if($this->email->send())
		{
			echo "<div class='alert alert-success'>Thank you for Contacting Us. we shall get back to you shortly.</div>";
		} else{
			echo "<div class='alert alert-danger'>Mail not send.</div>";
		}
		} else {
			echo "<div class='alert alert-warning'>Wrong Captcha.</div>";
		}
       }

}