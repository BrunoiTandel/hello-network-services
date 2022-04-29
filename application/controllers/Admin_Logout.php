<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin_Logout extends CI_Controller {
		function index() {
			$this->session->unset_userdata('logged-in-admin');	
 			redirect($this->config->item('my_base_url').'factsuite-admin');
		}
	}
?>