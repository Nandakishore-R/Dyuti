<?php 

class Pagesmodel extends CI_Model 
{
	function get_one_page($id)
	{
		$this->db->select('*');
		$this->db->from('page_master');
		$this->db->where('id',$id);
		$query 				=	$this->db->get();
		$row 				=	$query->row();
		return $row;
	}

	function list_all()
	{
		$output 			=	"";
		$sl_no 				=	0;

		$this->db->select('*');
		$this->db->from('page_master');
		$this->db->order_by('id','DESC');
		$query 				=	$this->db->get();

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
			$output 		.=	"<tr><td>".$sl_no."</td><td>".$row->page_name."</td><td>".$row->url."</td>"; 
			$output 		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."pages/active/".$row->id."/".$status."')>".$image."</a></td>";
			$output 		.=	"<td><a href='".$this->config->item('admin_url')."pages/edit/".$row->id."'><i class='fa fa-pencil'></i></a></td>";
			$output 		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."pages/delete/".$row->id."')><i class='fa fa-trash'></i></a></td></tr>";
		}
		return $output;
	}
}