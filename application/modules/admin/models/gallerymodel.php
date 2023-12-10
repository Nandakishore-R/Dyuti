<?php 

class Gallerymodel extends CI_Model 
{
	function list_all()
	{
		$output 	=	"";
		$sl_no 		=	0;
		
		$this->db->select('*');
		$this->db->from('image_category');
		$this->db->order_by('id','DESC');
		$query 		=	$this->db->get();
		foreach ($query->result() as $key => $value) 
		{			
			$sl_no++;

			if($value->status == '1') {
				$image = "<i class='fa fa-check fa-lg'></i>";
				$status = 0;
			}
			else {
				$image = "<i class='fa fa-ban fa-lg'></i>";
				$status = 1;
			}
			$output 	.=	"<tr>";
			$output 	.=	"<td>".$sl_no."</td>";
			$output 	.=	"<td>".$value->category_name."</td>";
			$output 	.=	"<td><label data-toggle='modal' data-target='#galModal' data-imid='".$value->id."' class='btn-success imgAdd'>Add Image <i class='fa fa-plus'></i></label></td>";
			$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."gallery/active/".$value->id."/".$status."')>".$image."</a></td>";
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."gallery/edit/".$value->id."'><i class='fa fa-edit fa-lg'></i></a></td>";
			$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."gallery/delete/".$value->id."')><i class='fa fa-trash fa-lg'></i></a>";
			$output 	.=	"</td>";
			$output 	.=	"</tr>";
		}

		return $output;
	}

	function getOneItem($id)
	{
		$this->db->select('*');
		$this->db->from('image_category');
		$this->db->where('id',$id);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}
}