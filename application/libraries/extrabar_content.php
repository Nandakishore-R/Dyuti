<?php if( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Extrabar_content 
{
	function __construct()
	{
		$this->ci 		=	& get_instance();
	}

	function totalProducts()
	{
		$this->ci->db->select('*');
		$this->ci->db->from('products_master');
		$this->ci->db->where('status',1);
		$query 			=	$this->ci->db->get();
		$productCount 	=	$query->num_rows();
		return $productCount;
	}

	function totalBrands()
	{
		$this->ci->db->select('*');
		$this->ci->db->from('brand_master');
		$this->ci->db->where('status',1);
		$query 			=	$this->ci->db->get();
		$brandCount 	=	$query->num_rows();
		return $brandCount;
	}

	function totalWebusers()
	{
		$this->ci->db->select('*');
		$this->ci->db->from('user_master');
		$this->ci->db->where('user_type',5);
		$this->ci->db->where('is_confirmed',1);
		$query 			=	$this->ci->db->get();
		$webuserCount 	=	$query->num_rows();
		return $webuserCount;
	}

	function totalFranchise()
	{
		$this->ci->db->select('*');
		$this->ci->db->from('user_master');
		$this->ci->db->where('user_type',2);
		$this->ci->db->where('is_confirmed',1);
		$query 			=	$this->ci->db->get();
		$franchiseCount =	$query->num_rows();
		return $franchiseCount;
	}

	function offerProducts()
	{
		$this->ci->db->select('*');
		$this->ci->db->from('offer_products');
		$this->ci->db->where('status',1);
		$query 			=	$this->ci->db->get();
		$offerCount 	=	$query->num_rows();
		return $offerCount;
	}

	function newOrders()
	{
		$this->ci->db->select('*');
		$this->ci->db->from('orders');
		$this->ci->db->where('order_status',0);
		$query 			=	$this->ci->db->get();
		$orderCount 	=	$query->num_rows();
		return $orderCount;
	}

	function recentOrdersHeader()
	{
		$this->ci->db->select('orders.id,orders.order_date,orders.payment_amount,user_master.first_name,user_master.last_name');
		$this->ci->db->from('orders');
		$this->ci->db->where('order_status',0);
		$this->ci->db->join('user_master','user_master.id=orders.user_id','left');
		$this->ci->db->order_by('order_date');
		$this->ci->db->limit(5);
		$query 				=	$this->ci->db->get();
		$resultArray 		=	$query->result_array();
		return $resultArray;
	}

	function recentOrderNumber()
	{
		$this->ci->db->select('*');
		$this->ci->db->from('orders');
		$this->ci->db->where('order_status',0); 
		$this->ci->db->order_by('order_date');
		$query 				=	$this->ci->db->get();
		$num 				=	$query->num_rows();
		return $num;
	}

	function recentSellerOrders()
	{
		$sellerId 	=	$this->ci->session->userdata('sid');
		$this->ci->db->select('orders.id,orders.order_date,orders.payment_amount,user_master.first_name,user_master.last_name');
		$this->ci->db->from('products_master');
		$this->ci->db->join('order_details','order_details.product_id=products_master.id');
		$this->ci->db->join('orders','orders.id=order_details.cart_id');
		$this->ci->db->join('user_master','user_master.id=orders.user_id');
		$this->ci->db->where('order_status',0);
		$this->ci->db->where('seller_id',$sellerId);
		$this->ci->db->group_by('order_details.cart_id');
		$query 				=	$this->ci->db->get();
		$result 			=	$query->result();
		return $result;
	}
	

}