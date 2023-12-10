<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Programs extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$this->load->model("Programsmodel","Programs",TRUE);
	}

	function index()
	{
		$seo 					=	$this->Seo->getSeoVariables("programs");
		$data['title'] 			=	$seo->mtitle;
		$data['mkey'] 			=	$seo->mkey;
		$data['mdesc'] 			=	$seo->mdesc;

		$programs 				=	$this->Programs->getPrograms();
		$data['programs'] 		=	$programs;
		$data['locSize'] 		=	sizeof($programs);
		$this->load->view('programs',$data);
	}
}