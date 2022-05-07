<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_About_Us extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('admin_About_Us_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_about_us_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','about_us_details'=>$this->admin_About_Us_Model->get_about_us_details()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_about_us_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_about_us_header_image = 'no-file';
				$output_about_us_header_image = 'assets/uploads/about-us-banner-image/';

				if(isset($_FILES['about_us_header_image'])) {
		        	$error = $_FILES["about_us_header_image"]["error"]; 
		            if(!is_array($_FILES["about_us_header_image"]["name"])) {
		                $files_name = $_FILES["about_us_header_image"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $about_us_header_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $about_us_header_image.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["about_us_header_image"]["tmp_name"],$output_about_us_header_image.$fileName);
		                $store_about_us_header_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["about_us_header_image"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["about_us_header_image"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $about_us_header_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $about_us_header_image.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["about_us_header_image"]["tmp_name"][$i],$output_about_us_header_image.$fileName);
		                	$store_about_us_header_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','about_us_details'=>$this->admin_About_Us_Model->update_about_us_details($store_about_us_header_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>