<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attractions extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$this->load->model('Attractionmodel','Attraction',TRUE);
	}

	function index()
	{
		$seo 								=	$this->Seo->getSeoVariables("attractions");
		$data['title'] 						=	$seo->mtitle;
		$data['mkey'] 						=	$seo->mkey;
		$data['mdesc'] 						=	$seo->mdesc;
		$data['attractions'] 				=	$this->Attraction->getAllAttractions();
		$this->load->view('attractions',$data);
	}
}