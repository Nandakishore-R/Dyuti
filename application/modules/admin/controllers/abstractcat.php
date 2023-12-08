<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abstractcat extends MX_Controller 
{
	public $tab_groups;

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('admin/login');
		}
		$this->load->model('Abstractcatmodel','Abstractcat',TRUE);
		$this->template->set('title','Abstract category');
		$this->base_uri 			=	$this->config->item('admin_url')."abstractcat";
	}

	function index()
	{
		$data['page_title']			=	"Abstract category";
		$data['output']				=	$this->Abstractcat->list_all();
		$this->template->load('template','abstractcat',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->Abstractcat->list_all();
	}

	function add()
	{
		$data['page_title']			=	"Add Abstract Category";
		$data['action']				=	$this->base_uri.'/insert';
		$data['id']					=	"";
		$data['title']				=	"";
		$data['description']		=	"";
		$this->template->load('template','abstractcat_add',$data);
	}

	function insert()
	{
		$title 										=	$this->input->post('title');
		$this->tab_groups['title']					=	$title;
		$this->tab_groups['slug']					=	url_title($title,'dash',TRUE);
		$desc 										=	$this->input->post('description');
		if($desc=="")
		{
			redirect($this->base_uri."/add");
		}
		else {
			$this->tab_groups['description']			=	
			$this->db->insert('abstract_category',$this->tab_groups);
			redirect($this->base_uri);
		}
		
	}

	function edit($id)
	{
		$data['page_title']			=	"Edit Abstract Category";
		$data['action']				=	$this->base_uri.'/update';
		$row 						=	$this->Abstractcat->getOneItem($id);
		$data['id']					=	$id;
		$data['title']				=	$row->title; 
		$data['description']		=	$row->description;
		$this->template->load('template','abstractcat_add',$data);
	}

	function update()
	{
		$id 										=	$this->input->post('id');
		$title 										=	$this->input->post('title');
		$this->tab_groups['title']					=	$title;
		$this->tab_groups['slug']					=	url_title($title,'dash',TRUE); 
		$this->tab_groups['description']			=	$this->input->post('description');
		$this->db->update('abstract_category',$this->tab_groups,array("id"=>$id));
		redirect($this->base_uri);
	}

	function active($id,$status)
	{
		$data 			=	array('status'=>$status);
		$this->db->update('abstract_category',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$this->db->delete('abstract_category',array('id'=>$id));
		$this->list_ajax();
	}
}