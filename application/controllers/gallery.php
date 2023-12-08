<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MX_Controller 
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
		$seo 				=	$this->Seo->getSeoVariables("gallery");
		$data['title'] 		=	$seo->mtitle;
		$data['mkey'] 		=	$seo->mkey;
		$data['mdesc'] 		=	$seo->mdesc;
		$data['gallery'] 	=	$this->Gallery->getGalleryData();
		$this->load->view('gallery',$data);
	}
}