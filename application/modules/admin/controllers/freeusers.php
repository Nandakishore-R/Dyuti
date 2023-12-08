<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Freeusers extends MX_Controller 
{
	public $tab_groups,$tab_dd;
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('admin/login');
		}
		$this->load->model('Usermodel','User',TRUE);
		$this->template->set('title','User');
		$this->base_uri 			=	$this->config->item('admin_url')."freeusers";
	}

	function index()
	{
		$data['page_title']			=	"Unpaid Users";
		$data['output']				=	$this->User->list_all();
		$data['payStatus'] 			=	0;
		$data['userlist'] 			=	$this->User->usersSelect($id='',0);
		$data['movableusers'] 		=	$this->User->usersSelectMoveToPaid();
		$this->template->load('template','users',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->User->list_all();
	}

	function view($id)
	{
		$data['page_title']			=	"User view";
		$row 						=	$this->User->getOneUser($id); 
		$data['row'] 				=	$row;
		$abstract 					=	$this->User->getAbstractDetails($id);
		$paymentData 				=	$this->User->getPaymentDetails($id,$row->payment_type);
		$data['abstract'] 			=	$abstract;
		$data['paymentData'] 		=	$paymentData;
		$data['id'] 				=	$id;
		$this->template->load('template','user_view',$data);
	}

	function delete($id)
	{
		$row 			=	$this->User->getOneUser($id);
		unlink($this->config->item('image_path').'users/'.$row->image);
		$this->db->delete('user_master',array('id'=>$id));
		$this->db->delete('user_details',array('user_id'=>$id));
		$this->list_ajax();
	}

	function activeUser()
	{
		$user_id 			=	$this->input->post('user_id');
		$user_status 		=	$this->input->post('user_status');
		if($user_status == 1)
		{
			$newStatus 		=	0;
			$resp 			=	'<button type="button" id="myButton" class="btn btn-danger" autocomplete="off"><i class="fa fa-hand-o-right"></i>  ACTIVATE </button>';
		} else {
			$newStatus 		=	1;
			$resp 			=	'<button type="button" id="myButton" class="btn btn-success" autocomplete="off"><i class="fa fa-star"></i>  ACTIVE USER </button>';
		}
		$dataResp 			=	array("status"=>$newStatus,"resp"=>$resp);
		$this->db->update("user_master",array("is_confirmed"=>$newStatus),array("id"=>$user_id));
		echo json_encode($dataResp);
	}

	function sendMessage()
	{
		$note 								=	$this->input->post("message");
		$userId 							=	$this->input->post("uid");
		date_default_timezone_set('Asia/Kolkata');
		$myTime 							= 	date("Y-m-d H:i:s");
		$this->tab_groups['message'] 		=	$note;
		$this->tab_groups['user_id'] 		=	$userId;
		$this->tab_groups['alert_time'] 	=	$myTime;
		$this->db->insert("user_alerts",$this->tab_groups);
		$userEmail  						=	$this->User->getUserEmailid($userId);
		$this->sendNotificationMail($userEmail,$note);
		echo "<div class='alertMes alert-success'>Message Send Successfully</div>";
	}

	function sendNotificationMail($userEmail,$note)
	{
		$message 	=	'<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">  
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;">
				<tbody>
					<tr>
						<td width="10" bgcolor="#F9F9F9" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
						<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#F9F9F9;padding:0;margin:0">
							<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="#" target="_blank">
								<img border="0" src="'.$this->config->item("base_url").'assets/images/Duty_lgo.png" alt="Dyuti" style="border:none">
							</a>
						</td>
						<td valign="middle" align="right" height="50" bgcolor="#FFF" style="background-color:#FFF;padding:0;margin:0">
						</td>
						<td width="10" bgcolor="#00436d" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
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
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border:solid 1px #e6e6e6;border-top:none">
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

	function sendMessageAll()
	{
		$emailArray 						=	array();
		$note 								=	$this->input->post("message");
		$paystatus 							=	$this->input->post("paystatus");
		date_default_timezone_set('Asia/Kolkata');
		$myTime 							= 	date("Y-m-d H:i:s");
		$this->tab_groups['message'] 		=	$note;
		$this->tab_groups['alert_time'] 	=	$myTime;

		$userIdsList 						=	$this->input->post("user_list");
		$userIds 							=	explode(",", $userIdsList);
		foreach ($userIds as $key => $value) 
		{
			$this->tab_groups['user_id'] 	=	$value;
			$this->db->insert("user_alerts",$this->tab_groups);
			$emailArray[] 					=	$this->User->getUserEmailid($value);
		}	
		$this->sendNotificationMailAll($emailArray,$note);
		echo "<div class='alertMes alert-success'>Message Send Successfully</div>";
	}


	function sendNotificationMailAll($emailArray,$note)
	{
		$message 	=	'<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">  
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;">
				<tbody>
					<tr>
						<td width="10" bgcolor="#F9F9F9" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
						<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#F9F9F9;padding:0;margin:0">
							<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="#" target="_blank">
								<img border="0" src="'.$this->config->item("base_url").'assets/images/Duty_lgo.png" alt="Dyuti" style="border:none">
							</a>
						</td>
						<td valign="middle" align="right" height="50" bgcolor="#FFF" style="background-color:#FFF;padding:0;margin:0">
						</td>
						<td width="10" bgcolor="#00436d" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
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
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border:solid 1px #e6e6e6;border-top:none">
				<tbody>
					<tr>
						<td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor="#F9F9F9">
							<p style="padding:0;margin:0 0 7px 0"> <a title="Dyuti" style="text-decoration:none;color:#565656" href="#" target="_blank"><span style="color:#565656;font-size:13px">Dyuti 2017</span></a></p>
							</td>
					</tr>
				</tbody>
			</table>
		</div>';
		$toEMailIds 			=	implode(",", $emailArray);
		$this->load->library('email');
		$config['mailtype']	=	'html';
		$this->email->initialize($config);
		$this->email->from('info@dyuti.in','Dyuti');
		$this->email->to($toEMailIds);
		$this->email->subject('Message | DYUTI 2017');
		$this->email->message($message);
		$this->email->send();
	}

	function addBulkPayment() 
	{
		/**
			dd: payment type=1
			Online transfer Payemnt type=2
		*/
		$bank	 										=	"";
		$dd_date	 									=	"";
		$ddno	 										=	"";
		/*$note	 										=	$this->input->post("note");*/
		$userlist	 									=	$this->input->post("moveinglist");
		$userIds 										=	explode(",", $userlist); 

		foreach ($userIds as $key => $value) {
			$updateArray[] = array(
		        'payment_type'=>0,
		        'payment_status' => 1,
		        'id'=>$value
		    );
		}
		        
		$this->db->update_batch('user_master',$updateArray, 'id'); 

		echo "<div class='alertMes alert-success'>Payment details added Successfully.</div>";
	}


	function addPayment() 
	{
		/**
			dd: payment type=1
			Online transfer Payemnt type=2
		*/
		$bank	 										=	$this->input->post("bank");
		$dd_date	 									=	$this->input->post("dd_date");
		$ddno	 										=	$this->input->post("ddno");
		$note	 										=	$this->input->post("note");
		$uid	 										=	$this->input->post("uid");
		$this->tab_groups['payment_type'] 				=	1;
		$this->tab_groups['payment_status'] 			=	1;
		$this->db->update("user_master",$this->tab_groups,array("id"=>$uid));

		$this->tab_dd['user_id'] 						=	$uid;
		$this->tab_dd['bank'] 							=	$bank;
		$this->tab_dd['dd_date'] 						=	$dd_date;
		$this->tab_dd['ddno'] 							=	$ddno;
		$this->tab_dd['note'] 							=	$note;
		$this->db->insert("payment_dd",$this->tab_dd);
		echo "<div class='alertMes alert-success'>Payment details added Successfully.</div>";
	}

	function addOnlinePayment() 
	{
		/**
			dd: payment type=1
			Online transfer Payemnt type=2
		*/
		$bank	 										=	$this->input->post("opbank");
		$op_date	 									=	$this->input->post("op_date");
		$neft	 										=	$this->input->post("neft");
		$note	 										=	$this->input->post("opnote");
		$uid	 										=	$this->input->post("uid");
		$this->tab_groups['payment_type'] 				=	2;
		$this->tab_groups['payment_status'] 			=	1;
		$this->db->update("user_master",$this->tab_groups,array("id"=>$uid));

		$this->tab_dd['user_id'] 						=	$uid;
		$this->tab_dd['bank'] 							=	$bank;
		$this->tab_dd['op_date'] 						=	$op_date;
		$this->tab_dd['neft'] 							=	$neft;
		$this->tab_dd['note'] 							=	$note;
		$this->db->insert("payment_online",$this->tab_dd);
		echo "<div class='alertMes alert-success'>Payment details added Successfully.</div>";
	}
	
}