<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));	
			//$this->set('nav_list', array('dashboard'=>'Home','country'=>'Country','city'=>'City','destination'=>'Travel Destination','hotelcategory'=>'Hotel Category','hotelfacility'=>'Hotel Facility','roomcategory'=>'Room Category','hotel'=>'Hotel','packagecategory'=>'Package Category','packagetype'=>'Package Type','holidaypack'=>'Holiday Package'));		
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */