<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Payment_Details extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('loginModel');
		  	$this->load->model('admin_Payment_Details_Model');
		}

		function get_payment_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','payment_details'=>$this->admin_Payment_Details_Model->get_payment_details()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_payment_gateway_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','update_status'=>$this->admin_Payment_Details_Model->update_payment_gateway_details()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>