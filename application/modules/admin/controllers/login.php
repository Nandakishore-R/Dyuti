<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

	public $tab_groups;
	function __construct()
	{
		parent::__construct();
		$this->template->set('title', 'User');
		$this->base_uri 		=	$this->config->item('admin_url')."login";
	}
	
	public function index()
	{
		$data['action'] 			=	$this->config->item('admin_url')."login/auth";
		if($this->input->get('msg'))
		{
			$data['msg']			=	$this->input->get('msg');
		} else {
			$data['msg']			=	"";
		}	
		$this->load->view('login',$data);
		header('Refresh: 2; url='.$this->config->item('admin_url'));
	}

	function auth()
	{   
		$username   			=   $this->input->post('username');
		$password   			=   $this->input->post('password');
		if($this->simpleloginsecure->login($username, $password)) 	{
			redirect($this->config->item('admin_url').'dashboard');
		} else {
			$this->messages->add('The User ID and password you\'ve entered do not match our records.', 'error');
			redirect($this->config->item('admin_url')."login");
		}
	}

	function forgotpassword()
	{
		$data['action'] 		=	$this->base_uri.'/mailer';
		$this->load->view('forgot_password',$data);
	}

	public function mailer1()
	{
		$username	=	$this->input->post('user_email');	
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('email',$username);
		$query	=	$this->db->get();
		$row	=	$query->row();
		if(!empty($row))	
		{
			$user_id			=	$row->id;
			$link_id 			=	time()."-def-s".rand();
			$url 				=	$this->base_uri."/updatepassword/".$link_id;

			$message    		= '<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">  

			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px">
				<tbody><tr>
					<td width="10" bgcolor="#027cd5" style="width:10px;background-color:#027cd5">&nbsp;</td>
					<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#027cd5;padding:0;margin:0">
						<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="#" target="_blank">
							<img border="0" src="'.$this->config->item("base_url").'assets/admin/img/logo-alt.png" alt="E Shoppy" style="border:none">
						</a>
					</td>
					
					<td valign="middle" align="right" height="50" bgcolor="#027cd5" style="background-color:#027cd5;padding:0;margin:0">
                        <a style="text-decoration:none;outline:none;color:#ffffff;font-size:11px" href="#" target="_blank">
                           <img border="0" style="vertical-align:middle" alt="E Shoppy" height="33" src="'.$this->config->item("base_url").'assets/admin/img/shopping-cart.png">
                           BROADEN YOUR FASHION PERSPECTIVE
                        </a>
                </td>

					<td width="10" bgcolor="#00436d" style="width:10px;background-color:#027cd5">&nbsp;</td>
				</tr>
			</tbody></table>

			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px">
            <tbody><tr>
                <td valign="top" align="center" width="300">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#006cb4">
                            <tbody><tr>
                                <td valign="middle" align="right" width="20%" height="35" style="border-bottom:solid 1px #ccc;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                        <img border="0" src="'.$this->config->item("base_url").'assets/admin/img/mailstar.png" alt="">
                                    </a>
                                </td>

                                <td valign="middle" width="30%" align="left" height="35" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                        <span style="font-size:11px;color:#e1e1e1;line-height:14px">ORIGINAL</span><br> <span style="font-size:11px;color:#e1e1e1;line-height:14px">PRODUCTS</span>
                                    </a>
                                </td>

                                <td valign="middle" align="right" width="20%" height="35" style="border-bottom:solid 1px #ccc;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                        <img border="0" src="'.$this->config->item("base_url").'assets/admin/img/mailshopping.png" alt="" class="CToWUd">
                                    </a>
                                </td>

                                <td valign="middle" align="left" width="30%" height="35" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                        <span style="font-size:11px;color:#e1e1e1;line-height:14px">CASH ON</span><br> <span style="font-size:11px;color:#e1e1e1;line-height:14px">DELIVERY</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody></table>
                </td>
                <td valign="top" align="center" width="300">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#006cb4">
                            <tbody><tr>
                                <td valign="middle" align="right" width="18%" height="35" style="border-bottom:solid 1px #ccc;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                        <img border="0" src="'.$this->config->item("base_url").'assets/admin/img/mailreturn.png">
                                    </a>
                                </td>

                                <td valign="middle" align="left" width="32%" height="35" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                        <span style="font-size:11px;color:#e1e1e1;white-space:nowrap;line-height:14px">FREE &amp; EASY</span><br><span style="font-size:11px;color:#e1e1e1;line-height:14px">RETURNS</span>
                                    </a>
                                </td>

                                <td valign="middle" align="right" width="18%" height="35" style="border-bottom:solid 1px #ccc;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                         <img border="0" src="'.$this->config->item("base_url").'assets/admin/img/mailtick.png">
                                    </a>
                                </td>

                                <td valign="middle" align="left" width="32%" height="35" style="border-bottom:solid 1px #ccc;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="#" target="_blank">
                                        <span style="font-size:11px;color:#e1e1e1;line-height:14px">100% BUYER</span><br> <span style="font-size:11px;color:#e1e1e1;line-height:14px">PROTECTION</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody></table>
                </td>
            </tr>
        </tbody></table>


			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6"> <tbody><tr> <td align="left" valign="top" style="color:#2c2c2c;display:block;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9"> <p style="padding:0;margin:0;font-size:16px;font-size:13px"> Hi, </p><br> <p style="padding:0;margin:0;color:#565656;font-size:13px">Greetings!</p><br> <p style="padding:0;margin:0;color:#565656;line-height:10px;font-size:13px">  
				You are just a step away from accessing your Eshoppy account</p><br> <p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">  
				Click on the link below to reset your password using our secure server:</p><br> <p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px"><a href="'.$url.'">  
				'.$url.'</a></p><br>
				<p style="text-align:center;padding:0;margin:0" align="center"> </p><br> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6"> <tbody><tr> <td valign="top" align="center" width="300" style="background-color:#f9f9f9"> <br> <table width="100%" cellspacing="0" cellpadding="0"> <tbody><tr> <td valign="top" align="left" style="padding:0 10px 15px 20px;margin:0;border-right:dashed 1px #b3b3b3"> <p style="padding:0;margin:0 0 7px 0;font-size:16px;color:#565656">What Next?</p> <p style="padding:0;margin:0;font-size:11px;color:#565656;line-height:20px">  
			Enjoy your shopping! Visit the <a style="text-decoration:underline" href="#" target="_blank"><span style="color:#666;font-size:11px">My Orders</span></a> page to see your order history.  
		</p> </td> </tr> </tbody></table> </td> <td valign="top" align="center" width="300" style="background-color:#f9f9f9"> <br> <table width="100%" cellspacing="0" cellpadding="0"> <tbody><tr> <td valign="top" align="left" style="padding:0 10px 15px 20px;margin:0"> <p style="padding:0;margin:0 0 7px 0;font-size:16px;color:#565656">Any Questions?</p> <p style="padding:0;margin:0;font-size:11px;color:#565656;line-height:20px">  
		Get in touch with our 24x7  
		<a style="text-decoration:underline" href="#" target="_blank"><span style="color:#666;font-size:11px">Customer Care</span></a>  
		team.  
	</p> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border:solid 1px #e6e6e6;border-top:none"> <tbody> <tr> <td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor="#F9F9F9"> <p style="padding:0;margin:0 0 7px 0"> <a title="EShoppy" style="text-decoration:none;color:#565656" href="#" target="_blank"><span style="color:#565656;font-size:13px">Eshoppy.com</span></a> </p> <p style="padding:10px 0 0 0;margin:0;border-top:solid 1px #cccccc;font-size:11px;color:#565656">  
	24x7 Customer Support&nbsp; | &nbsp;Buyer Protection&nbsp; | &nbsp;Flexible Payment Options&nbsp; | &nbsp;Largest Collection  
	</p></td> </tr> </tbody> </table></div>

';

			//*****Mailer starts

$this->load->library('email');
$this->email->set_mailtype("html");
$this->email->from('info@dyuti.in', "E Shoppy");
$this->email->to($username);

$this->email->subject('E Shoppy Password Assistance');

$this->email->message($message);
$this->email->send();
$this->tab_groups['password_recovery']		= 	$link_id;
$resp = $this->db->update('user_master', $this->tab_groups,array('id'=>$user_id));

/*echo $message;
exit();*/

$user_data['log_msg'] 		=	"We have sent an email regarding password reset . Please check your Mail.!";
$this->session->sess_create();
$this->session->set_userdata($user_data);
redirect($this->config->item('admin_url')."login");
}	else	{
	$this->messages->add('Enter the email address or mobile phone number associated with your Eshoppy account, then click submit', 'error');
	redirect($this->config->item('admin_url')."login/forgotpassword");
}
}
	function updatepassword($link_id)
	{
		
		$this->db->from('user_master');
		$this->db->where('password_recovery',$link_id);
		$query					=	$this->db->get();
		$row					=	$query->row();	
		$user_id				=	$row->id; 
		$data['user_id']		=	$user_id;
		if($link_id <> "" && $row->password_recovery<>"")
		{
			$data['action']	 		=	$this->base_uri."/resetpassword";
			$this->load->view('resetpassword',$data);
		} else {
			$user_data['log_msg'] 		=	"The session has been expired!";
			$this->session->sess_create();
			$this->session->set_userdata($user_data);
			redirect($this->config->item('admin_url')."login");
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
		$user_data['log_msg'] 		=	"Password reset successfully! Please log in!";
		$this->session->sess_create();
		$this->session->set_userdata($user_data);
		redirect($this->config->item('admin_url')."login");
	}

	function logout()
	{
		$this->simpleloginsecure->logout();
		$this->session->sess_destroy();
		$this->session->unset_userdata('user_id');
		$user_data['log_msg'] 		=	"You have successfully logged out!";
		$this->session->sess_create();
		$this->session->set_userdata($user_data);
		redirect($this->config->item('admin_url')."login");
	}

	/* Password reset after log in */
	function changepassword()
	{
		$userId 		=	$this->session->userdata("id");
		$this->db->select("*");
		$this->db->from("user_master");
		$this->db->where("id",$userId);
		$query 					=	$this->db->get();
		$row 					=	$query->row();
		$data['page_title'] 	=	"Change Password";
		$data['id'] 			=	$userId;
		$data['action'] 		=	$this->base_uri.'/update';
		$this->template->load('template', 'changepwd',$data);
	}

	function update(){
		$user_id				=	$this->input->post( 'id');
		$oldpass  				=   $this->input->post('opassword');	
		$passwordnew 			=	$this->input->post('password');
		if($this->simpleloginsecure->edit_password($user_id,$oldpass,$passwordnew)) {
			$this->simpleloginsecure->logout();
			$this->session->sess_destroy();
			$this->session->unset_userdata('user_id');
			$user_data['log_msg'] 		=	"Password has been updated successfully";
			$this->session->sess_create();
			$this->session->set_userdata($user_data);
			redirect($this->config->item('admin_url')."login");
		}
		else {
			$this->messages->add('The User ID and password you\'ve entered do not match our records.Please check again', 'error');
			redirect($this->config->item("admin_url")."login/changepassword");
		}
	}
	/* Password reset after log in end */

}
