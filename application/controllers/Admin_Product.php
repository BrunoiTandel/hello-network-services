<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Product extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');  
		  	$this->load->model('admin_Product_Model');
		  	$this->load->model('user_Packages_Modal');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_all_products() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' ) {
				echo json_encode(array('status'=>'1','all_products'=>$this->admin_Product_Model->get_all_products()));
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

		function add_new_product() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_product_thumbnail_image = 'no-file';
				$output_product_thumbnail_image = 'assets/uploads/product-thumbnail/';
				
				if(isset($_FILES['product_thumbnail_image'])) {
		        	$error = $_FILES["product_thumbnail_image"]["error"]; 
		            if(!is_array($_FILES["product_thumbnail_image"]["name"])) {
		                $files_name = $_FILES["product_thumbnail_image"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $product_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $product_thumbnail_image.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["product_thumbnail_image"]["tmp_name"],$output_product_thumbnail_image.$fileName);
		                $store_product_thumbnail_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["product_thumbnail_image"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["product_thumbnail_image"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $product_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $product_thumbnail_image.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["product_thumbnail_image"]["tmp_name"][$i],$output_product_thumbnail_image.$fileName);
		                	$store_product_thumbnail_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','new_product_details'=>$this->admin_Product_Model->add_new_product($store_product_thumbnail_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function change_product_status() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','return_status'=>$this->admin_Product_Model->change_product_status()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_product_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','product_detials'=>$this->admin_Product_Model->get_product_details(),'all_post_type'=>array(file_get_contents(base_url().'assets/custom-js/json/post-type.json'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_product() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				
				$store_product_thumbnail_image = 'no-file';
				$output_product_thumbnail_image = 'assets/uploads/product-thumbnail/';

				if(isset($_FILES['product_thumbnail_image'])) {
		        	$error = $_FILES["product_thumbnail_image"]["error"]; 
		            if(!is_array($_FILES["product_thumbnail_image"]["name"])) {
		                $files_name = $_FILES["product_thumbnail_image"]["name"];
		                $file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                // $product_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                // $fileName = $product_thumbnail_image.'.'.$file_ext;
		                $fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                move_uploaded_file($_FILES["product_thumbnail_image"]["tmp_name"],$output_product_thumbnail_image.$fileName);
		                $store_product_thumbnail_image = $fileName; 
		            } else {
		             	$fileCount = count($_FILES["product_thumbnail_image"]["name"]);
		              	for($i=0; $i < $fileCount; $i++) {
		                 	$files_name = $_FILES["product_thumbnail_image"]["name"][$i];
		                	$file_ext = pathinfo($files_name, PATHINFO_EXTENSION);
		                	// $product_thumbnail_image = preg_replace('/[^a-zA-Z]+/', '-', trim(strtolower($this->input->post('short_description'))));
		                	// $fileName = $product_thumbnail_image.'.'.$file_ext;
		                	$fileName = uniqid().date('YmdHsi').'.'.$file_ext;
		                	move_uploaded_file($_FILES["product_thumbnail_image"]["tmp_name"][$i],$output_product_thumbnail_image.$fileName);
		                	$store_product_thumbnail_image[]= $fileName; 
		              	}
		            } 
		        }

				echo json_encode(array('status'=>'1','update_product'=>$this->admin_Product_Model->update_product($store_product_thumbnail_image)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function delete_product() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','delete_image'=>$this->admin_Product_Model->delete_product()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}


		function get_data_yearly() {
			if (isset($_POST) && $this->input->post('is_admin') == '1') {
				echo json_encode($this->admin_Product_Model->get_data_yearly_monthly());
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function add_product_order(){
			echo json_encode($this->user_Packages_Modal->store_purchased_package_details_direct());
		}
	}
?>