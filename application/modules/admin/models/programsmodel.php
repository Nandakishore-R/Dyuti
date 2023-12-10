<?php
class Programsmodel extends CI_Model 
{
	function list_all()
	{
		$output 		=	"";
		$sl_no 			=	0;
		$this->db->select('*');
		$this->db->from('program_location');
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
			$output 	.=	"<td>".$row->location."</td>";
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."programs/view/".$row->id."'><i class='fa fa-caret-square-o-right'></i></a></td>";
			$output 	.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."programs/active/".$row->id."/".$status."')>".$image."</a></td>";
			$output 	.=	"<td><a href='".$this->config->item('admin_url')."programs/edit/".$row->id."'><i class='fa fa-pencil'></i></a></td>";
			$output		.=	"<td><a href=javascript:confirm_del('".$this->config->item('admin_url')."programs/delete/".$row->id."')><i class='fa fa-trash'></i></a></td>";
			$output		.=	"</tr>";
		}
		return $output;
	}

	function getOneItem($id)
	{
		$this->db->select('*');
		$this->db->from('program_location');
		$this->db->where('id',$id);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}

	function getDays()
	{
		$this->db->select('*');
		$this->db->from('lookup_table');
		$this->db->where('category',"days");
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		return $result;

	}

	function listDayPrograms($dayid)
	{
		$output 		=	"";
		$this->db->select('*');
		$this->db->from('program_master');
		$this->db->where('day_id',$dayid);
		$this->db->order_by('stime');
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		if($query->num_rows() > 0) {
		foreach ($result as $key => $value) {
			$output 	.= "<tr><td><i class='fa fa-clock-o fa-fw'></i>".$value->stime."-".$value->etime."</td>";
			$output 		.=	"<td>".$value->pgm_type."</td>";
			if ($value->pgm_type == "speech") {
				$pgmTitle 		=	$this->getSpeech($value->pgm_details);
			} else if($value->pgm_type == "abstract")
			{
				$pgmTitle 		=	$this->getAbstract($value->pgm_details);
			} else {
				$pgmTitle 		=	$value->pgm_details;
			}
			$output 		.=	"<td>".$pgmTitle."</td>";
			$output 		.=	"<td> <button type='button' class='btn btn-info' data-toggle='collapse' data-target='#demo".$key."'>More ></button></td></tr>";
			if($value->description <> "")
			{
				$desc = $value->description;
			} else {
				$desc = "No description available.";
			}
			
			$output 		.=	"<tr><td colspan='5'><div id='demo".$key."' class='collapse'>".$desc."</div></td></tr>";
		} /* loop end*/
		} else {
			$output 		.= "<div class='alertPgm alert-danger'><strong>Sorry ! </strong>No Result Found.</div>";
		}

		return $output;
	}

	function getSpeech($pId)
	{

		$this->db->select('*');
		$this->db->from('speakers');
		$this->db->where('id',$pId);
		$query 	=	$this->db->get();
		$row 	=	$query->row();
		return $row->name;
	}

	function getAbstract($pId)
	{
		$this->db->select('*');
		$this->db->from('abstract');
		$this->db->join("user_master","user_master.id=abstract.user_id");
		$this->db->where('abstract.id',$pId);
		$query 	=	$this->db->get();
		$row 	=	$query->row();
		return $row->title."|".$row->first_name." ".$row->last_name;
	}
}