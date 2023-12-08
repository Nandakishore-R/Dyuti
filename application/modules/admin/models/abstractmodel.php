<?php
class Abstractmodel extends CI_Model 
{
	function listAllAbstracts()
	{
		$output 		=	"";
		$sl_no 			=	0;

		$this->db->select('abstract.id,abstract.status,abstract.title,abstract_category.title as cat_title');
		$this->db->from('abstract');
		$this->db->join("user_master","user_master.id=abstract.user_id");
		$this->db->join("abstract_category","abstract_category.id=abstract.category");
		$this->db->order_by('abstract.id',"DESC");
		$query 			=	$this->db->get();

		foreach($query->result() as $row)
		{
			$sl_no++;
			if($row->status == 0)
			{
				$statusNote = "Submitted";
			}
			else if($row->status == 1)
			{
				$statusNote = "Received";
			} else if($row->status == 2){
				$statusNote = "Under Review";
			} else if($row->status == 3){
				$statusNote = "Accepted";
			} else {
				$statusNote = "Rejected";
			}

			$output 	.=	"<tr><td>".$sl_no."</td>";
			$output 	.=	"<td>".$row->title."</td>";
			$output 	.=	"<td>".$row->cat_title."</td>";
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."allabstracts/view/".$row->id."'><i class='fa fa-play'></i></a></td>";
			$output		.=	"<td><label class='btn btn-primary'>".$statusNote."</label></td>";
			$output		.=	"</tr>";
		}
		return $output;
	}

	function getAbstract($id)
	{
		$this->db->select('abstract.id,abstract.status,abstract.title as abtitle,abstract_category.title as cattitle,abstract.submission_date,abstract.ab_content,abstract.tags,abstract.status,user_master.id as userId');
		$this->db->from('abstract');
		$this->db->join("user_master","user_master.id=abstract.user_id");
		$this->db->join("abstract_category","abstract_category.id=abstract.category");
		$this->db->where('abstract.id',$id);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		/*print_r($row); exit();*/
		return $row;
	}

	function getUserId($abid)
	{
		$this->db->select('*');
		$this->db->from('abstract');
		$this->db->where('abstract.id',$abid);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row->user_id;
	}
}