<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Profile_Model extends CI_Model {

	function update_profile_details() {
		$user_details = $this->session->userdata('logged-in-user');
		$add_data = array(
			'user_first_name' => $this->input->post('first_name'),
			'user_last_name' => $this->input->post('last_name'),
			'user_block' => $this->input->post('block_name'),
			'user_district' => $this->input->post('district_name'),
			'user_address' => $this->input->post('user_address')
		);

		if ($this->db->where('user_id',$user_details['user_id'])->update('user',$add_data)) {
			
			$user = $this->db->where('user_id',$user_details['user_id'])->get('user')->row_array();
			$this->session->set_userdata('logged-in-user',$user);

			return array('status'=>'1','message'=>'User Profile has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the user profile. Please try again');
		}
	}

	function update_user_password() {
		$user_details = $this->session->userdata('logged-in-user');
 		if($user_details['user_password'] == MD5($this->input->post('current_password'))) {
			$update_data = array(
				'user_password' => MD5($this->input->post('user_password'))
			);

			if ($this->db->where('user_id',$user_details['user_id'])->update('user',$update_data)) {
				$user = $this->db->where('user_id',$user_details['user_id'])->get('user')->row_array();
				$this->session->set_userdata('logged-in-user',$user);
				
				return array('status'=>'1','message'=>'Password updated successfully.');
			} else {
				return array('status'=>'0','message'=>'Something went wrong while updating the  password. Please try again');
			}
		} else {
			return array('status'=>'2','message'=>'Entered current password does not match with your database password.');
		}
	}
}