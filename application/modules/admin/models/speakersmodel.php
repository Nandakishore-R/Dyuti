<?php
class Speakersmodel extends CI_Model 
{
	function list_all()
	{
		$output 		=	"";
		$sl_no 			=	0;

		$this->db->select('*');
		$this->db->from('speakers');
		$this->db->order_by('id',"DESC");
		$query 			=	$this->db->get();

		foreach($query->result() as $row)
		{
			$sl_no++;
			if($row->status == '1')
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
			$output 	.=	"<td>".$row->name."</td>";
			$output 	.=	"<td>".$row->email_id."</td>";
			$output 	.=	"<td>".$row->phone_number."</td>";
			$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."speakers/active/".$row->id."/".$status."')>".$image."</a></td>";
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."speakers/edit/".$row->id."'><i class='fa fa-pencil'></i></a></td>";
			$output		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."speakers/delete/".$row->id."')><i class='fa fa-trash'></i></a></td>";
			$output		.=	"</tr>";
		}
		return $output;
	}

	function getOneItem($id)
	{
		$this->db->select('*');
		$this->db->from('speakers');
		$this->db->where('id',$id);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}

	function getSpeakersList()
	{
		$output 		=	"<select name='detail' class='form-control validate[required]' id='detail'>";
		$this->db->select('*');
		$this->db->from('speakers');
		$query 			=	$this->db->get();
		$result 			=	$query->result();
		foreach ($result as $key => $value) {
			$output	.= "<option value='".$value->id."'>".$value->name."</option>";
		}
		$output 		.=	"</select>";
		return $output;
	}

	function getAbstractList()
	{
		$output 		=	"<select name='detail' class='form-control validate[required]' id='detail'>";
		$this->db->select('*');
		$this->db->select('abstract.id as aid');
		$this->db->from('abstract');
		$this->db->join('user_master',"user_master.id=abstract.user_id");
		$this->db->where('abstract.status',2);
		$query 			=	$this->db->get();
		$result 			=	$query->result();
		foreach ($result as $key => $value) {
			if($this->ifAbstractScheduled($value->aid))
			{
				continue;
			}
			$output	.= "<option value='".$value->aid."'>".$value->title."</option>";
		}
		$output 		.=	"</select>";
		return $output;
	}

	function ifAbstractScheduled($abstractId)
	{
		$this->db->select('*'); 
		$this->db->from('program_master'); 
		$this->db->where('pgm_type',"abstract"); 
		$this->db->where('pgm_details',$abstractId);
		$query 				=	$this->db->get();
		$noRows 			=	$query->num_rows();
		if($noRows > 0)
		{
			return true;
		} else {
			return false;
		}
	}
	
}