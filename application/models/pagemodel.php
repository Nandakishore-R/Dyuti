<?php 

class Pagemodel extends CI_Model
{
	public function getPageContent($url)
	{
		$this->db->select("*");
		$this->db->from("page_master");
		$this->db->where("url",$url);
		$query 	=	$this->db->get();
		$row 	=	$query->row_array();
		return $row;
	}
}