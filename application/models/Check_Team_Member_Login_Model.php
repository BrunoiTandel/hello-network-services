<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_Team_Member_Login_Model extends CI_Model {

	function check_team_member_login() {
		if(!$this->session->userdata('logged-in-team-member')) {
			redirect($this->config->item('my_base_url').'team-member');
		}
	}
}