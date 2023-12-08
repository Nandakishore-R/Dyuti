<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller {
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in')) 
		{
	    	redirect('admin/login');
	    }
	    $this->template->set('title', 'Dashboard');
	    $this->load->model('Dashboardmodel','Dashboard',TRUE);
	    $this->base_uri 	=	$this->config->item('admin_url')."dashboard";
	}
	
	public function index()
	{
		$data['page_title']   		=	'Dashboard';
        $data['pages']              =   $this->Dashboard->getPages();
        $data['news']               =   $this->Dashboard->getNews();
        $data['attractions']        =   $this->Dashboard->getAttractions();
        $data['speakers']           =   $this->Dashboard->getSpeakers();
        $data['paid']               =   $this->Dashboard->getPaid();
        $data['unpaid']             =   $this->Dashboard->getUnPaid();
            
		$this->template->load('template','dashboard',$data);
	}
    // Original PHP code by Chirp Internet: www.chirp.com.au
    // Please acknowledge use of this code by including this header.

   
  
	function dbBackup( )
	{
	    
	     function cleanData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
	   $user      			= "dyuti_garymark";
	   $pass      			= "dyuti2017@@!!";
	   $host      			= "localhost";
	   $name             	= "dyuti_db";

      // filename for download
      $filename = "website_data_" . date('Ymd') . ".xls";
    
    
      $flag = false;
      
      $con=mysqli_connect($host,$user,$pass,$name); 
      if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $sql = "SELECT abstract.submission_date, user_details.title, user_master.first_name, user_master.last_name, user_master.email, user_details.dob, user_details.city, user_details.state, user_details.country, user_details.company, user_details.phone, user_details.address,user_details.gender,user_details.food,user_details.accomodation, user_master.payment_status
FROM user_details
JOIN user_master ON user_master.id=user_details.user_id
JOIN abstract ON abstract.user_id=user_details.user_id";
        
     $result=mysqli_query($con,$sql);
     
     
      $columnHeader = '';  
        $columnHeader = "Abstract Submission Date" . "\t" . "Title" . "\t". "First Name" . "\t". "Last Name" . "\t". "Email" . "\t". "Dob" . "\t". "City" . "\t". "State" . "\t". "Country" . "\t". "Company" . "\t". "Phone" . "\t". "Address" . "\t". "Gender" . "\t". "Food Required" . "\t". "Accomodation Required" . "\t". "Payment Status" . "\t";  
          
        $setData = '';  
          
        while ($rec = mysqli_fetch_row($result)) {  
            $rowData = '';  
            foreach ($rec as $value) {  
                $value = '"' . $value . '"' . "\t";  
                $rowData .= $value;  
            }  
            $setData .= trim($rowData) . "\n";  
        }  
          
          
        header("Content-type: application/octet-stream");  
        header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
        header("Pragma: no-cache");  
        header("Expires: 0"); 
          
        echo ucwords($columnHeader) . "\n" . $setData . "\n";  
    }
    
    function dbBackup2( )
	{
	    
	     function cleanData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
	   $user      			= "dyuti_garymark";
	   $pass      			= "dyuti2017@@!!";
	   $host      			= "localhost";
	   $name             	= "dyuti_db";

      // filename for download
      $filename = "website_data_" . date('Ymd') . ".xls";
    
    
      $flag = false;
      
      $con=mysqli_connect($host,$user,$pass,$name); 
      if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $sql = "SELECT user_details.title, user_master.first_name, user_master.last_name, user_master.email, user_details.dob, user_details.city, user_details.state, user_details.country, user_details.company, user_details.phone, user_details.address, user_details.gender,user_details.food,user_details.accomodation, user_master.payment_status
FROM user_details
JOIN user_master ON user_master.id=user_details.user_id";
        
     $result=mysqli_query($con,$sql);
     
     
      $columnHeader = '';  
        $columnHeader = "Title" . "\t". "First Name" . "\t". "Last Name" . "\t". "Email" . "\t". "Dob" . "\t". "City" . "\t". "State" . "\t". "Country" . "\t". "Company" . "\t". "Phone" . "\t". "Address" . "\t". "Gender" . "\t". "Food Required" . "\t". "Accomodation Required" . "\t". "Payment Status" . "\t";  
          
        $setData = '';  
          
        while ($rec = mysqli_fetch_row($result)) {  
            $rowData = '';  
            foreach ($rec as $value) {  
                $value = '"' . $value . '"' . "\t";  
                $rowData .= $value;  
            }  
            $setData .= trim($rowData) . "\n";  
        }  
          
          
        header("Content-type: application/octet-stream");  
        header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
        header("Pragma: no-cache");  
        header("Expires: 0"); 
          
        echo ucwords($columnHeader) . "\n" . $setData . "\n";  
    }


}
