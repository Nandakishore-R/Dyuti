<?php

class Flayermodel extends CI_Model 
{
	function list_all()
	{
		$output 		=	"";
		$sl_no 			=	0;

		$this->db->select('*');
		$this->db->from('flayer_master');
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
			$output 	.=	"<td><img src='".$this->config->item('image_url')."flayer/small/".$row->image."'></td>";
			$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."flayer/active/".$row->id."/".$status."')>".$image."</a></td>";
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."flayer/edit/".$row->id."'><i class='fa fa-pencil'></i></a></td>";
			$output		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."flayer/delete/".$row->id."')><i class='fa fa-trash'></i></a></td>";
			$output		.=	"</tr>";
		}
		return $output;
	}

	function get_flayer_category()
	{
		$cat_dd 		=	"";
		$this->db->select('*');
		$this->db->from('look_up_table_master');
		$this->db->where('category',"flayer");
		$query 			=	$this->db->get();
		$cat_dd 		=	"<select class='form-control validate[required]' name='category'>";
		$cat_dd 		.=	"<option value=''>--Select--</option>";
		foreach($query->result() as $row)
		{
			$cat_dd 	.=	"<option value='".$row->id."'>".$row->title."</option>";												
		}
		$cat_dd 		.=	"</select>";
		return $cat_dd;
	}

	function get_selected_category($cat_id)
	{
		$cat_dd 		=	"";
		$sel 			=	"";
		$this->db->select('*');
		$this->db->from('look_up_table_master');
		$this->db->where('category',"flayer");
		$query 			=	$this->db->get();
		
		$cat_dd 		=	"<select class='form-control validate[required]' name='category'>";
		$cat_dd 		.=	"<option value=''>--Select--</option>";
		foreach($query->result() as $row)
		{
			if($row->id == $cat_id)
			{
				$sel 	=	"selected";
			}
			else
			{
				$sel 	=	"";
			}
			$cat_dd 	.=	"<option ".$sel." value='".$row->id."'>".$row->title."</option>";												
		}
		$cat_dd 		.=	"</select>";
		return $cat_dd;
	}

	function get_one_flayer($id)
	{
		$this->db->select('*');
		$this->db->from('flayer_master');
		$this->db->where('id',$id);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}
}