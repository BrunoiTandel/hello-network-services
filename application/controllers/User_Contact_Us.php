<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Contact_Us extends CI_Controller {

	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');
	  	$this->load->model('User_Contact_Us_Model');
	  	// $this->load->model('email_Model');
	}

	function index() {
		$data['title'] = 'Factsuite';
		
		$this->load->view('user-common/header',$data);
		$this->load->view('user/contact-us');
		$this->load->view('user-common/footer');
	}

	function add_contact_us_enquiry() {
		if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
			echo json_encode(array('status'=>'1','user_enquiry'=>$this->User_Contact_Us_Model->add_contact_us_enquiry()));
		} else {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}
	}
}
