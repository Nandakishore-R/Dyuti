<?php

class Attractionmodel extends CI_Model 
{
	function getAllAttractions()
	{
		$userId 	=	$this->session->userdata("wid");
		$this->db->select('*');
		$this->db->from('attractions'); 
		$this->db->where('status',1);
		$this->db->order_by('id',"DESC");
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		return $result;
	}
}