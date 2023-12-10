<?php
class Newsmodel extends CI_Model 
{
	function list_all()
	{
		$output 		=	"";
		$sl_no 			=	0;

		$this->db->select('*');
		$this->db->from('news');
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
			$output 	.=	"<td>".$row->title."</td>";
			$output 	.=	"<td>".$row->start_date."</td>";
			$output 	.=	"<td>".$row->end_date."</td>";
			$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."news/active/".$row->id."/".$status."')>".$image."</a></td>";
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."news/edit/".$row->id."'><i class='fa fa-pencil'></i></a></td>";
			$output		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."news/delete/".$row->id."')><i class='fa fa-trash'></i></a></td>";
			$output		.=	"</tr>";
		}
		return $output;
	}

	function getOneItem($id)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('id',$id);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}
}