<?php

class Newsmodel extends CI_Model 
{
	function getAllNews()
	{
		$this->db->select('*');
		$this->db->from('news'); 
		$this->db->where('status',1);
		$this->db->order_by('start_date');
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		return $result;
	}
}