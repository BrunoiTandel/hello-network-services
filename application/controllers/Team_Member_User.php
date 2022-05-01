<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Team_Member_User extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');
		  	$this->load->helper('string');
		  	$this->load->model('team_Member_User_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function check_new_user_mobile_number() {
			if (isset($_POST) && $this->input->post('verify_team_member_request') == '1' && $this->session->userdata('logged-in-team-member')) {
				echo json_encode(array('status'=>'1','number_count'=>$this->team_Member_User_Model->check_new_user_mobile_number($this->input->post('mobile_number'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_user_email_id() {
			if (isset($_POST) && $this->input->post('verify_team_member_request') == '1' && $this->session->userdata('logged-in-team-member')) {
				echo json_encode(array('status'=>'1','email_count'=>$this->team_Member_User_Model->check_new_user_email_id($this->input->post('email'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function add_new_user() {
			if (isset($_POST) && $this->input->post('verify_team_member_request') == '1' && $this->session->userdata('logged-in-team-member')) {
				$check_new_user_mobile_number = $this->team_Member_User_Model->check_new_user_mobile_number($this->input->post('mobile_number'));
				$check_new_user_email_id = $this->team_Member_User_Model->check_new_user_email_id($this->input->post('email_id'));
				if ($check_new_user_mobile_number['count'] == 0 && $check_new_user_email_id['count'] == 0) {
					echo json_encode(array('status'=>'1','user'=>$this->team_Member_User_Model->add_new_internal_team_member()));
				} else {
					echo json_encode(array('status'=>'2','message'=>'Duplication Found','mobile_number_count'=>$check_new_user_mobile_number['count'],'email_id_count'=>$check_new_user_email_id['count']));
				}
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>