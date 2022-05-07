<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Payment_Details_Model extends CI_Model {

	function get_payment_details() {
		return $this->db->where('payment_gateway_id','1')->get('payment_gateway')->row_array();
	}

	function update_payment_gateway_details() {
		$admin_info = $this->session->userdata('logged-in-admin');

		$where_array = array(
			'admin_email_id' => $admin_info['admin_email_id'],
			'admin_password' => MD5($this->input->post('admin_password'))
		);

		$verify_admin = $this->db->SELECT('COUNT(*) AS count')->from('admin_info')->where($where_array)->get()->row_array();

		if ($verify_admin['count'] == '1') {

			$update_data = array(
				'api_key' => $this->input->post('payment_api_key'),
				'api_token' => $this->input->post('payment_aut_token'),
				'api_authentication_key' => $this->input->post('payment_aut_key')
			);

			if ($this->db->where('payment_gateway_id','1')->update('payment_gateway',$update_data)) {

				$log_data = array(
					'payment_gateway_id' => '1',
					'api_key' => $this->input->post('payment_api_key'),
					'api_token' => $this->input->post('payment_aut_token'),
					'api_authentication_key' => $this->input->post('payment_aut_key'),
					'api_updated_by_admin_id' => $admin_info['admin_id']
				);
				$this->db->insert('payment_gateway_log',$log_data);

				return array('count'=>'1','status'=>'1','message'=>'Payment details has been updated successfully.');
			} else {
				return array('count'=>'1','status'=>'0','message'=>'Something went wrong while updating payment details. Please try again');
			}
		} else {
			return array('count'=>'0','status'=>'0','message'=>'Something went wrong while updating payment details. Please try again');
		}
	}
}