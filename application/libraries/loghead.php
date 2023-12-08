<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Loghead
{
	function __construct() 
	{
		$this->ci 	=	& get_instance();
	}

	function showWebUser()
	{
		$login_id 	=	$this->ci->session->userdata('wid');
		$query 		=	$this->ci->db->get_where('user_master',array('id'=>$login_id,"user_type"=>0));
		$row 		=	$query->row();
		if(!empty($row))
		{
			$userName 	=	$row->first_name." ".$row->last_name;
			return $userName;
		} else {
			return "";
		}
	}
}