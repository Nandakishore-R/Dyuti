<?php

class Gallerymodel extends CI_Model 
{
	function getGalleryData()
	{
		$galleryArray 	=	array();
		$this->db->select('*');
		$this->db->from('image_category');
		$this->db->where('image_category.status',1);
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		foreach ($result as $key => $value) {
			$galleryArray[$key]['catname'] 		=	$value->category_name;
			$galleryArray[$key]['slug'] 		=	$value->slug;
			$galleryArray[$key]['catImages'] 	=	$this->getGalleryImages($value->id);
		}
		return $galleryArray;
	}

	function getGalleryImages($catId)
	{
		$this->db->select("*");
		$this->db->from("image_gallery");
		$this->db->where("category",$catId);
		$this->db->where("status",1);
		$query 				=	$this->db->get();
		$result1 			=	$query->result();
		return $result1;
	}
}