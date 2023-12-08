<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Call_for_papers extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$this->load->model('Papercallmodel','Papercall',TRUE);
	}

	function index()
	{
		$seo 				=	$this->Seo->getSeoVariables("call_for_papers");
		$data['title'] 		=	$seo->mtitle;
		$data['mkey'] 		=	$seo->mkey;
		$data['mdesc'] 		=	$seo->mdesc;

		$data['themes'] 	=	$this->Papercall->getThemes();
		$this->load->view('call-for-papers',$data);
	}
}