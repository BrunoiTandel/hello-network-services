<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HN_Hello_Nw_Services_Team_Member extends CI_Controller {
	
	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');  
	  	$this->load->model('loginModel');
	  	$this->load->model('check_Team_Member_Login_Model');
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
}