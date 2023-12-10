<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends MX_Controller 
{
	public $tab_groups,$tab_details;
	function __construct()
	{
		parent::__construct(); 
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$this->load->model('Registrationmodel','Registration',TRUE);
	}

	function index()
	{
		$seo 				=	$this->Seo->getSeoVariables("home");
		$data['title'] 		=	$seo->mtitle;
		$data['mkey'] 		=	$seo->mkey;
		$data['mdesc'] 		=	$seo->mdesc;
		$data['country'] 	=	$this->Registration->getCountryList("");
		$this->load->view('registration',$data);
	}

	function insert()
	{
		$fname 								=	$this->input->post("first_name");
		$lname 								=	$this->input->post("last_name");
		$email 								=	$this->input->post("emailid");
		$this->tab_groups['first_name'] 	=	$fname;
		$this->tab_groups['last_name'] 		=	$lname;
		$this->tab_groups['email'] 			=	$email;
		$pass 								=	$this->input->post("password");
		$hasher 							=	new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		$hashPassword 						=	$hasher->HashPassword($pass);
		$this->tab_groups['password']		=	$hashPassword;
		$verificationCode  					= 	time().rand();
		$this->tab_groups['verification_key'] 	= 	$verificationCode;
		if($fname <> "" && $lname <> "" && $email <> "") {
		$this->db->insert("user_master",$this->tab_groups);

		$insertId 							=	$this->db->insert_id();
		$this->tab_details['user_id'] 		=	$insertId;
		$userTitle 							=	$this->input->post("title");
		$this->tab_details['title']			=	$userTitle;
		$datofbirth 						=	$this->input->post("dob");
		$this->tab_details['dob']			=	date('Y-m-d', strtotime($datofbirth));
		$this->tab_details['city']			=	$this->input->post("city");
		$this->tab_details['state']			=	$this->input->post("state");
		$this->tab_details['state']			=	$this->input->post("state");
		$this->tab_details['country']		=	$this->input->post("country");
		$this->tab_details['company']		=	$this->input->post("company");
		$this->tab_details['phone']			=	$this->input->post("phone");
		$this->tab_details['address']		=	$this->input->post("address");
		
		$this->tab_details['gender']		=	$this->input->post("gender");
		$this->tab_details['position']		=	$this->input->post("position");
		$this->tab_details['areap']		=	$this->input->post("areap");
		$this->tab_details['food']		=	$this->input->post("food");
		$this->tab_details['accomodation']		=	$this->input->post("accomodation");
		$this->tab_details['category']		=	$this->input->post("category");
		
		
		$this->db->insert("user_details",$this->tab_details);
		$this->sendVerificationCode($this->tab_groups,$userTitle);
		echo "<div class='col-md-12 well'><div class='alert alert-success'><strong>Success ! </strong>Profile registered successfully . Kindly check your email for activation link.</div></div>";
		} else {
			echo "<div class='col-md-12 well'><div class='alert alert-error'><strong>Error ! </strong>Please fill all fields.</div></div>";
		}	
	}

	function checkEmail()
	{
		$email 	=	$this->input->post("emailid"); 
		$resp 	=	$this->Registration->emailNotExist($email);
		if ($resp) {
			echo 1;
		} else
		{
			echo 0;
		}
	}




	function sendVerificationCode($user,$userTitle)
	{
			$message 	=	'<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">  
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:654px;">
				<tbody>
					<tr>
						<td width="10" bgcolor="#F9F9F9" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
						<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#F9F9F9;padding:0;margin:0">
							<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="'.$this->config->item("base_url").'" target="_blank">
								<img border="0" src="'.$this->config->item("base_url").'assets/images/Duty_lgo.png" alt="Dyuti" style="border:none">
							</a>
						</td>
						<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#F9F9F9;padding:0;margin:0">
							<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="http://rcss.rajagiri.edu/" target="_blank">
								<img border="0" src="'.$this->config->item("base_url").'assets/images/RCSS_logo.png" alt="Dyuti" style="border:none">
							</a>
						</td>
						<td width="10" bgcolor="#00436d" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:654px;">
				<tbody>
					<tr>
						<td align="left" valign="top" style="color:#2c2c2c;display:block;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9">
							<p style="padding:0;margin:0;font-size:16px;font-size:13px"> '.$userTitle.' '.$user['first_name'].' '.$user['last_name'].', </p><br>
							<p style="padding:0;margin:0;color:#565656;font-size:13px">Greetings from Rajagiri College of Social Sciences (Autonomous)!</p><br>
							<p style="padding:0;margin:0;color:#565656;line-height:10px;font-size:13px">  
								You are just a step away from accessing your Dyuti account.
							</p><br> 
							<p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">  
								Please follow this link to verify your account: 
							</p><br>
							<p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">
								<a href="'.$this->config->item('base_url').'registration/verifyUser/'.$user['verification_key'].'">'.$this->config->item('base_url').'registration/verifyUser/'.$user['verification_key'].'</a>
							</p><br>
							<p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">Thanks for registering with us.</p>
							<p style="text-align:center;padding:0;margin:0" align="center"> </p><br>
						</td>
					</tr>
				</tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:654px;border:solid 1px #e6e6e6;border-top:none">
				<tbody>
					<tr>
						<td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor="#F9F9F9">
							<p style="padding:0;margin:0 0 7px 0"> <a title="Dyuti" style="text-decoration:none;color:#565656" href="#" target="_blank"><span style="color:#565656;font-size:13px">Dyuti 2017</span></a></p>
							</td>
					</tr>
				</tbody>
			</table>
		</div>'; 
		$this->load->library('email');
		$config['mailtype']	=	'html';
		$this->email->initialize($config);
		$this->email->from('info@dyuti.in','Dyuti');
		$this->email->to($user['email']);
		$this->email->subject('Dyuti Verification Code');
		$this->email->message($message);
		if($this->email->send())
		{
			
		}
		else
		{
			print_r($message);
			exit();
		}
}


function verifyUser($verify)
{
	$this->db->update("user_master",array('is_confirmed'=>1),array('verification_key'=>$verify));
	$this->db->where('verification_key', $verify); 
	$query = $this->db->get_where("user_master");

	if ($query->num_rows() > 0) 
	{
		$user_data = $query->row_array();  
		$this->db->simple_query('UPDATE user_master SET updated_at = now() WHERE id = ' . $user_data['id']); 
			$user_data['wuser'] 			= 	$user_data['email']; 	
			$user_data['wtype'] 			= 	$user_data['user_type']; 
			$user_data['wid'] 				= 	$user_data['id']; 
			$user_data['wlogged_in'] 		= 	true;
			$this->session->set_userdata($user_data);
			$this->db->simple_query('UPDATE user_master SET verification_key = "" WHERE id = ' . $user_data['id']); 
	} 
	redirect($this->config->item('base_url')."dashboard");
}

	function auth()
	{   
		$username   			=   $this->input->post('username');
		$password   			=   $this->input->post('password');
		if($this->simpleloginsecure->webuserlogin($username, $password)) 	{
			echo "<div class='success log_response'>Log in success !</div>";
		} else { 
			if($this->Registration->checkActive($username))
			{
				echo "<div class='error log_response'>Invalid username or password !</div>";
			} else {
				echo "<div class='error log_response'>Please check your email for registration confirmation !</div>";
			}
			
		}
	}

	function logout()
	{
		$this->simpleloginsecure->logout();
		$this->session->sess_destroy(); 
		redirect($this->config->item('base_url'));
	}

	function forgotpassword()
	{
		$seo 				=	$this->Seo->getSeoVariables("forgotpassword");
		$data['title'] 		=	$seo->mtitle;
		$data['mkey'] 		=	$seo->mkey;
		$data['mdesc'] 		=	$seo->mdesc;

		$data['action'] 		=	$this->config->item("base_url").'registration/mailer';
		$this->load->view('forgot_password',$data);
	}

	public function mailer()
	{
		$username	=	$this->input->post('emailid');	
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('email',$username);
		$query	=	$this->db->get();
		$row	=	$query->row();
		if(!empty($row))	
		{
			$user_id			=	$row->id;
			$link_id 			=	time()."-def-s".rand();
			$url 				=	$this->config->item("base_url")."registration/updatepassword/".$link_id;

			$message    		= '<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">  

			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:654px;">
				<tbody>
					<tr>
						<td width="10" bgcolor="#F9F9F9" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
						<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#F9F9F9;padding:0;margin:0">
							<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="'.$this->config->item("base_url").'" target="_blank">
								<img border="0" src="'.$this->config->item("base_url").'assets/images/Duty_lgo.png" alt="Dyuti" style="border:none">
							</a>
						</td>
						<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#F9F9F9;padding:0;margin:0">
							<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="http://rcss.rajagiri.edu/" target="_blank">
								<img border="0" src="'.$this->config->item("base_url").'assets/images/RCSS_logo.png" alt="Dyuti" style="border:none">
							</a>
						</td>
						<td width="10" bgcolor="#00436d" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
					</tr>
				</tbody>
			</table>

			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:654px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6"> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9">  <br> <p style="padding:0;margin:0;color:#565656;font-size:13px">Greetings from Rajagiri College of Social Sciences (Autonomous)!</p><br> <p style="padding:0;margin:0;color:#565656;line-height:10px;font-size:13px">  
				You are just a step away from accessing your Dyuti account</p><br> <p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">  
				Click on the link below to reset your password using our secure server:</p><br> <p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px"><a href="'.$url.'">  
				'.$url.'</a></p><br>
				<p style="text-align:center;padding:0;margin:0" align="center"> </p><br> </td> </tr> </tbody></table>  <table width="100%" cellspacing="0" cellpadding="0" style="max-width:654px;border:solid 1px #e6e6e6;border-top:none"> <tbody> <tr> <td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor="#F9F9F9"> <p style="padding:0;margin:0 0 7px 0"> <a title="Dyuti" style="text-decoration:none;color:#565656" href="http://www.dyuti.in/" target="_blank"><span style="color:#565656;font-size:13px">www.dyuti.in</span></a> </p>  </td> </tr> </tbody> </table></div>

';
 
			//*****Mailer starts

$this->load->library('email');
$this->email->set_mailtype("html");
$this->email->from('info@dyuti.in', "Dyuti 2017");
$this->email->to($username);

$this->email->subject('Dyuti 2017 Password Assistance');

$this->email->message($message);
$this->email->send();
$this->tab_groups['password_recovery']		= 	$link_id;
$resp = $this->db->update('user_master', $this->tab_groups,array('id'=>$user_id));

 
	echo "<div class='alert alert-success'>We have sent an email regarding password reset . Please check your Mail.!</div>";
}	else	{
	echo "<div class='alert alert-danger'>Enter the email address associated with your Dyuti 2017, then click submit</div>";
	}
}

	function updatepassword($link_id)
	{
		$seo 				=	$this->Seo->getSeoVariables("forgotpassword");
		$data['title'] 		=	$seo->mtitle;
		$data['mkey'] 		=	$seo->mkey;
		$data['mdesc'] 		=	$seo->mdesc;

		$this->db->from('user_master');
		$this->db->where('password_recovery',$link_id);
		$query					=	$this->db->get();
		$row					=	$query->row();	
		$user_id				=	$row->id; 
		$data['user_id']		=	$user_id;
		if($link_id <> "" && $row->password_recovery<>"")
		{
			$data['action']	 		=	$this->config->item("base_url")."registration/resetpassword";
			$this->load->view('resetpassword',$data);
		} else {
			/*$user_data['log_msg'] 		=	"The session has been expired!";
			$this->session->sess_create();
			$this->session->set_userdata($user_data);*/
			redirect($this->config->item('base_url')."home");
		}
	}


	function resetpassword()
	{
		$password 			=	$this->input->post('password');
		$user_id			=	$this->input->post('user_id');
		$hasher 			= 	new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		$password_hashed 	= 	$hasher->HashPassword($password);
		$this->tab_groups['password']			=	$password_hashed;
		$this->tab_groups['password_recovery']	=	"";
		$this->db->update('user_master',$this->tab_groups,array('id'=>$user_id));
		echo "<div class='alert alert-success'>Your password has been updated successfully. Kindly Login with your new password.</div>";
	}

}