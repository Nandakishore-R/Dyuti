<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MX_Controller 
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
		$this->load->model('Newsmodel','News',TRUE);
		$this->template->set('title','News & Events');
		$this->base_uri 			=	$this->config->item('admin_url')."news";
	}

	function index()
	{
		$data['page_title']			=	"News & Events";
		$data['output']				=	$this->News->list_all();
		$this->template->load('template','news',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->News->list_all();
	}

	function add()
	{
		$data['page_title']			=	"Add News & Events";
		$data['action']				=	$this->base_uri.'/insert';
		$data['id']					=	"";
		$data['title']				=	"";
		$data['published_by']		=	"";
		$data['sdate']				=	"";
		$data['edate']				=	"";
		$data['description']		=	"";
		$data['image']				=	"";
		$this->template->load('template','news_add',$data);
	}

	function insert()
	{
		$title 										=	$this->input->post('title');
		$this->tab_groups['title']					=	$title;
		$this->tab_groups['slug']					=	url_title($title,'dash',TRUE);
		$this->tab_groups['published_by']			=	$this->input->post('published_by');
		$this->tab_groups['start_date']				=	$this->input->post('sdate');
		$this->tab_groups['end_date']				=	$this->input->post('edate'); 
		$this->tab_groups['description']			=	$this->input->post('description');
		$this->db->insert('news',$this->tab_groups);

		$id 								=	$this->db->insert_id();
		$config['upload_path']				=	$this->config->item('image_path').'news/original/';
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
			$this->db->update('news', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
			$this->messages->add($error, 'error');
		}
		/*$fileToDelete = glob($this->config->item('image_path').'news/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'news/original/');
		redirect($this->base_uri);
	}

	function edit($id)
	{
		$data['page_title']			=	"Edit News & Events";
		$data['action']				=	$this->base_uri.'/update';
		$row 						=	$this->News->getOneItem($id);
		$data['id']					=	$id;
		$data['title']				=	$row->title;
		$data['published_by']		=	$row->published_by;
		$data['sdate']				=	$row->start_date;
		$data['edate']				=	$row->end_date;
		$data['description']		=	$row->description;
		$data['image']				=	$row->image;
		$this->template->load('template','news_add',$data);
	}

	function update()
	{
		$id 										=	$this->input->post('id');
		$title 										=	$this->input->post('title');
		$this->tab_groups['title']					=	$title;
		$this->tab_groups['slug']					=	url_title($title,'dash',TRUE);
		$this->tab_groups['published_by']			=	$this->input->post('published_by');
		$this->tab_groups['start_date']				=	$this->input->post('sdate');
		$this->tab_groups['end_date']				=	$this->input->post('edate'); 
		$this->tab_groups['description']			=	$this->input->post('description');
		$this->db->update('news',$this->tab_groups,array('id'=>$id));

		$config['upload_path']				=	$this->config->item('image_path').'news/original/';
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
			$this->db->update('news', $this->form_image,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();
		}
		/*$fileToDelete = glob($this->config->item('image_path').'news/original/*');
		foreach($fileToDelete as $file){ 
			if(is_file($file))
				unlink($file); 
		}*/
		delete_files($this->config->item('image_path').'news/original/');
		redirect($this->base_uri);
	}

	

	function active($id,$status)
	{
		$data 			=	array('status'=>$status);
		$this->db->update('news',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$row 			=	$this->News->getOneItem($id);
		unlink($this->config->item('image_path').'news/small/'.$row->image);
		unlink($this->config->item('image_path').'news/'.$row->image);
		$this->db->delete('news',array('id'=>$id));
		$this->list_ajax();
	}

	function process_uploaded_image($filename)
	{
		$large_path 	=	$this->config->item('image_path').'news/original/'.$filename;
		$medium_path 	=	$this->config->item('image_path').'news/'.$filename;
		$thumb_path 	=	$this->config->item('image_path').'news/small/'.$filename;
		
		$medium_config['image_library'] 	=	'gd2';
		$medium_config['source_image'] 		=	$large_path;
		$medium_config['new_image'] 		=	$medium_path;
		$medium_config['maintain_ratio'] 	=	TRUE;
		$medium_config['width'] 			=	484;
		$medium_config['height'] 			=	318;
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