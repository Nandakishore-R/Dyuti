<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Speakers extends MX_Controller 
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
		$this->load->model('Speakersmodel','Speakers',TRUE);
		$this->template->set('title','Speakers');
		$this->base_uri 			=	$this->config->item('admin_url')."speakers";
	}

	function index()
	{
		$data['page_title']			=	"Speakers";
		$data['output']				=	$this->Speakers->list_all();
		$this->template->load('template','speakers',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->Speakers->list_all();
	}

	function add()
	{
		$data['page_title']			=	"Add Speakers";
		$data['action']				=	$this->base_uri.'/insert';
		$data['id']					=	"";
		$data['name']				=	"";
		$data['email_id']			=	"";
		$data['phone']				=	"";
		$data['description']		=	"";
		$data['image']				=	"";
		$this->template->load('template','speakers_add',$data);
	}

	function insert()
	{
		$name 										=	$this->input->post('name');
		$this->tab_groups['name']					=	$name;
		$this->tab_groups['slug']					=	url_title($name,'dash',TRUE); 
		$this->tab_groups['email_id']				=	$this->input->post('email_id');
		$this->tab_groups['phone_number']			=	$this->input->post('phone');
		$this->tab_groups['profile_description']	=	$this->input->post('description');
		$this->db->insert('speakers',$this->tab_groups);

		$id 								=	$this->db->insert_id();
		$config['upload_path']				=	$this->config->item('image_path').'speakers/original/';
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
			$this->db->update('speakers', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
			$this->messages->add($error, 'error');
		}
		/*$fileToDelete = glob($this->config->item('image_path').'speakers/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'speakers/original/');
		redirect($this->base_uri);
	}

	function edit($id)
	{
		$data['page_title']			=	"Edit Speakers";
		$data['action']				=	$this->base_uri.'/update';
		$row 						=	$this->Speakers->getOneItem($id);
		$data['id']					=	$id;
		$data['name']				=	$row->name;
		$data['email_id']			=	$row->email_id;
		$data['phone']				=	$row->phone_number;
		$data['description']		=	$row->profile_description;
		$data['image']				=	$row->image;
		$this->template->load('template','speakers_add',$data);
	}

	function update()
	{
		$id 										=	$this->input->post('id');
		$name 										=	$this->input->post('name');
		$this->tab_groups['name']					=	$name;
		$this->tab_groups['slug']					=	url_title($name,'dash',TRUE); 
		$this->tab_groups['email_id']				=	$this->input->post('email_id');
		$this->tab_groups['phone_number']			=	$this->input->post('phone');
		$this->tab_groups['profile_description']	=	$this->input->post('description');
		$this->db->update('speakers',$this->tab_groups,array("id"=>$id));

		$config['upload_path']				=	$this->config->item('image_path').'speakers/original/';
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
			$this->db->update('speakers', $this->form_image,array('id'=>$id));
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
		delete_files($this->config->item('image_path').'speakers/original/');
		redirect($this->base_uri);
	}

	

	function active($id,$status)
	{
		$data 			=	array('status'=>$status);
		$this->db->update('speakers',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$row 			=	$this->Speakers->getOneItem($id);
		unlink($this->config->item('image_path').'speakers/small/'.$row->image);
		unlink($this->config->item('image_path').'speakers/'.$row->image);
		$this->db->delete('speakers',array('id'=>$id));
		$this->list_ajax();
	}

	function process_uploaded_image($filename)
	{
		$large_path 	=	$this->config->item('image_path').'speakers/original/'.$filename;
		$medium_path 	=	$this->config->item('image_path').'speakers/'.$filename;
		$thumb_path 	=	$this->config->item('image_path').'speakers/small/'.$filename;
		
		$medium_config['image_library'] 	=	'gd2';
		$medium_config['source_image'] 		=	$large_path;
		$medium_config['new_image'] 		=	$medium_path;
		$medium_config['maintain_ratio'] 	=	TRUE;
		$medium_config['width'] 			=	101;
		$medium_config['height'] 			=	156;
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