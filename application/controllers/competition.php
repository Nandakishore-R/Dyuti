<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class competition extends MX_Controller 
{
	function index()
	{
	    
		$this->load->view('competition');
	}
}