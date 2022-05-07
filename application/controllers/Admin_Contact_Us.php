<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Contact_Us extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('admin_Contact_Us_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_contact_us_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','contact_us_details'=>$this->admin_Contact_Us_Model->get_contact_us_details()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_contact_us_image() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','contact_us_banner_image'=>$this->admin_Contact_Us_Model->get_contact_us_image()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_contact_us_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_contact_us_header_image = 'no-file';
				$output_contact_us_header_image = 'assets/uploads/contact-us-banner-image/';

				if(isset($_FILES['contact_us_header_image'])) {
		        	$error = $_FILES["contact_us_header_image"]["error"]; 
		            if(!is_array($_FILES["contact_us_header_image"]["name"])) {
		                $files_name = $_FILES["contact_us_header_image"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $contact_us_header_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $contact_us_header_image.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["contact_us_header_image"]["tmp_name"],$output_contact_us_header_image.$fileName);
		                $store_contact_us_header_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["contact_us_header_image"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["contact_us_header_image"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $contact_us_header_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $contact_us_header_image.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["contact_us_header_image"]["tmp_name"][$i],$output_contact_us_header_image.$fileName);
		                	$store_contact_us_header_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','contact_us_details'=>$this->admin_Contact_Us_Model->update_contact_us_details($store_contact_us_header_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>