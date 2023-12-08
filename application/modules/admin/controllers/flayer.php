<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flayer extends MX_Controller 
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
		$this->load->model('Flayermodel');
		$this->template->set('title','Flayer');
		$this->base_uri 			=	$this->config->item('admin_url')."flayer";
	}

	function index()
	{
		$data['page_title']			=	"Flayer";
		$data['output']				=	$this->Flayermodel->list_all();
		$this->template->load('template','flayer',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->Flayermodel->list_all();
	}

	function add()
	{
		$data['page_title']			=	"Add Flayer";
		$data['action']				=	$this->base_uri.'/insert';
		$data['cat_dd']				=	$this->Flayermodel->get_flayer_category();
		$data['id']					=	"";
		$data['title']				=	"";
		$data['description']		=	"";
		$data['image']				=	"";
		$this->template->load('template','flayer_add',$data);
	}

	function insert()
	{
		$title 								=	$this->input->post('title');
		$this->tab_groups['title']			=	$title;
		$this->tab_groups['slug']			=	url_title($title,'dash',TRUE);
		$this->tab_groups['category_id']	=	$this->input->post('category');
		$this->tab_groups['description']	=	$this->input->post('description');
		$this->db->insert('flayer_master',$this->tab_groups);

		$id 								=	$this->db->insert_id();

		$config['upload_path']				=	$this->config->item('image_path').'flayer/original/';
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
			$this->db->update('flayer_master', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
			$this->messages->add($error, 'error');
		}
		/*$fileToDelete = glob($this->config->item('image_path').'flayer/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'flayer/original/');
		redirect($this->base_uri);
	}

	function edit($id)
	{
		$data['page_title']			=	"Edit Flayer";
		$data['action']				=	$this->base_uri.'/update';
		$row 						=	$this->Flayermodel->get_one_flayer($id);
		$data['cat_dd']				=	$this->Flayermodel->get_selected_category($row->category_id);
		$data['id']					=	$row->id;
		$data['title']				=	$row->title;
		$data['description']		=	$row->description;
		$data['image']				=	$row->image;
		$this->template->load('template','flayer_add',$data);
	}

	function update()
	{
		$id 								=	$this->input->post('id');
		$title 								=	$this->input->post('title');
		$this->tab_groups['title']			=	$title;
		$this->tab_groups['slug']			=	url_title($title,'dash',TRUE);
		$this->tab_groups['category_id']	=	$this->input->post('category');
		$this->tab_groups['description']	=	$this->input->post('description');
		$this->db->update('flayer_master', $this->tab_groups,array('id'=>$id));

		$config['upload_path']				=	$this->config->item('image_path').'flayer/original/';
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
			$this->db->update('flayer_master', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
			$this->messages->add($error, 'error');
		}
		/*$fileToDelete = glob($this->config->item('image_path').'flayer/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'flayer/original/');
		redirect($this->base_uri);
	}

	function process_uploaded_image($filename)
	{
		$large_path 	=	$this->config->item('image_path').'flayer/original/'.$filename;
		$medium_path 	=	$this->config->item('image_path').'flayer/'.$filename;
		$thumb_path 	=	$this->config->item('image_path').'flayer/small/'.$filename;
		
		$medium_config['image_library'] 	=	'gd2';
		$medium_config['source_image'] 		=	$large_path;
		$medium_config['new_image'] 		=	$medium_path;
		$medium_config['maintain_ratio'] 	=	TRUE;
		$medium_config['width'] 			=	1366;
		$medium_config['height'] 			=	539;
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
		$data 				=	array('status'=>$status);
		$this->db->update('flayer_master',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$row 				=	$this->Flayermodel->get_one_flayer($id);
		unlink($this->config->item('image_path').'flayer/small/'.$row->image);
		unlink($this->config->item('image_path').'flayer/'.$row->image);
		$this->db->delete('flayer_master',array('id'=>$id));
		$this->list_ajax();
	}
}