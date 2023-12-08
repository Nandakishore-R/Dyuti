<?php

class Dashboardmodel extends CI_Model 
{
	function getUserDetails()
	{
		$userId 	=	$this->session->userdata("wid");
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->join("user_details","user_master.id=user_details.user_id");
		$this->db->where('user_master.id',$userId);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}

	function getCategoryList($selid)
	{
		$this->db->select('*');
		$this->db->from('abstract_category');
		$this->db->where('abstract_category.status',1);
		$query 			=	$this->db->get();
		$result 			=	$query->result();
		return $result;
	}

	function isAbstractExist($userId)
	{
		$this->db->select('*');
		$this->db->from('abstract');
		$this->db->where('abstract.user_id',$userId);
		$query 				=	$this->db->get();
		$NumRow 			=	$query->num_rows();
		if($NumRow > 0)
		{
			return true;
		} else {
			return false;
		} 
	}

	function GetabStatusId($userId)
	{
		$this->db->select('*');
		$this->db->from('abstract');
		$this->db->where('abstract.user_id',$userId);
		$query 				=	$this->db->get();
		$row 				=	$query->row();
		if($query->num_rows() >0)
		{
			return $row->status;
		} else {
			return 0;
		}
		
	}


	function getAbstractDetails()
	{
		$userId 	=	$this->session->userdata("wid");
		$this->db->select('*');
		$this->db->select('abstract.title as abtitle');
		$this->db->select('abstract_category.title as cattitle');
		$this->db->from('abstract'); 
		$this->db->join("abstract_category","abstract_category.id=abstract.category");
		$this->db->where('abstract.user_id',$userId);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}

	function getNotifications()
	{
		$userId 	=	$this->session->userdata("wid");
		$this->db->select('*');
		$this->db->from('user_alerts'); 
		$this->db->where('user_id',$userId);
		$this->db->order_by("id","DESC");
		$this->db->limit(4);
		$query 			=	$this->db->get();
		$result 			=	$query->result();
		return $result;
	}

	function getAllNotifications()
	{
		$userId 	=	$this->session->userdata("wid");
		$this->db->select('*');
		$this->db->from('user_alerts'); 
		$this->db->where('user_id',$userId);
		$this->db->order_by("id","DESC");
		$query 			=	$this->db->get();
		$result 			=	$query->result();
		return $result;
	}


	function getAbstract($abstractid)
	{
		$this->db->select('user_master.first_name,user_master.last_name,abstract.id,abstract.status,abstract.title as abtitle,abstract_category.title as cattitle,abstract.submission_date,abstract.ab_content,abstract.tags,abstract.status');
		$this->db->from('abstract');
		$this->db->join("user_master","user_master.id=abstract.user_id");
		$this->db->join("abstract_category","abstract_category.id=abstract.category");
		$this->db->where('abstract.id',$abstractid);
		$query 			=	$this->db->get();
		$row 			=	$query->row();
		return $row;
	}
}