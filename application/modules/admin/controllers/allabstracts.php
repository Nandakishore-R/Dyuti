<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class allabstracts extends MX_Controller 
{
	public $tab_groups;
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('admin/login');
		}
		$this->load->model('Abstractmodel','Abstract',TRUE);
		$this->load->model('Usermodel','User',TRUE);
		$this->template->set('title','Abstract');
		$this->base_uri 			=	$this->config->item('admin_url')."allabstracts";
	}

	function index()
	{
		$data['page_title']			=	"Abstract";
		$data['output']				=	$this->Abstract->listAllAbstracts();
		$this->template->load('template','abstract',$data);
	}

	function view($id)
	{
		$data['page_title']			=	"Abstract view";
		$row 						=	$this->Abstract->getAbstract($id);
		$data['row'] 				=	$row;
		$this->template->load('template','abstractview',$data);
	}

	function updateAbstractStatus()
	{
		$chkval 			= 	$this->input->post("chkval");
		$abid 				= 	$this->input->post("abid");
		$userId 			=	$this->Abstract->getUserId($abid);
		$myTime 			= 	date("Y-m-d H:i:s");
		$this->db->update("abstract",array("status"=>$chkval),array("id"=>$abid));
			if($chkval == 1)
			{
				$note = "Your abstract has been successfully received. Please wait for abstract review.";
			} else if($chkval == 2){
				$note = "Your abstract has been started reviewing.";
			} else if($chkval == 3){
				$note = "Congratulations ! Your Abstract has been Accepted.";
			} else {
				$note = "Sorry ! We can not accept your abstract. Please contact +91 8113031199 for more details.";
			}
			$this->tab_groups['message'] 		=	$note;
			$this->tab_groups['user_id'] 		=	$userId;
			$this->tab_groups['alert_time'] 	=	$myTime;
			$this->db->insert("user_alerts",$this->tab_groups);
			$userEmail  						=	$this->User->getUserEmailid($userId);
			$this->sendNotificationMail($userEmail,$note);
		echo $chkval;
	}

	function sendNotificationMail($userEmail,$note)
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

			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:654px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
				<tbody>
					<tr>
						<td align="left" valign="top" style="color:#2c2c2c;display:block;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9">
							<p style="padding:0;margin:0;font-size:16px;font-size:13px;font-weight:bold;">New Message From DYUTI 2017</p><br>
							<p style="padding:0;margin:0;color:#565656;font-size:13px;">'.$note.'</p><br>  
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
		$this->email->to($userEmail);
		$this->email->subject('Message | DYUTI 2017');
		$this->email->message($message);
		$this->email->send();
	}

}