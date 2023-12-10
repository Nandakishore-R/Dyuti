<?php

class Papercallmodel extends CI_Model 
{
	function getThemes()
	{
		$this->db->select("*");
		$this->db->from("abstract_category");
		$this->db->order_by("id");
		$this->db->where("status",1);
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		return $result;
	}
}