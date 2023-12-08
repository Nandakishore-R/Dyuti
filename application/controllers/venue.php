<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venue extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$this->load->model('Gallerymodel','Gallery',TRUE);
	}

	function index()
	{
		$seo 				=	$this->Seo->getSeoVariables("rajagiri");
		$data['title'] 		=	$seo->mtitle;
		$data['mkey'] 		=	$seo->mkey;
		$data['mdesc'] 		=	$seo->mdesc;
		$this->load->view('venue',$data);
	}
}