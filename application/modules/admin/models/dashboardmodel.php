<?php
class Dashboardmodel extends CI_Model 
{
	 
	function getPages()
	{
		$this->db->select("*");
		$this->db->from("page_master");
		$this->db->where("status",1);
		$query	=	$this->db->get();
		$cnt 	=	$query->num_rows();
		return $cnt;
	}

	function getNews()
	{
		$this->db->select("*");
		$this->db->from("news");
		$this->db->where("status",1);
		$query	=	$this->db->get();
		$cnt 	=	$query->num_rows();
		return $cnt;
	}
	
	function getAttractions()
	{
		$this->db->select("*");
		$this->db->from("attractions");
		$this->db->where("status",1);
		$query	=	$this->db->get();
		$cnt 	=	$query->num_rows();
		return $cnt;
	}  

	function getSpeakers()
	{
		$this->db->select("*");
		$this->db->from("speakers");
		$this->db->where("status",1);
		$query	=	$this->db->get();
		$cnt 	=	$query->num_rows();
		return $cnt;
	}

	function getPaid()
	{
		$this->db->select("*");
		$this->db->from("user_master");
		$this->db->where("is_confirmed",1);
		$this->db->where("payment_status",1);
		$query	=	$this->db->get();
		$cnt 	=	$query->num_rows();
		return $cnt;
	}

	function getUnPaid()
	{
		$this->db->select("*");
		$this->db->from("user_master");
		$this->db->where("is_confirmed",1);
		$this->db->where("payment_status",0);
		$query	=	$this->db->get();
		$cnt 	=	$query->num_rows();
		return $cnt;
	}
}