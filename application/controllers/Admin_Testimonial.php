<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Testimonial extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('admin_Testimonial_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_all_testimonials() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','all_testimonials'=>$this->admin_Testimonial_Model->get_all_testimonials()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function add_new_testimonial() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_testimonial_client_image = 'no-file';
				$output_testimonial_client_image = 'assets/uploads/testimonial-client-image/';
				
				if(isset($_FILES['client_image_or_logo'])) {
		        	$error = $_FILES["client_image_or_logo"]["error"]; 
		            if(!is_array($_FILES["client_image_or_logo"]["name"])) {
		                $files_name = $_FILES["client_image_or_logo"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $client_image_or_logo = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $client_image_or_logo.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["client_image_or_logo"]["tmp_name"],$output_testimonial_client_image.$fileName);
		                $store_testimonial_client_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["client_image_or_logo"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["client_image_or_logo"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $client_image_or_logo = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $client_image_or_logo.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["client_image_or_logo"]["tmp_name"][$i],$output_testimonial_client_image.$fileName);
		                	$store_testimonial_client_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','new_testimonial_details'=>$this->admin_Testimonial_Model->add_new_testimonial($store_testimonial_client_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function change_testimonial_status() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','return_status'=>$this->admin_Testimonial_Model->change_testimonial_status()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_testimonial_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','testimonial_detials'=>$this->admin_Testimonial_Model->get_testimonial_details()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_testimonial() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_testimonial_client_image = 'no-file';
				$output_testimonial_client_image = 'assets/uploads/testimonial-client-image/';
				
				if(isset($_FILES['client_image_or_logo'])) {
		        	$error = $_FILES["client_image_or_logo"]["error"]; 
		            if(!is_array($_FILES["client_image_or_logo"]["name"])) {
		                $files_name = $_FILES["client_image_or_logo"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $client_image_or_logo = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $client_image_or_logo.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["client_image_or_logo"]["tmp_name"],$output_testimonial_client_image.$fileName);
		                $store_testimonial_client_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["client_image_or_logo"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["client_image_or_logo"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $client_image_or_logo = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $client_image_or_logo.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["client_image_or_logo"]["tmp_name"][$i],$output_testimonial_client_image.$fileName);
		                	$store_testimonial_client_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','update_testimonial'=>$this->admin_Testimonial_Model->update_testimonial($store_testimonial_client_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function delete_testimonial() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','delete_image'=>$this->admin_Testimonial_Model->delete_testimonial()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>