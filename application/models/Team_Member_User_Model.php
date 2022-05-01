<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_Member_User_Model extends CI_Model {

	function check_new_user_mobile_number($mobile_number) {
		return $this->db->select('COUNT(*) AS count')->where('user_mobile_number',$mobile_number)->get('user')->row_array();
	}

	function check_new_user_email_id($email) {
		return $this->db->select('COUNT(*) AS count')->where('user_email_id',$email)->get('user')->row_array();
	}

	function add_new_internal_team_member() {
		$password = random_string('alnum', 8);
		$add_data = array(
			'user_first_name' => $this->input->post('first_name'),
			'user_last_name' => $this->input->post('last_name'),
			'user_mobile_number' => $this->input->post('mobile_number'),
			'user_email_id' => $this->input->post('email_id'),
			'user_password' => MD5($password),
			'user_ip_address' => $this->input->post('ip_address'),
			'user_block' => $this->input->post('block'),
			'user_district' => $this->input->post('district'),
			'user_address' => $this->input->post('address')
		);

		if ($this->db->insert('user',$add_data)) {
			$admin_info = $this->session->userdata('logged-in-team-member');
			$add_data['user_id'] = $this->db->insert_id();
			$add_data['user_added_updated_by_team_member_id'] = $admin_info['internal_team_member_id'];

			$this->db->insert('user_log',$add_data);

			return array('status'=>'1','message'=>'New user has been added successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while adding the new user. Please try again');
		}
	}
}