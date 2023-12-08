<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MX_Controller {

	public $tab_groups;

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in')) 
		{
			redirect('admin/login');
		}
		$this->template->set('title', 'Gallery');
		$path                       =   $this->config->item('image_path').'gallery/';
        $config['upload_path']      =   $path;
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = '204800';
        $this->load->library('upload', $config);
		$this->load->model('Gallerymodel','Gallery',TRUE);
		$this->base_uri 	=	$this->config->item('admin_url')."gallery";
	}

	public function index()
	{
		$data['page_title']   		=	'Gallery';
		$data['output']				=	$this->Gallery->list_all();
		$data['imgaction']			=	$this->base_uri.'/do_upload';
		$this->template->load('template','gallery',$data);
	}

	public function list_ajax()
	{
		echo $data['output']		=	$this->Gallery->list_all();
	}

	function add()
	{
		$data['action'] 			=	$this->base_uri.'/insert';
		$data['page_title'] 		=	"Add Category";
		$data['id']					=	"";
		$data['category']			=	"";
		$this->template->load('template','gallery_add',$data);
	}

	function insert()
	{
		$catName 							=	$this->input->post('category');
		$this->tab_groups['category_name'] 	=	$catName;
		$this->tab_groups['slug']			=	url_title($catName,'dash',TRUE);
		$this->db->insert('image_category',$this->tab_groups);
		redirect($this->base_uri);
	}

	function edit($id)
	{
		$data['action'] 			=	$this->base_uri.'/update';
		$data['page_title'] 		=	"Edit Category";
		$row 						=	$this->Gallery->getOneItem($id);
		$data['id']					=	$row->id;
		$data['category']			=	$row->category_name;
		$this->template->load('template','gallery_add',$data);
	}

	function update()
	{
		$id 								=	$this->input->post('id');
		$catName 							=	$this->input->post('category');
		$this->tab_groups['category_name'] 	=	$catName;
		$this->tab_groups['slug']			=	url_title($catName,'dash',TRUE);
		$this->db->update('image_category',$this->tab_groups,array('id'=>$id));
		redirect($this->base_uri);
	}

	function active($id,$status)
	{
		$data 			=	array('status'=>$status);
		$this->db->update('image_category',$data,array('id'=>$id));
		$this->list_ajax();
	}

	function delete($id)
	{
		$this->db->delete('image_category',array('id'=>$id));
		$this->list_ajax();	
	}

	public function do_upload()
    {
        $path                       =   $this->config->item('image_path').'gallery/';
        $title           			=   $this->input->post('title');
        if($title == "")
        {
        	echo'<div class="alertOne alert-danger">Please add title.</div>';
        	exit;
        }
        if (!$this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            foreach ($error as $item => $value){
             echo'<div class="alertOne alert-danger">'.$value.'</div>';
         }
         exit;
        }
        else
        {
            $upload_data = array('upload_data' => $this->upload->data());
            foreach ($upload_data as $key=> $value){
            $imid           	=   $this->input->post('imid');
			$data = array('category'=> $imid,'image_name'=>$title,'image' => $upload_data['upload_data']['file_name']);
            $this->db->insert('image_gallery', $data);
            }
            echo'<div class="alertOne alert-success"><strong>Well done!   </strong> Image uploaded Succesfully</div>';
            exit;
        }
    }

    function fillGallery(){
        $uploadpath     =   $this->config->item('image_path')."gallery/";
        $imid      		=   $this->input->post('imid');
        $this->db->select("*");
        $this->db->from("image_gallery");
        $this->db->where("category",$imid);
        $rs             =   $this->db->get();
        if($rs->num_rows() > 0)
        {
            foreach ($rs->result() as $row) {
                $src= $uploadpath.$row->image;
                $lid = $row->id.'g';
                echo "<li class='thumbnail' id='$lid'><span class='btn btn-info btn-block'>".$row->image_name."</span><img src='".$this->config->item('image_url')."gallery/".$row->image."' style='height: 150px; width: 150px'><span id='$row->id' class='btn btn-danger btn-block btn-delete'><i class='fa fa-trash'></i>&nbsp;&nbsp;&nbsp;Delete</span></li>";
            }
        }  else {
            echo "<div>No Images Found !</div>";
        }
    }

    function deleteimg(){
        $image_id       =   $this->input->post('id');
        $this->db->select('*');
        $this->db->from("image_gallery");
        $this->db->where('id', $image_id);
        $query  =   $this->db->get();
        $row    =   $query->row();
        unlink($this->config->item('image_path').'gallery/'.$row->image);
        $this->db->where('id', $image_id);
        $this->db->delete('image_gallery'); 
        echo'<div class="alertOne alert-success">This image deleted successfully </div>';
        exit;
    }
}