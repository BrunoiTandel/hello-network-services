<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify_Admin_Model extends CI_Model {

	function verify_admin_password() {
		$admin_info = $this->session->userdata('logged-in-admin');

		$where_array = array(
			'admin_email_id' => $admin_info['admin_email_id'],
			'admin_password' => MD5($this->input->post('admin_password'))
		);
		return $this->db->SELECT('COUNT(*) AS count')->from('admin_info')->where($where_array)->get()->row_array();
	}
}