<?php

class Seomodel extends CI_Model 
{
	function getSeoVariables($controllerName)
	{
		$this->db->select('*');
		$this->db->from('seo');
		$this->db->where('controller_name',$controllerName);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}
}