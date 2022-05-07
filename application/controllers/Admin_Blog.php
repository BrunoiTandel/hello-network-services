<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Blog extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('admin_Blog_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_all_blogs() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','all_blogs'=>$this->admin_Blog_Model->get_all_blogs()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_all_post_type() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array(file_get_contents(base_url().'assets/custom-js/json/post-type.json')));
			} else {
				echo json_encode(array('status'=>'0', 'message'=>'Bad Request Format.'));
				return false;
			}
		}

		function add_new_blog() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_blog_thumbnail_image = 'no-file';
				$output_blog_thumbnail_image = 'assets/uploads/blog-thumbnail/';
				
				if(isset($_FILES['blog_thumbnail_image'])) {
		        	$error = $_FILES["blog_thumbnail_image"]["error"]; 
		            if(!is_array($_FILES["blog_thumbnail_image"]["name"])) {
		                $files_name = $_FILES["blog_thumbnail_image"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $blog_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $blog_thumbnail_image.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["blog_thumbnail_image"]["tmp_name"],$output_blog_thumbnail_image.$fileName);
		                $store_blog_thumbnail_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["blog_thumbnail_image"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["blog_thumbnail_image"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $blog_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $blog_thumbnail_image.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["blog_thumbnail_image"]["tmp_name"][$i],$output_blog_thumbnail_image.$fileName);
		                	$store_blog_thumbnail_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','new_blob_details'=>$this->admin_Blog_Model->add_new_blog($store_blog_thumbnail_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function change_blog_status() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','return_status'=>$this->admin_Blog_Model->change_blog_status()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_blog_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','blog_detials'=>$this->admin_Blog_Model->get_blog_details(),'all_post_type'=>array(file_get_contents(base_url().'assets/custom-js/json/post-type.json'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_blog() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_blog_thumbnail_image = 'no-file';
				$output_blog_thumbnail_image = 'assets/uploads/blog-thumbnail/';

				if(isset($_FILES['blog_thumbnail_image'])) {
		        	$error = $_FILES["blog_thumbnail_image"]["error"]; 
		            if(!is_array($_FILES["blog_thumbnail_image"]["name"])) {
		                $files_name = $_FILES["blog_thumbnail_image"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $blog_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $blog_thumbnail_image.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["blog_thumbnail_image"]["tmp_name"],$output_blog_thumbnail_image.$fileName);
		                $store_blog_thumbnail_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["blog_thumbnail_image"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["blog_thumbnail_image"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $blog_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $blog_thumbnail_image.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["blog_thumbnail_image"]["tmp_name"][$i],$output_blog_thumbnail_image.$fileName);
		                	$store_blog_thumbnail_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','update_blog'=>$this->admin_Blog_Model->update_blog($store_blog_thumbnail_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function delete_blog() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','delete_image'=>$this->admin_Blog_Model->delete_blog()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>