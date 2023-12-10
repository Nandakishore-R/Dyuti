<?php
 /**
*Initialize the pagination rules for cities page
* @return Pagination
*/
class Paginationlib {
//put your code here
function __construct() {
$this->ci =& get_instance();
}
 
public function initPagination($base_url,$total_row){
		$config["base_url"] = $base_url;
		$config["total_rows"] = $total_row;
        $config["per_page"] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';      
        $this->ci->pagination->initialize($config);
return $config;
}
}
?>