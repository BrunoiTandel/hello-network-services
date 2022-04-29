<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Verify_Admin extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('loginModel');
		  	$this->load->model('check_Admin_Login_Model');
		  	$this->load->model('verify_Admin_Model');
		}

		function verify_admin_password() {
			echo json_encode($this->verify_Admin_Model->verify_admin_password());
		}
	}
?>