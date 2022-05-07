<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Privacy_Policy_Model extends CI_Model {

	function get_privacy_policy_details() {
		return $this->db->where('privacy_policy_id','1')->get('privacy_policy')->row_array();
	}

	function update_privacy_policy_details() {
		$update_data = array(
			'privacy_policy_heading' => $this->input->post('privacy_policy_heading'),
			'privacy_policy_description' => $this->input->post('privacy_policy_description')
		);

		if ($this->db->where('privacy_policy_id',1)->update('privacy_policy',$update_data)) {
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'privacy_policy_id' => 1,
				'privacy_policy_heading' => $this->input->post('privacy_policy_heading'),
				'privacy_policy_description' => $this->input->post('privacy_policy_description'),
				'privacy_policy_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('privacy_policy_log',$log_data);

			return array('status'=>'1','message'=>'Privacy Policy Details has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the Privacy Policy details. Please try again');
		}
	}
}