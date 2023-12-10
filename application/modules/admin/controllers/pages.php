<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MX_Controller 
{
	public $tab_groups;
	public $form_image;

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('admin/login');
		}
		$this->load->model('Pagesmodel');
		$this->template->set('title','Pages');
		$this->base_uri 			=	$this->config->item('admin_url')."pages";
	}

	function index()
	{
		$data['page_title']			=	'Pages';
		$data['list_page']			=	$this->Pagesmodel->list_all();
		$this->template->load('template','pages',$data);
	}

	public function list_ajax()
	{
		echo $data['list_page']		=	$this->Pagesmodel->list_all();
	}

	function add()
	{
		$data['action']				=	$this->base_uri.'/insert';
		$data['page_title']			=	"Add Page";
		$data['id']					=	"";
		$data['page_name']			=	"";
		$data['url']				=	"";
		$data['description']		=	"";
		$data['banner_image']		=	""; 
		$data['meta_keyword']		=	"";
		$data['meta_title']			=	"";
		$data['meta_description']	=	"";
		$this->template->load('template','pages_add',$data);
	}

	function insert()
	{
		$page_name 								=	$this->input->post('page_name');
		$this->tab_groups['page_name']			=	$page_name;
		$this->tab_groups['slug']				=	url_title($page_name,'dash',TRUE);
		$this->tab_groups['url']				=	$this->input->post('url');
		$this->tab_groups['description']		=	$this->input->post('description');
		$this->tab_groups['meta_title']			=	$this->input->post('meta_title');
		$this->tab_groups['meta_keyword']		=	$this->input->post('meta_keyword');
		$this->tab_groups['meta_description']	=	$this->input->post('meta_description');
		$this->db->insert('page_master',$this->tab_groups);
		
		$id 									=	$this->db->insert_id();
		$config['upload_path']					=	$this->config->item('image_path').'pages/original/';
		$config['allowed_types']				=	'gif|jpg|jpeg|png';
		$config['max_size']						=	'20000';
		@$config['file_name']					=	$id.$config['file_ext'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (  $this->upload->do_upload('banner_image'))
		{		
			$data = array('upload_data' => $this->upload->data());
			$this->process_uploaded_banner($data['upload_data']['file_name']);
			$this->form_image['banner_image']	=	$data['upload_data']['file_name'];
			$this->db->update('page_master', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
		}
		/*$fileToDelete = glob($this->config->item('image_path').'pages/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'pages/original/');
		redirect($this->base_uri);
	}

	function edit($id)
	{
		$data['action']				=	$this->base_uri.'/update';
		$data['page_title']			=	"Edit Page";
		$row 						=	$this->Pagesmodel->get_one_page($id);
		$data['id']					=	$id;
		$data['page_name']			=	$row->page_name;
		$data['url']				=	$row->url;
		$data['description']		=	$row->description;
		$data['meta_title']			=	$row->meta_title;
		$data['banner_image']		=	$row->banner_image; 
		$data['meta_keyword']		=	$row->meta_keyword;
		$data['meta_description']	=	$row->meta_description;
		$this->template->load('template','pages_add',$data);
	}

	function update()
	{
		$id 									=	$this->input->post('id');
		$pageName 								=	$this->input->post('page_name');
		$this->tab_groups['page_name']			=	$pageName;
		$this->tab_groups['slug']				=	url_title($pageName,'dash',TRUE);
		$this->tab_groups['url']				=	$this->input->post('url');
		$this->tab_groups['meta_title']			=	$this->input->post('meta_title');
		$this->tab_groups['description']		=	$this->input->post('description');
		$this->tab_groups['meta_keyword']		=	$this->input->post('meta_keyword');
		$this->tab_groups['meta_description']	=	$this->input->post('meta_description');
		$this->db->update('page_master',$this->tab_groups,array('id'=>$id));

		$config['upload_path']					=	$this->config->item('image_path').'pages/original/';
		$config['allowed_types']				=	'gif|jpg|jpeg|png';
		$config['max_size']						=	'20000';
		@$config['file_name']					=	$id.$config['file_ext'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('banner_image'))
		{		
			$data = array('upload_data' => $this->upload->data());
			$this->process_uploaded_banner($data['upload_data']['file_name']);
			$this->form_image['banner_image']	=	$data['upload_data']['file_name'];
			$this->db->update('page_master', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
		}
		/*$fileToDelete = glob($this->config->item('image_path').'pages/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'pages/original/');
		redirect($this->base_uri);
	}

	function process_uploaded_banner($filename)
	{
		$large_path 	=	$this->config->item('image_path').'pages/original/'.$filename;
		$medium_path 	=	$this->config->item('image_path').'pages/banner/'.$filename;
		$thumb_path 	=	$this->config->item('image_path').'pages/banner_small/'.$filename;
		
		$medium_config['image_library'] 	=	'gd2';
		$medium_config['source_image'] 		=	$large_path;
		$medium_config['new_image'] 		=	$medium_path;
		$medium_config['maintain_ratio'] 	=	TRUE;
		$medium_config['width'] 			=	1920;
		$medium_config['height'] 			=	522;
		$this->load->library('image_lib', $medium_config);
		$this->image_lib->initialize($medium_config);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
			return false;
		}

		$thumb_config['image_library'] 		=	'gd2';
		$thumb_config['source_image'] 		=	$large_path;
		$thumb_config['new_image'] 			=	$thumb_path;
		$thumb_config['maintain_ratio'] 	=	TRUE;
		$thumb_config['width'] 				=	50;
		$thumb_config['height'] 			=	50;
		$this->load->library('image_lib', $thumb_config);
		$this->image_lib->initialize($thumb_config);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
			return false;
		}

		return true;    
	}

	function active($id,$status)
	{
		$data 			=	array('status'=>$status);
		$this->db->update('page_master',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$row 			=	$this->Pagesmodel->get_one_page($id);
		unlink($this->config->item('image_path').'page/banner/'.$row->banner_image);
		unlink($this->config->item('image_path').'page/banner_small/'.$row->banner_image); 
		$this->db->delete('page_master',array('id'=>$id));
		$this->list_ajax();
	}
}