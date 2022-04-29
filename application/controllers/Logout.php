<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	 
	/**
	 * 
	 */
	class Logout extends CI_Controller {
		function index() {
			$this->session->unset_userdata('logged-in-admin');	
 			redirect($this->config->item('my_base_url').'factsuite-admin');
		}


		function user_logout(){
			$this->session->unset_userdata('logged-in-user');	
 			redirect($this->config->item('my_base_url'));
		}
	}