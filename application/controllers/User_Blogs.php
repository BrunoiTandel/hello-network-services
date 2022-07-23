<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Blogs extends CI_Controller {

	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');
	  	$this->load->model('user_Blogs_Model');
	  	// $this->load->model('email_Model');
	}

	function index() {
		$data['title'] = 'Factsuite';
		
		$this->load->view('user-common/header',$data);
		$this->load->view('user/blogs-2');
		$this->load->view('user-common/footer');
	}

	function blog_details($blog_id) {
		$data['title'] = 'Factsuite';
		$data['blog_details'] = '';
		if ($blog_id != '') {
			$data['blog_details'] = $this->user_Blogs_Model->blog_details($blog_id);
		}
		$this->load->view('user-common/header',$data);
		if ($data['blog_details'] != '') {
			$this->load->view('user/blog-details-2');
		} else {
			$this->load->view('user/404-page-not-found');
		}
		$this->load->view('user-common/footer');
	}

	function get_all_blogs() {
		if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
			echo json_encode(array('status'=>'1','all_blogs'=>$this->user_Blogs_Model->get_all_blogs()));
		} else {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}
	}
}
