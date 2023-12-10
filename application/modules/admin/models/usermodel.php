<?php 
class Usermodel extends CI_Model {
	function list_all() 
	{
		$sl_no  	=	0;
		$output 	=	"";
		$this -> db -> select('*');
		$this -> db -> from('user_master');
		$this -> db -> where('user_type',0);
		$this -> db -> where('payment_status',0);
		$query 			= 	$this -> db -> get();	
		$result 		= 	$query->result();
		foreach ($result as $key => $value) {
			$sl_no++;
			if($value->status == '1')
			{
				$image = "<i class='fa fa-check'></i>";
				$status = 0;
			}
			else
			{
				$image = "<i class='fa fa-ban'></i>";
				$status = 1;
			}
			$output 	.=	"<tr><td>".$sl_no."</td>";
			$output 	.=	"<td>".$value->first_name." ".$value->last_name."</td>";
			$output 	.=	"<td>".$value->email."</td>";
			/*$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."freeusers/active/".$value->id."/".$status."')>".$image."</a></td>";*/
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."freeusers/view/".$value->id."'><i class='fa fa-play'></i></a></td>";
			$output		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."freeusers/delete/".$value->id."')><i class='fa fa-trash'></i></a></td>";
			$output		.=	"</tr>";
		}
		return $output;
	}

	function list_all_paid()
	{
		$sl_no  	=	0;
		$output 	=	"";
		$this -> db -> select('*');
		$this -> db -> from('user_master');
		$this -> db -> where('user_type',0);
		$this -> db -> where('payment_status',1);
		$query 			= 	$this -> db -> get();	
		$result 		= 	$query->result();
		foreach ($result as $key => $value) {
			$sl_no++;
			if($value->status == '1')
			{
				$image = "<i class='fa fa-check'></i>";
				$status = 0;
			}
			else
			{
				$image = "<i class='fa fa-ban'></i>";
				$status = 1;
			}
			$output 	.=	"<tr><td>".$sl_no."</td>";
			$output 	.=	"<td>".$value->first_name." ".$value->last_name."</td>";
			$output 	.=	"<td>".$value->email."</td>";
			/*$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."paidusers/active/".$value->id."/".$status."')>".$image."</a></td>";*/
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."paidusers/view/".$value->id."'><i class='fa fa-play'></i></a></td>";
			$output		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."paidusers/delete/".$value->id."')><i class='fa fa-trash'></i></a></td>";
			$output		.=	"</tr>";
		}
		return $output;
	}

	function getOneUser($id)
	{
		$this -> db -> select('*');
		$this -> db -> from('user_master');
		$this->db->join("user_details","user_details.user_id=user_master.id");
		$this -> db -> where('user_master.id',$id);
		$query 			= 	$this -> db -> get();	
		$row 			= 	$query->row();
		return $row;
	}

	function getAbstractDetails($userId)
	{
		$this->db->select('*');
		$this->db->select('abstract.id as abstractid'); 
		$this->db->select('abstract.title as abtitle');
		$this->db->select('abstract_category.title as cattitle');
		$this->db->from('abstract'); 
		$this->db->join("abstract_category","abstract_category.id=abstract.category");
		$this->db->where('abstract.user_id',$userId);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}

	function getPaymentDetails($userId,$payType)
	{
		$this->db->select('*');
		$this->db->from('user_master'); 
		if($payType==1){
			$this->db->join("payment_dd","user_master.id=payment_dd.user_id");
		} else if($payType==2) {
			$this->db->join("payment_online","user_master.id=payment_online.user_id");
		} else{
			
		}
		$this->db->where('user_master.payment_status',1);
		$this->db->where('user_master.id',$userId);
		$query 			=	$this->db->get();
		$row 			=	$query->row();

		return $row;
	}

	function getUserIds($paystatus)
	{
		$userIdArray 	=	array();
		$this -> db -> select('id');
		$this -> db -> from('user_master');
		$this -> db -> where('user_type',0);
		$this -> db -> where('payment_status',$paystatus);
		$query 			= 	$this -> db -> get();	
		$result 		= 	$query->result();
		foreach ($result as $key => $value) {
			$userIdArray[] 	=	$value->id;
		}
		return $userIdArray;
	}

	public function usersSelect($aryid,$paystatus)
	{
	 	$list	=	'';
	 	$sel	=	'';
	 	$this -> db -> from('user_master');
		$this -> db -> where('user_type',0);
		$this -> db -> where('payment_status',$paystatus);
	 	$query 			= 	$this -> db -> get();	
		$list	.=	"<select class='form-control validate[required]' name='dest_list[]' multiple='multiple' id='dest_list'>";
	 	foreach($query->result() as $r) {
		 	$tdid	=	$r->id;
		 	if($aryid)
		 	if (in_array($tdid, $aryid))
		 		$sel	=	"selected='selected'";
		 	else
		 		$sel	=	"";
	 		$list	.=	"<option $sel value='".$r->id."'>".$r->first_name." ".$r->last_name."</option>";			 
	 	}
	 	$list	.=	"</select>";
	 	return $list;
	}


	public function usersSelectMoveToPaid()
	{
	 	$list	=	'';
	 	$sel	=	'';
	 	$this -> db -> from('user_master');
		$this -> db -> where('user_type',0); 
		$this -> db -> where('payment_status',0); 
	 	$query 			= 	$this -> db -> get();	
		$list	.=	"<select class='form-control validate[required]' name='moveinglist[]' multiple='multiple' id='moveinglist'>";
	 	foreach($query->result() as $r) {
	 		$list	.=	"<option $sel value='".$r->id."'>".$r->first_name." ".$r->last_name."</option>";			 
	 	}
	 	$list	.=	"</select>";
	 	return $list;
	}


	function getAbstractDownload($userId)
	{
		$this->db->select('*');
		$this->db->select('abstract.id as abstractid'); 
		$this->db->select('abstract.title as abtitle');
		$this->db->select('abstract_category.title as cattitle');
		$this->db->from('abstract'); 
		$this->db->join("abstract_category","abstract_category.id=abstract.category");
		$this->db->join("user_master","user_master.id=abstract.user_id");
		$this->db->join("user_details","user_details.user_id=abstract.user_id");
		$this->db->where('abstract.user_id',$userId);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}

	function getUserEmailid($userId)
	{
		$this->db->select("email");
		$this->db->from("user_master");
		$this->db->where("id",$userId);
		$query 		=	$this->db->get();
		$row 			=	$query->row();
		return $row->email;
	}

}
