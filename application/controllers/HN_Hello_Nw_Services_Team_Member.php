<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HN_Hello_Nw_Services_Team_Member extends CI_Controller {
	
	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');  
	  	$this->load->model('loginModel');
	  	$this->load->model('check_Team_Member_Login_Model');
	  	$this->load->model('orderModel');
	  	$this->load->model('admin_users_Model');
	}

	function index() {
		if($this->session->userdata('logged-in-team-member')) {
			$this->session->unset_userdata('logged-in-team-member');
		}
		$data['title'] = "Team Member Login";
		$this->load->view('team-member/login',$data);
	}

	function dashboard() {
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$data['analytics'] = $this->admin_users_Model->get_analytics();
		$data['title'] = "Team Member Dashboard";
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar');
		$this->load->view('team-member/dashboard',$data);
		$this->load->view('team-member-common/footer');
	}

	function pages() {
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$data['title'] = "Team Member";
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar');
		$this->load->view('team-member/pages/pages',$data);
		$this->load->view('team-member-common/footer');
	}

	function add_new_user() {
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$data['title'] = "Team Member";
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar');
		$this->load->view('team-member/users/header');
		$this->load->view('team-member/users/add-new-user',$data);
		$this->load->view('team-member-common/footer');
	}


	function view_new_user() {
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$data['title'] = "Team Member";
		$data['user'] = $this->db->order_by('user_id','DESC')->get('user')->result_array();
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar');
		$this->load->view('team-member/users/header');
		$this->load->view('team-member/users/view-new-user',$data);
		// $this->load->view('team-member-common/footer');
	}

	

	function view_all_user() { 
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$data['title'] = "Team Member";
		$user = $this->session->userdata('logged-in-team-member');
			$this->db->where('users.tag',$user['tag']);
		$data['user'] = $this->db->order_by('uid','ASC')->get('users')->result_array();
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar');
		$this->load->view('team-member/users/header');
		$this->load->view('team-member/users/view-all-users',$data);
		$this->load->view('team-member-common/footer');
	}


	function reports() {
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$data['title'] = "Admin Dashboard";
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar');
		$this->load->view('admin/report/excel-report',$data);
		// $this->load->view('admin-common/admin-footer');
	}

	function view_orders() {
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$data['title'] = "View Users";
		$data['users'] = $this->orderModel->get_all_orders();
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar'); 
		$this->load->view('admin/orders/view-orders',$data);
		$this->load->view('team-member-common/footer');
	}

	function all_products() {
		$this->check_Team_Member_Login_Model->check_team_member_login();
		$user = $this->session->userdata('logged-in-team-member');
			$this->db->where('users.tag',$user['tag']);
		$data['users'] = $this->db->order_by('uid','ASC')->get('users')->result_array();
		$data['title']="Admin Dashboard";
		$this->load->view('team-member-common/header');
		$this->load->view('team-member-common/sidebar');
		// $this->load->view('admin/product/product-header');
		$this->load->view('team-member/product/view-product',$data);
		$this->load->view('team-member-common/footer');
	}



}