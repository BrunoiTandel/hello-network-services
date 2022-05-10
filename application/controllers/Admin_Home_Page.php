<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Home_Page extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('admin_Home_Page_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_home_page_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','home_page_details'=>$this->admin_Home_Page_Model->get_home_page_details(),'we_enable_description_list'=>$this->admin_Home_Page_Model->get_all_we_enable_description()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_home_page_content() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_home_page_banner_image = 'no-file';
				$output_home_page_banner_image = 'assets/uploads/home-page-banner-image/';

				$store_home_page_banner_video = 'no-file';
				$output_home_page_banner_video = 'assets/uploads/home-page-banner-video/';

				if(isset($_FILES['banner_image'])) {
		        	$error = $_FILES["banner_image"]["error"]; 
		            if(!is_array($_FILES["banner_image"]["name"])) {
		                $files_name = $_FILES["banner_image"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $banner_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $banner_image.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["banner_image"]["tmp_name"],$output_home_page_banner_image.$fileName);
		                $store_home_page_banner_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["banner_image"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["banner_image"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $banner_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $banner_image.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["banner_image"]["tmp_name"][$i],$output_home_page_banner_image.$fileName);
		                	$store_home_page_banner_image[]= $fileName; 
		              	}
		            } 
		        }

		        if(isset($_FILES['banner_video'])) {
		        	$error = $_FILES["banner_video"]["error"]; 
		            if(!is_array($_FILES["banner_video"]["name"])) {
		                $files_name = $_FILES["banner_video"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $banner_video = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $banner_video.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["banner_video"]["tmp_name"],$output_home_page_banner_video.$fileName);
		                $store_home_page_banner_video = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["banner_video"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["banner_video"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $banner_video = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $banner_video.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["banner_video"]["tmp_name"][$i],$output_home_page_banner_video.$fileName);
		                	$store_home_page_banner_video[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','home_page_details'=>$this->admin_Home_Page_Model->update_home_page_content($store_home_page_banner_image,$store_home_page_banner_video)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function change_we_enabled_description_status() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','return_status'=>$this->admin_Home_Page_Model->change_we_enabled_description_status()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_single_we_enable_description() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','we_enable_description'=>$this->admin_Home_Page_Model->get_single_we_enable_description()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_we_enable_description() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','update_we_enable_description'=>$this->admin_Home_Page_Model->update_we_enable_description()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function delete_we_enable_description() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','delete_image'=>$this->admin_Home_Page_Model->delete_we_enable_description()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>