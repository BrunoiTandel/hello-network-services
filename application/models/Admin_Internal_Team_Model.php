<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Internal_Team_Model extends CI_Model {

	function get_all_internal_team_roles() {
		return $this->db->order_by('internal_team_role_id','ASC')->get('internal_team_role')->result_array();
	}

	function check_new_internal_role_name($role_name) {
		$get_service_name = $this->db->select('internal_team_role_name')->get('internal_team_role')->result_array();
		$count = 0;
		foreach ($get_service_name as $key => $value) {
			if (strtolower(str_replace(' ', '', $role_name)) == strtolower(str_replace(' ', '', $value['internal_team_role_name']))) {
				$count++;
			}
		}
		return array('count'=>$count);
	}

	function check_edit_internal_team_role_name($role_id,$role_name) {
		$get_client_name = $this->db->select('internal_team_role_name')->where_not_in('internal_team_role_id',array($role_id))->get('internal_team_role')->result_array();
		$count = 0;
		foreach ($get_client_name as $key => $value) {
			if (strtolower(str_replace(' ', '', $role_name)) == strtolower(str_replace(' ', '', $value['internal_team_role_name']))) {
				$count++;
			}
		}
		return array('count'=>$count);
	}

	function add_new_internal_team_role() {
		$add_data = array(
			'internal_team_role_name' => $this->input->post('role_name')
		);

		if ($this->db->insert('internal_team_role',$add_data)) {
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'internal_team_role_id' => $this->db->insert_id(),
				'internal_team_role_name' => $this->input->post('role_name'),
				'internal_team_role_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('internal_team_role_log',$log_data);

			return array('status'=>'1','message'=>'Role has been added successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while adding the role. Please try again');
		}
	}

	function change_internal_team_role_status() {
		$userdata = array(
			'internal_team_role_status' => $this->input->post('changed_status')
		);

		if ($this->db->where('internal_team_role_id',$this->input->post('id'))->update('internal_team_role',$userdata)) {
			
			$log_data = $this->db->where('internal_team_role_id',$this->input->post('id'))->get('internal_team_role')->row_array();
			
			$status_log = '3';
			if ($this->input->post('changed_status') == 0) {
				$status_log = '4';
			}

			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data_array = array(
				'internal_team_role_id' => $this->input->post('id'),
				'internal_team_role_name' => $log_data['internal_team_role_name'],
				'internal_team_role_status' => $status_log,
				'internal_team_role_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('internal_team_role_log',$log_data_array);

			return array('status'=>'1','message'=>'Status updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the status.');
		}
	}

	function get_single_internal_team_role_details($internal_team_role_id) {
		return $this->db->where('internal_team_role_id',$internal_team_role_id)->get('internal_team_role')->row_array();
	}

	function update_internal_team_role_name() {
		$update_data = array(
			'internal_team_role_name' => $this->input->post('role_name')
		);

		if ($this->db->where('internal_team_role_id',$this->input->post('internal_team_role_id'))->update('internal_team_role',$update_data)) {
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'internal_team_role_id' => $this->input->post('internal_team_role_id'),
				'internal_team_role_name' => $this->input->post('role_name'),
				'internal_team_role_status' => '2',
				'internal_team_role_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('internal_team_role_log',$log_data);

			return array('status'=>'1','message'=>'Service has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the service. Please try again');
		}
	}

	function delete_internal_team_role_name() {
		$userdata = array(
			'internal_team_role_id' => $this->input->post('internal_team_role_id'),
		);

		$num_rows = $this->db->where($userdata)->get('internal_team_role');

		if ($num_rows->num_rows() > 0) {
			$db_details = $num_rows->row_array();
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'internal_team_role_id' => $this->input->post('internal_team_role_id'),
				'internal_team_role_name' => $db_details['internal_team_role_name'],
				'internal_team_role_status' => '5',
				'internal_team_role_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('internal_team_role_log',$log_data);

			if($this->db->where('internal_team_role_id',$this->input->post('internal_team_role_id'))->delete('internal_team_role')) {
				return array('status'=>'1','message'=>'Role has been deleted successfully.');
			}
			return array('status'=>'0','message'=>'Something went wrong while deleting the role.');
		}
		return array('status'=>'0','message'=>'Something went wrong while deleting the role.');
	}
}