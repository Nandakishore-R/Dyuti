<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller 
{
	public $tab_groups,$tab_details;
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('wlogged_in'))
		{
			redirect($this->config->item('base_url'));
		}
		/* SEO */
		$this->load->model('Seomodel','Seo',TRUE);
		/* SEO */
		$path                       =   $this->config->item('image_path').'userprofile/';
        $config['upload_path']      =   $path;
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = '204800';
        $this->load->library('upload', $config);
		$this->load->model("Dashboardmodel","Dashboard",TRUE);
		$this->load->model("Registrationmodel","Registration",TRUE);
	}

	function index()
	{
		$userId      					=   $this->session->userdata('wid');
		$seo 							=	$this->Seo->getSeoVariables("dashboard");
		$data['title'] 					=	$seo->mtitle;
		$data['mkey'] 					=	$seo->mkey;
		$data['mdesc'] 					=	$seo->mdesc;
		$data['userdata'] 				=	$this->Dashboard->getUserDetails();
		$data['noti'] 					=	$this->Dashboard->getNotifications();
		$data['imgaction'] 				=	$this->config->item("base_url")."dashboard/do_upload";
		$data['abstatus'] 				=	$this->Dashboard->isAbstractExist($userId);
		$data['abStatusId'] 			=	$this->Dashboard->GetabStatusId($userId);
		$this->load->view('profile',$data);
	}

	function removePhoto()
	{
		$userId      				=   $this->session->userdata('wid');
		$userDetails 				=	$this->Dashboard->getUserDetails();
		if($userDetails->image <> ""){
        $file 						=	$this->config->item('image_path').'userprofile/'.$userDetails->image;
        unlink($file); 
       	$this->db->update("user_details",array("image"=>""),array("user_id"=>$userId));
       	}
        echo '<img src="'.$this->config->item("base_url").'assets/images/profile_03.png" alt="icon" class="img-responsive profile_pic img-circle" style="height:200px;">';
	}

    public function do_upload()
    {
        $path                       =   $this->config->item('image_path').'userprofile/';
        $userId      				=   $this->session->userdata('wid');
        /* Delete Old Image*/
        $userDetails 				=	$this->Dashboard->getUserDetails();        
        if (!$this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            foreach ($error as $item => $value){
             echo'<div class="alert alert-danger">'.$value.'</div>';
         }
         exit;
        }
        else
        {
        	if($userDetails->image <> "")
	        {
	        	$file 						=	$this->config->item('image_path').'userprofile/'.$userDetails->image;
	        	unlink($file); 
	        	$this->db->update("user_details",array("image"=>""),array("user_id"=>$userId));
	        }
            $upload_data = array('upload_data' => $this->upload->data());
            foreach ($upload_data as $key=> $value){
				$data = array('image' => $upload_data['upload_data']['file_name']);
	            $this->db->update('user_details', $data,array("user_id"=>$userId));
            }
            echo'<div class="alert alert-success"><strong>Well done!   </strong> Image uploaded Succesfully</div>';
            exit;
        }
    }

    function fillGallery()
	{
        $uploadpath     	=   $this->config->item('image_path')."userprofile/";
        $userId      		=   $this->session->userdata('wid');
        $this->db->select("*");
        $this->db->from("user_details");
        $this->db->where("user_id",$userId);
        $this->db->where("image !=","");
        $rs             =   $this->db->get();
        if($rs->num_rows() > 0)
        {
            foreach ($rs->result() as $row) {
                $src= $uploadpath.$row->image;
                $lid = $row->id.'g';
               /* echo "<li class='thumbnail' id='$lid'><img src='".$this->config->item('image_url')."userprofile/".$row->image."' class='image-round' style='height: 150px; width: 150px'><span id='$row->id' class='btn btn-danger btn-block btn-delete'><i class='fa fa-trash'></i>&nbsp;&nbsp;&nbsp;Remove</span></li>";*/
               echo '<img src="'.$this->config->item("base_url")."uploads/userprofile/".$row->image.'" alt="icon" class="img-responsive profile_pic img-circle" style="height:200px;">';
            }
        }  else {
            echo '<img src="'.$this->config->item("base_url").'assets/images/profile_03.png" alt="icon" class="img-responsive profile_pic img-circle" style="height:200px;">';
        }
    }

    function deleteimg(){
        $image_id       =   $this->input->post('id');
        $this->db->select('*');
        $this->db->from("image_gallery");
        $this->db->where('id', $image_id);
        $query  =   $this->db->get();
        $row    =   $query->row();
        unlink($this->config->item('image_path').'userprofile/'.$row->image);
        $this->db->where('id', $image_id);
        $this->db->delete('image_gallery'); 
        echo'<div class="alert alert-success">This image deleted successfully </div>';
        exit;
    }

	function editprofile()
	{
		$seo 							=	$this->Seo->getSeoVariables("profileedit");
		$data['title'] 					=	$seo->mtitle;
		$data['mkey'] 					=	$seo->mkey;
		$data['mdesc'] 					=	$seo->mdesc;
		$row 					=	$this->Dashboard->getUserDetails();
		$data['country'] 		=	$this->Registration->getCountryList($row->country);
		$data['row'] 			=	$row;
		$this->load->view('editprofile',$data);
	}
	 
	function updateProfile()
	{	
		$userId 							=	$this->session->userdata('wid'); 
		$this->tab_groups['first_name'] 	=	$this->input->post("first_name");
		$this->tab_groups['last_name'] 		=	$this->input->post("last_name");
		$this->db->update("user_master",$this->tab_groups,array("id"=>$userId));

		$this->tab_details['title']			=	$this->input->post("title");
		$datofbirth 						=	$this->input->post("dob");
		$this->tab_details['dob']			=	date('Y-m-d', strtotime($datofbirth));
		$this->tab_details['city']			=	$this->input->post("city");
		$this->tab_details['state']			=	$this->input->post("state");
		$this->tab_details['state']			=	$this->input->post("state");
		$this->tab_details['country']		=	$this->input->post("country");
		$this->tab_details['company']		=	$this->input->post("company");
		$this->tab_details['phone']			=	$this->input->post("phone");
		$this->tab_details['address']		=	$this->input->post("address");
		$this->db->update("user_details",$this->tab_details,array("user_id"=>$userId));
		echo "<div class='col-md-12 well'><div class='alert alert-success'><strong>Success ! </strong>Profile has been updated successfully.</div></div>";
	}

	function addabstract()
	{
		$seo 							=	$this->Seo->getSeoVariables("addabstract");
		$data['title'] 					=	$seo->mtitle;
		$data['mkey'] 					=	$seo->mkey;
		$data['mdesc'] 					=	$seo->mdesc;

		$data['action'] 		=	$this->config->item("base_url")."dashboard/submitabstract";
		$data['category'] 		=	$this->Dashboard->getCategoryList("");
		$this->load->view("abstract",$data);
	}

	function editabstract()
	{
		$seo 							=	$this->Seo->getSeoVariables("editabstract");
		$data['title'] 					=	$seo->mtitle;
		$data['mkey'] 					=	$seo->mkey;
		$data['mdesc'] 					=	$seo->mdesc;

		$data['action'] 		=	$this->config->item("base_url")."dashboard/updateabstract";
		$abstractData 			=	$this->Dashboard->getAbstractDetails();
		$data['category'] 		=	$this->Dashboard->getCategoryList("");
		$data['abData'] 		=	$abstractData;
		$this->load->view("editabstract",$data);
	}

	function updateabstract()
	{
		$userId 								=	$this->session->userdata('wid');
		$this->tab_groups['user_id'] 			=	$userId;
		$this->tab_groups['category'] 			=	$this->input->post("category");
		$this->tab_groups['title'] 				=	strip_tags($this->input->post("title"));
		$this->tab_groups['ab_content'] 		=	$this->input->post("ab_content");
		$this->tab_groups['tags'] 				=	$this->input->post("tags");
		$this->db->update("abstract",$this->tab_groups,array("user_id"=>$userId));
		echo "<div class='col-md-12 well'><div class='alert alert-success'><strong>Success ! </strong>Abstract Updated successfully..</div></div>";
	}

	function submitabstract()
	{
		$this->tab_groups['user_id'] 			=	$this->session->userdata('wid'); 
		$category 								=	$this->input->post("category");
		$title 									=	strip_tags($this->input->post("title"));
		$ab_content 							=	$this->input->post("ab_content");
		$tags 									=	$this->input->post("tags");
		$this->tab_groups['category'] 			=	$category;
		$this->tab_groups['title'] 				=	$title;
		$this->tab_groups['ab_content'] 		=	$ab_content;
		$this->tab_groups['tags'] 				=	$tags;
		$this->tab_groups['submission_date'] 	=	date("Y-m-d");
		$this->db->insert("abstract",$this->tab_groups);
		$abstractId 		=	$this->db->insert_id();
		if($this->sendAbstract($abstractId)) {
		echo "<div class='col-md-12 well'><div class='alert alert-success'><strong>Success ! </strong>Abstract Submitted successfully..</div></div>";
		}
	}

	function viewabstract()
	{
		$seo 							=	$this->Seo->getSeoVariables("viewabstract");
		$data['title'] 					=	$seo->mtitle;
		$data['mkey'] 					=	$seo->mkey;
		$data['mdesc'] 					=	$seo->mdesc;

		$row 						=	$this->Dashboard->getAbstractDetails();
		$data['abstract'] 			=	$row;
		$this->load->view("abstractview",$data);
	}

	function checkForAbstract()
	{
		$user_id 		=	$this->session->userdata('wid'); 
		if($this->Dashboard->isAbstractExist($user_id))
		{
			echo "exist";
		} else {
			echo "ready";
		}
	}

	function notifications()
	{
		$seo 							=	$this->Seo->getSeoVariables("notifications");
		$data['title'] 					=	$seo->mtitle;
		$data['mkey'] 					=	$seo->mkey;
		$data['mdesc'] 					=	$seo->mdesc;
		$data['notis'] 					=	$this->Dashboard->getAllNotifications();

		$this->load->view("notifications",$data);
	}

	function sendAbstract($abstractId)
	{
		$abstractRow 	=	$this->Dashboard->getAbstract($abstractId);
			$message 	=	'<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">  
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;">
				<tbody>
					<tr>
						<td width="10" bgcolor="#F9F9F9" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
						<td valign="middle" align="left" height="50" bgcolor="#00436d" style="background-color:#F9F9F9;padding:0;margin:0">
							<a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="#" target="_blank">
								<img border="0" src="'.$this->config->item("base_url").'assets/images/Duty_lgo.png" alt="Dyuti" style="border:none">
							</a>
						</td>
						<td valign="middle" align="right" height="50" bgcolor="#FFF" style="background-color:#FFF;padding:0;margin:0">
						</td>
						<td width="10" bgcolor="#00436d" style="width:10px;background-color:#F9F9F9">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
				<tbody>
					<tr>
						<td align="left" valign="top" style="color:#2c2c2c;display:block;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9">
							<p style="padding:0;margin:0;font-size:16px;font-size:13px"> Dear Sir, </p><br>
							<p style="padding:0;margin:0;color:#565656;font-size:13px">You recived a new abstract from '.$abstractRow->first_name.' '.$abstractRow->last_name.'. Kindly check and do the needful.!</p><br><br>
							<p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px"><b>Category : </b>'.$abstractRow->cattitle.'</p><br>

							<p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px"><b>Title : </b>'.$abstractRow->abtitle.'</p><br>
							<p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">'.$abstractRow->ab_content.'</p><br>
							<p style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px"><b>Keywords : </b> '.$abstractRow->tags.'</p>





							<p style="text-align:center;padding:0;margin:0" align="center"> </p><br>
						</td>
					</tr>
				</tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border:solid 1px #e6e6e6;border-top:none">
				<tbody>
					<tr>
						<td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor="#F9F9F9">
							<p style="padding:0;margin:0 0 7px 0"> <a title="Dyuti" style="text-decoration:none;color:#565656" href="#" target="_blank"><span style="color:#565656;font-size:13px">Dyuti 2017</span></a></p>
							</td>
					</tr>
				</tbody>
			</table>
		</div>';
		$this->load->library('email');
		$config['mailtype']	=	'html';
		$this->email->initialize($config);
		$this->email->from('info@dyuti.in','Dyuti');
		$this->email->to("dyuti@rajagiri.edu");
		/*$this->email->to("jilups333@gmail.com");*/
		$this->email->subject('Abstract Notification');
		$this->email->message($message);
		if($this->email->send())
		{
			return true;
		}
		else
		{
			return false;
		}
}
}