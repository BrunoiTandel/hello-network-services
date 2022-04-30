<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Internal_Team extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');
		  	$this->load->helper('string');
		  	$this->load->model('admin_Internal_Team_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_all_internal_team_roles() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_list'=>$this->admin_Internal_Team_Model->get_all_internal_team_roles()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_internal_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','check_duplication'=>$this->admin_Internal_Team_Model->check_new_internal_role_name($this->input->post('role_name'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_edit_internal_team_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','check_duplication'=>$this->admin_Internal_Team_Model->check_edit_internal_team_role_name($this->input->post('role_id'),$this->input->post('role_name'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function add_new_internal_team_role() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_details'=>$this->admin_Internal_Team_Model->add_new_internal_team_role()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_internal_team_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_details'=>$this->admin_Internal_Team_Model->update_internal_team_role_name()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
		
		function change_internal_team_role_status() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','return_status'=>$this->admin_Internal_Team_Model->change_internal_team_role_status()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_single_internal_team_role_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_details'=>$this->admin_Internal_Team_Model->get_single_internal_team_role_details($this->input->post('internal_team_role_id'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function delete_internal_team_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','delete_image'=>$this->admin_Internal_Team_Model->delete_internal_team_role_name()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_candidate_mobile_number() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','number_count'=>$this->admin_Internal_Team_Model->check_new_candidate_mobile_number($this->input->post('mobile_number'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_team_member_email_id() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','email_count'=>$this->admin_Internal_Team_Model->check_new_team_member_email_id($this->input->post('email'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function add_new_internal_team_member() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				$check_new_candidate_mobile_number = $this->admin_Internal_Team_Model->check_new_candidate_mobile_number($this->input->post('mobile_number'));
				$check_new_team_member_email_id = $this->admin_Internal_Team_Model->check_new_team_member_email_id($this->input->post('email_id'));
				if ($check_new_candidate_mobile_number['count'] == 0 && $check_new_team_member_email_id['count'] == 0) {
					echo json_encode(array('status'=>'1','team_member'=>$this->admin_Internal_Team_Model->add_new_internal_team_member()));
				} else {
					echo json_encode(array('status'=>'2','message'=>'Duplication Found','mobile_number'=>$check_new_candidate_mobile_number['count'],'email_id'=>$check_new_team_member_email_id['count']));
				}
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>