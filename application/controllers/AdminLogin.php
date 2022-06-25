<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * created date : 14-12-2020
 */
class AdminLogin extends CI_Controller {
	
	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');  
	  	$this->load->model('loginModel');  
	}
	
	public function verifylogin($p1 = '',$p2 = '') {
		if ($_POST != '' && $_POST != null) {
			if($p1 == '') {
				$username = $this->input->post('email');
				$password = $this->input->post('password');
			} else {
				$username = urldecode($p1);
				$password = urldecode($p2);
			}
			
			$status = $this->loginModel->admin_login($username,$password);
			if($status['status'] == '1') {
				$user = $status['user'];

				$userdata = array(
					'admin_id'=>$user['admin_id'],
	        		'admin_login_ip_address'=>$_SERVER['REMOTE_ADDR'],
	      		);
	      		$this->db->insert('admin_login_log',$userdata);

				$this->session->set_userdata('logged-in-admin', $user);
				$this->session->unset_userdata('logged-in-team-member');	
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