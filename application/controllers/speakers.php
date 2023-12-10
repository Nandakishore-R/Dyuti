<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Speakers extends MX_Controller 
{
// 	function __construct()
// 	{
// 		parent::__construct();
// 		/* SEO */
// 		$this->load->model('Seomodel','Seo',TRUE);
// 		/* SEO */
// 		$this->load->model('Speakersmodel','Speakers',TRUE);
// 	}

	function index()
	{
// 		$seo 								=	$this->Seo->getSeoVariables("speakers");
// 		$data['title'] 						=	$seo->mtitle;
// 		$data['mkey'] 						=	$seo->mkey;
// 		$data['mdesc'] 						=	$seo->mdesc;

// 		$data['speakers'] 					=	$this->Speakers->getAllSpeakers();
// 		$this->load->view('speakers',$data);
	$this->load->view('speakers');
	}

// 	function viewSpeaker()
// 	{
// 		$spid 		=	$this->input->post("spid");
// 		echo $this->Speakers->getSpeakerData($spid);
// 	}
}