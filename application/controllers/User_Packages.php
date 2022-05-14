<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Packages extends CI_Controller {

	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');
	  	$this->load->model('user_Packages_Modal');
	  	$this->load->model('admin_Payment_Details_Model');
	}

	function purchase_package() {
		if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
			if ($this->session->userdata('logged-in-user')) {
				echo json_encode(array('status'=>'1','purchase_package_details'=>$this->user_Packages_Modal->get_purchase_package_details()));
			} else {
				echo json_encode(array('status'=>'2','message'=>'No User logged in'));
			}
		} else {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}
	}

	function store_purchased_package_details() {
		if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
			if ($this->session->userdata('logged-in-user')) {
				echo json_encode(array('status'=>'1','purchase_package_details'=>$this->user_Packages_Modal->store_purchased_package_details()));
			} else {
				echo json_encode(array('status'=>'2','message'=>'No User logged in'));
			}
		} else {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}
	}
}
