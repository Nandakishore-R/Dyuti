<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Programs extends MX_Controller {

	public $tab_groups;

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in')) 
		{
			redirect('admin/login');
		}
		$this->template->set('title', 'Programs');
		$this->load->model('Programsmodel','Programs',TRUE);
		$this->load->model('Speakersmodel','Speakers',TRUE);
		$this->base_uri 	=	$this->config->item('admin_url')."programs";
	}

	public function index()
	{
		$data['page_title']   		=	'Programs';
		$data['actionpgm']   		=	$this->base_uri.'/insertpgm';
		$data['output']				=	$this->Programs->list_all();
		$this->template->load('template','programs',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->Programs->list_all();
	}

	function add()
	{
		$data['action'] 			=	$this->base_uri.'/insert';
		$data['page_title'] 		=	"Add Venue";
		$data['id']					=	"";
		$data['location']			=	"";
		$this->template->load('template','location_add',$data);
	}

	function insert()
	{
		$location 							=	$this->input->post('location');
		$this->tab_groups['location'] 		=	$location;
		$this->tab_groups['slug']			=	url_title($location,'dash',TRUE);
		$this->db->insert('program_location',$this->tab_groups);
		redirect($this->base_uri);
	}

	function edit($id)
	{
		$data['action'] 			=	$this->base_uri.'/update';
		$data['page_title'] 		=	"Edit Venue";
		$row 						=	$this->Programs->getOneItem($id);
		$data['id']					=	$row->id;
		$data['location']			=	$row->location;
		$this->template->load('template','location_add',$data);
	}

	function update()
	{
		$id 								=	$this->input->post('id');
		$location 							=	$this->input->post('location');
		$this->tab_groups['location'] 		=	$location;
		$this->tab_groups['slug']			=	url_title($location,'dash',TRUE);
		$this->db->update('program_location',$this->tab_groups,array('id'=>$id));
		redirect($this->base_uri);
	}

	function active($id,$status)
	{
		$data 			=	array('status'=>$status);
		$this->db->update('program_location',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$this->db->delete('program_location',array('id'=>$id));
		$this->list_ajax();	
	}

	function view($id)
	{
		$data['page_title'] 		=	"Schedule Programs";
		$row 						=	$this->Programs->getOneItem($id);
		$data['row']				=	$row;
		$data['locId']				=	$id;
		$data['dayslist']			=	$this->Programs->getDays();
		$this->template->load('template','location_view',$data);
	}

	function getProgarmData()
	{
		$ptype 						=	$this->input->post("ptype");
		if($ptype == "speech")
		{
			echo $this->Speakers->getSpeakersList();
		}
		if($ptype == "abstract")
		{
			echo $this->Speakers->getAbstractList();
		}
		if($ptype == "others")
		{
			$out 	=	"<input id='detail' name='detail' class='form-control validate[required]'/>";
			echo $out;
		}
	}

	function programSubmit()
	{
		$this->tab_groups['location'] 			=	$this->input->post("locId");
		$this->tab_groups['day_id'] 			=	$this->input->post("dayid");	
		$this->tab_groups['stime'] 				=	$this->input->post("timepicker1");
		$this->tab_groups['etime'] 				=	$this->input->post("timepicker2");
		$this->tab_groups['pgm_type'] 			=	$this->input->post("optradio");
		$this->tab_groups['pgm_details'] 		=	$this->input->post("detail");
		$this->tab_groups['description'] 		=	$this->input->post("desc");
		$this->db->insert("program_master",$this->tab_groups);
		echo "<div class='alertPgm alert-success'><strong>Success</strong> Program Inserted Successfully.</div>";
	}

	function getDayPrograms()
	{
		$dayid 				=	$this->input->post("dayid");
		echo $this->Programs->listDayPrograms($dayid);
	}
}