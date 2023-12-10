<?php

class Speakersmodel extends CI_Model 
{
	function getAllSpeakers()
	{
		$this->db->select('*');
		$this->db->from('speakers'); 
// 		$this->db->order_by('name');
        $this->db->order_by('id');
		$this->db->where('status',1);
		$query 				=	$this->db->get();
		$result 			=	$query->result();
		return $result;
	}

	function getSpeakerData($spid)
	{
		$this->db->select('*');
		$this->db->from('speakers'); 
		$this->db->where('status',1);
		$this->db->where('id',$spid);
		$query 				=	$this->db->get();
		$row 				=	$query->row_array();
		$output 			=	"<div class='modal-header'>
                    <div class='row'><div class='col-xs-12'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div></div>
                    <div class='row'>
                    <div class='col-xs-3 sp-photo'>
                         <img src='".$this->config->item('base_url')."uploads/speakers/".$row['image']."' class='img-responsive speaker_pic' alt='Speakers'>
                    </div>
                    <div class='col-xs-9'>
                        <h4 class='sp-name'>".$row['name']."</h4>
                        <p><i class='fa fa-envelope fa-fw'></i><span class=sp-email>".$row['email_id']."</span></p>
                        <p><i class='fa fa-phone fa-fw'></i><span class=sp-mob>".$row['phone_number']."</span></p>
                    </div>
                    </div>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-xs-12 prof-content'>".$row['profile_description']."
                        </div>
                    </div>

                </div>";
		return $output;
	}


	                
}