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
		$data['title'] = "Admin Dashboard";
		$this->load->view('admin-common/admin-header');
		$this->load->view('admin-common/admin-sidebar');
		$this->load->view('admin/dashboard',$data);
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
}