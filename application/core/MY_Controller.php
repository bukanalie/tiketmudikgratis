<?php 
class MY_Controller extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->check_db();
	}

	function check_db(){
		$CI = & get_instance();
		$CI->load->database();
		$CI->load->dbutil();
	}
}
