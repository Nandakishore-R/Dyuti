<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$this->load->model('Newsmodel','News',TRUE);
	}

	function index()
	{
		$seo 								=	$this->Seo->getSeoVariables("news");
		$data['title'] 						=	$seo->mtitle;
		$data['mkey'] 						=	$seo->mkey;
		$data['mdesc'] 						=	$seo->mdesc;
		$data['news'] 						=	$this->News->getAllNews();
		$this->load->view('news',$data);
	}
}