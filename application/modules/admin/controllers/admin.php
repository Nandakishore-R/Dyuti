<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->base_uri = $this->config->item('admin_url').'admin';	
	}
	
	public function index()
	{
		$this->session->sess_destroy();
		$data['action'] 	=	$this->config->item('admin_url')."login/auth";
		if($this->input->get('msg'))
		{
			$data['msg']	=	$this->input->get('msg');
		} else {
			$data['msg']	=	"";
		}	
		$this->load->view('login',$data);
	}
}
