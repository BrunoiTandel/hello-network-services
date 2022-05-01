<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HN_Hello_Nw_Services_Team_Member_Login extends CI_Controller {
	
	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');  
	  	$this->load->model('loginModel');  
	}
	
	public function verify_login_details($p1 = '',$p2 = '') {
		if ($_POST != '' && $_POST != null) {
			if($p1 == '') {
				$username = $this->input->post('email');
				$password = $this->input->post('password');
			} else {
				$username = urldecode($p1);
				$password = urldecode($p2);
			}
			
			$status = $this->loginModel->team_member_login($username,$password);
			if($status['status'] == '1') {
				$user = $status['user'];

				$userdata = array(
					'team_member_id' => $user['internal_team_member_id'],
	        		'team_member_login_ip_address' => $_SERVER['REMOTE_ADDR'],
	      		);
	      		$this->db->insert('team_member_login_log',$userdata);

				$this->session->set_userdata('logged-in-team-member', $user);
				echo json_encode($status);
			} else {
				echo json_encode($status); 
			}
		}
	}

	function verify_admin_login() {
		$data = $this->loginModel->verify_admin_login();
		echo json_encode($data);
	}
}