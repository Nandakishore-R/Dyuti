<?php

class Programsmodel extends CI_Model 
{
	function getPrograms()
	{
		$resArray 	=	array();
		$this->db->select("*");
		$this->db->from("program_location");
		$this->db->order_by("id","DESC");
		$this->db->where("status",1);
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		foreach ($result as $key => $value) {
			$resArray[$key]['location'] 	=	$value->location;
			$resArray[$key]['pgmData'] 		=	$this->getProgramList($value->id);
		}
		//print_r($resArray); exit();
		return $resArray;
	}

	function getProgramList($locId)
	{
		$pgmArray 		=	array();
		$this->db->select("*");
		$this->db->from("program_master");
		$this->db->join("lookup_table","lookup_table.id=program_master.day_id");
		$this->db->where("program_master.status",1);
		$this->db->where("location",$locId);
		$this->db->order_by("program_master.day_id","DESC");
		$this->db->order_by("program_master.stime");
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		foreach ($result as $key => $value) {
			$pgmArray[$key]['title'] 		=	$value->title;
			$pgmArray[$key]['stime'] 		=	$value->stime;
			$pgmArray[$key]['etime'] 		=	$value->etime;
			$pgmArray[$key]['pgmTitle'] 	=	$this->getProgramTitle($value->pgm_type,$value->pgm_details);
			$pgmArray[$key]['desc'] 		=	$value->description;
		}
		return $pgmArray;
	}

	function getProgramTitle($type,$id)
	{
		if($type == "speech")
		{
			$this->db->select("*");
			$this->db->from("speakers");
			$this->db->where("speakers.id",$id);
			$query 	=	$this->db->get();
			$row 	=	$query->row();
			return "Speech -".$row->name;
		} else if($type == "abstract") {
			$this->db->select("*");
			$this->db->from("abstract");
			$this->db->join('user_master',"user_master.id=abstract.user_id");
			$this->db->where("abstract.id",$id);
			$query 	=	$this->db->get();
			$row 	=	$query->row();
			return "Abstract -".$row->title." : ".$row->first_name." ".$row->last_name;
		}
		else
		{
			return $id;
		}
	}

}