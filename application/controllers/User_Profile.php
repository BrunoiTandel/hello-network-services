<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Profile extends CI_Controller {

	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');
	  	$this->load->model('user_Profile_Model');
	  	$this->load->model('user_Packages_Modal');
	}

	function index() {
		if (!$this->session->userdata('logged-in-user')) {
			redirect($this->config->item('my_base_url'));
			return false;
		}

		$data['title'] = 'Profile';
		$data['purchased_plans'] = $this->user_Packages_Modal->get_purchased_packages();
		$this->load->view('user-common/header',$data);
		$this->load->view('user/my-profile');
		$this->load->view('user-common/footer');
	}

	function static_pdf() {
		$this->load->view('user/static-invoice-pdf');
	}

	function get_user_details() {
		if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
			if ($this->session->userdata('logged-in-user')) {
				echo json_encode(array('status'=>'1','user_details'=>$this->session->userdata('logged-in-user')));
			} else {
				echo json_encode(array('status'=>'2','message'=>'No User loged in'));
			}
		} else {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}
	}

	function update_profile_details() {
		if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
			if ($this->session->userdata('logged-in-user')) {
				echo json_encode(array('status'=>'1','user_details'=>$this->user_Profile_Model->update_profile_details()));
			} else {
				echo json_encode(array('status'=>'2','message'=>'No User loged in'));
			}
		} else {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}
	}

	function update_user_password() {
		if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
			if ($this->session->userdata('logged-in-user')) {
				echo json_encode(array('status'=>'1','user_details'=>$this->user_Profile_Model->update_user_password()));
			} else {
				echo json_encode(array('status'=>'2','message'=>'No User loged in'));
			}
		} else {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}
	}
}
