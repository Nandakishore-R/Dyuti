<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paidusers extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('admin/login');
		}
		$this->load->model('Usermodel','User',TRUE);
		$this->template->set('title','User');
		$this->base_uri 			=	$this->config->item('admin_url')."paidusers";
	}

	function index()
	{
		$data['page_title']			=	"Paid Users";
		$data['output']				=	$this->User->list_all_paid();
		$data['payStatus'] 			=	1;
		$data['userlist'] 			=	$this->User->usersSelect($id='',1);
		$this->template->load('template','users',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->User->list_all_paid();
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


	public function excel($paystatus)
	{
  		$temp = array();
  		$data = array();
  		$this -> db -> select('*');
		$this -> db -> from('user_master');
		$this -> db -> join("user_details","user_details.user_id=user_master.id");
		$this -> db -> where('user_type',0);
		$this -> db -> where('payment_status',$paystatus);
  		$temp = $this -> db -> get();  
  		foreach ($temp->result_array() as $key => $value) {
    		$data[$key]['Name']          = 	$value['first_name']." ".$value['last_name'];
    		$data[$key]['EmailId']       = 	$value['email'];
    		$data[$key]['PhoneNo.']      = 	$value['phone'];
    	} 
    	if($paystatus==0)
		{
			$filename =	"Unpaid Users " . date('d M Y') . ".xls";
		} else {
			$filename =	"Paid Users " . date('d M Y') . ".xls";
		}
  		header("Content-Disposition: attachment; filename=\"$filename\"");
  		header("Content-Type: application/vnd.ms-excel");
  		$flag = false;
  		foreach($data as $key => $row) {
		    if(!$flag) {
		      	echo implode("\t", array_keys($row)) . "\r\n";
		      	$flag = true;
		    }
		    echo implode("\t", array_values($row)) . "\r\n";
  		}
  		exit;
	}



	public function downloadAbstract($userId)
	{
		$abstract 			=	$this->User->getAbstractDownload($userId);
		$subDataTemp 		=	strtotime($abstract->submission_date);
		$subDate 			=	 date('d M Y',$subDataTemp);
		$userName 			=	$abstract->first_name." ".$abstract->last_name;
		$filename =	"Abstract_".$userName."_".$subDate.".doc";
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=\"$filename\"");

		$output 	 =	"<html>";
		$output     .=	"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
		$output     .=	 "<body>";
		$output     .=	 "<div><div>
		<table width='100%'><tr><td style='text-align:left;'>".$subDate."</td><td style='text-align:right;'>".$abstract->cattitle."</td></tr></table>
							</div>
							<div><h3 style='padding:30px 10px 10px 10px; text-align:center;'>".$abstract->abtitle."</h3>
							</div>
							<div style='padding:5px; text-align:center;'><b>".$userName."</b></div>
							<div style='padding:5px; text-align:center;'>".$abstract->email."</div>
							<div style='padding:5px; text-align:center;'>".$abstract->phone."</div>

							<div style='text-align:justify; padding:30px 10px 30px 10px;'><br/><br/>".$abstract->ab_content."<br/><br/><br/></div>
							<div  style='padding-top:10px; border-top:solid 1px #d6d6d6;'>".$abstract->tags."</div></div>";
		$output     .=	 "</body>";
		$output     .=	 "</html>";
		echo $output;
	}


}