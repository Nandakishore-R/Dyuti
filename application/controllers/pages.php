<?php if(!defined('BASEPATH')) exit('No Direct script access allowed');

class Pages extends MX_Controller {

	function __construct()
	{
		parent::__construct(); 
	  	$this->load->model('Pagemodel','Page',TRUE);
	}

 	public function pageView($url)
 	{
 		$output 			=	$this->Page->getPageContent($url);
		$data['title'] 		=	$output['meta_title'];
		$data['mkey'] 		=	$output['meta_keyword'];
		$data['mdesc'] 		=	$output['meta_description'];

 		if($output)
 		{
 			$data['output']   	= 	$output;
 		} else {
 			$data['output']   	= 	array();
 		}
  		$this->load->view('pages',$data);
 	}
}
