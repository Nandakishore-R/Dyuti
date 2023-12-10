<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comingsoon extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
	}

	function index()
	{
		$seo 								=	$this->Seo->getSeoVariables("comingsoon");
		$data['title'] 						=	$seo->mtitle;
		$data['mkey'] 						=	$seo->mkey;
		$data['mdesc'] 						=	$seo->mdesc;
		$this->load->view('comingsoon',$data);
	}
}