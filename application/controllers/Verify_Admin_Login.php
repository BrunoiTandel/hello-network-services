<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Verify_Admin_Login extends CI_Controller {
		
		function check_admin_login() {
			if ($this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','message'=>'Verified Admin'));
			} else {
				echo json_encode(array('status'=>'0','message'=>'No Admin Found'));
			}
		}
	}
?>