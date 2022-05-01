<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class HN_Hello_Nw_Services_Team_Member_Logout extends CI_Controller {
		function index() {
			$this->session->unset_userdata('logged-in-team-member');	
 			redirect($this->config->item('my_base_url').'team-member');
		}
	}
?>