<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attractions extends MX_Controller 
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
		$this->load->model('Attractionsmodel','Attractions',TRUE);
		$this->template->set('title','Attractions');
		$this->base_uri 			=	$this->config->item('admin_url')."attractions";
	}

	function index()
	{
		$data['page_title']			=	"Attractions";
		$data['output']				=	$this->Attractions->list_all();
		$this->template->load('template','attractions',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->Attractions->list_all();
	}

	function add()
	{
		$data['page_title']			=	"Add Attractions";
		$data['action']				=	$this->base_uri.'/insert';
		$data['id']					=	"";
		$data['title']				=	"";
		$data['description']		=	"";
		$data['url']				=	"";
		$data['image']				=	"";
		$this->template->load('template','attraction_add',$data);
	}

	function insert()
	{
		$title 										=	$this->input->post('title');
		$this->tab_groups['title']					=	$title;
		$this->tab_groups['slug']					=	url_title($title,'dash',TRUE); 
		$this->tab_groups['description']			=	$this->input->post('description');
		$this->tab_groups['url']					=	$this->input->post('url');
		$this->db->insert('attractions',$this->tab_groups);

		$id 								=	$this->db->insert_id();
		$config['upload_path']				=	$this->config->item('image_path').'attractions/original/';
		$config['allowed_types']			=	'gif|jpg|jpeg|png';
		$config['max_size']					=	'20000';
		@$config['file_name']				=	$id.$config['file_ext'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image'))
		{		
			$data = array('upload_data' => $this->upload->data());
			$this->process_uploaded_image($data['upload_data']['file_name']);
			$this->form_image['image']=	$data['upload_data']['file_name'];
			$this->db->update('attractions', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
			$this->messages->add($error, 'error');
		}
		/*$fileToDelete = glob($this->config->item('image_path').'attractions/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'attractions/original/');
		redirect($this->base_uri);
	}

	function edit($id)
	{
		$data['page_title']			=	"Edit Attractions";
		$data['action']				=	$this->base_uri.'/update';
		$row 						=	$this->Attractions->getOneItem($id);
		$data['id']					=	$id;
		$data['title']				=	$row->title;
		$data['description']		=	$row->description;
		$data['url']				=	$row->url;
		$data['image']				=	$row->image;
		$this->template->load('template','attraction_add',$data);
	}

	function update()
	{
		$id 										=	$this->input->post('id');
		$title 										=	$this->input->post('title');
		$this->tab_groups['title']					=	$title;
		$this->tab_groups['slug']					=	url_title($title,'dash',TRUE); 
		$this->tab_groups['description']			=	$this->input->post('description');
		$this->tab_groups['url']					=	$this->input->post('url');
		$this->db->update('attractions',$this->tab_groups,array('id'=>$id));

		$config['upload_path']				=	$this->config->item('image_path').'attractions/original/';
		$config['allowed_types']			=	'gif|jpg|jpeg|png';
		$config['max_size']					=	'20000';
		@$config['file_name']				=	$id.$config['file_ext'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (  $this->upload->do_upload('image'))
		{		
			$data = array('upload_data' => $this->upload->data());
			$this->process_uploaded_image($data['upload_data']['file_name']);
			$this->form_image['image']=	$data['upload_data']['file_name'];
			$this->db->update('attractions', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();
		}
		/*$fileToDelete = glob($this->config->item('image_path').'speakers/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'attractions/original/');
		redirect($this->base_uri);
	}

	

	function active($id,$status)
	{
		$data 			=	array('status'=>$status);
		$this->db->update('attractions',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$row 			=	$this->Attractions->getOneItem($id);
		unlink($this->config->item('image_path').'attractions/small/'.$row->image);
		unlink($this->config->item('image_path').'attractions/'.$row->image);
		$this->db->delete('attractions',array('id'=>$id));
		$this->list_ajax();
	}

	function process_uploaded_image($filename)
	{
		$large_path 	=	$this->config->item('image_path').'attractions/original/'.$filename;
		$medium_path 	=	$this->config->item('image_path').'attractions/'.$filename;
		$thumb_path 	=	$this->config->item('image_path').'attractions/small/'.$filename;
		
		$medium_config['image_library'] 	=	'gd2';
		$medium_config['source_image'] 		=	$large_path;
		$medium_config['new_image'] 		=	$medium_path;
		$medium_config['maintain_ratio'] 	=	TRUE;
		$medium_config['width'] 			=	484;
		$medium_config['height'] 			=	441;
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
}