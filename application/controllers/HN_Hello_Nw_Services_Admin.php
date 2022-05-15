<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HN_Hello_Nw_Services_Admin extends CI_Controller {
	
	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');  
	  	$this->load->model('loginModel');
	  	$this->load->model('check_Admin_Login_Model');
	  	$this->load->model('admin_users_Model');
	  	$this->load->model('orderModel');
	} 

	function index() {
		if($this->session->userdata('logged-in-admin')) {
			$this->session->unset_userdata('logged-in-admin');
		}
		$data['title'] = "Admin Login";
		$this->load->view('admin/login',$data);
	}

	function dashboard() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['analytics'] = $this->admin_users_Model->get_analytics();
		$data['title'] = "Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin-common/admin-footer');
	}


	function reports() {
		$this->check_Admin_Login_Model->check_admin_login(); 
		$data['title'] = "Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/report/excel-report',$data);
		// $this->load->view('admin-common/admin-footer');
	}

		
	function home_page() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/home-page/home-page-header');
		$this->load->view('admin/home-page/home-page',$data);
		$this->load->view('admin-common/admin-footer');
	}


	function pages() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title'] = "Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/pages/pages',$data);
		$this->load->view('admin-common/admin-footer');
	}

	function internal_team_role() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title'] = "Internal Team Role";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/internal-team/internal-team-header');
		$this->load->view('admin/internal-team/role',$data);
		$this->load->view('admin-common/admin-footer');
	}

	function add_internal_team_member() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title'] = "Internal Team Role";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/internal-team/internal-team-header');
		$this->load->view('admin/internal-team/add-internal-team-member',$data);
		$this->load->view('admin-common/admin-footer');
	}

	function view_internal_team_members() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title'] = "Internal Team Role";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/internal-team/internal-team-header');
		$this->load->view('admin/internal-team/view-internal-team-members',$data);
		$this->load->view('admin-common/admin-footer');
	}

	function view_users() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title'] = "View Users";
		$data['users'] = $this->admin_users_Model->get_all_users();
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar'); 
		$this->load->view('admin/users/view-user',$data);
		$this->load->view('admin-common/admin-footer');
	}
	function view_orders() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title'] = "View Users";
		$data['users'] = $this->orderModel->get_all_orders();
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar'); 
		$this->load->view('admin/orders/view-orders',$data);
		$this->load->view('admin-common/admin-footer');
	}


	function add_testimonials() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/home-page/home-page-header');
		$this->load->view('admin/home-page/add-testimonials',$data);
		$this->load->view('admin-common/admin-footer');
	}

	function all_testimonials() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/home-page/home-page-header');
		$this->load->view('admin/home-page/all-testimonials',$data);
		$this->load->view('admin-common/admin-footer');
	}

	/*payment gatway*/
	
	function payment_gateway() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/payment-gateway/payment-gateway-header');
		$this->load->view('admin/payment-gateway/payment-gateway',$data);
		$this->load->view('admin-common/admin-footer');
	}


	function contact_us() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/contact-us/contact-us-header');
		$this->load->view('admin/contact-us/contact-us',$data);
		$this->load->view('admin-common/admin-footer');
	}



	function add_blog() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/blogs/blogs-header');
		$this->load->view('admin/blogs/add-blog',$data);
		$this->load->view('admin-common/admin-footer');
	}

	function all_blogs() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/blogs/blogs-header');
		$this->load->view('admin/blogs/all-blogs',$data);
		$this->load->view('admin-common/admin-footer');
	}


	function add_product() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/product/product-header');
		$this->load->view('admin/product/add-product-plans',$data);
		$this->load->view('admin-common/admin-footer');
	}

	function all_products() {
		$this->check_Admin_Login_Model->check_admin_login();
		$data['title']="Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/product/product-header');
		$this->load->view('admin/product/view-product',$data);
		$this->load->view('admin-common/admin-footer');
	}



}