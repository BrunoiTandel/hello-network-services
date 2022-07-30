<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Internal_Team_Model extends CI_Model {
	function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url'); 
		  	$this->load->model('emailModel');
		}

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

	function check_new_team_member_mobile_number($mobile_number) {
		return $this->db->select('COUNT(*) AS count')->where('internal_team_member_mobile_number',$mobile_number)->get('internal_team_member')->row_array();
	}

	function check_new_team_member_email_id($email) {
		return $this->db->select('COUNT(*) AS count')->where('internal_team_member_email_id',$email)->get('internal_team_member')->row_array();
	}

	function add_new_internal_team_member() {
		$password = random_string('alnum', 8);
		$add_data = array(
			'internal_team_member_role' => $this->input->post('job_role'),
			'internal_team_member_name' => $this->input->post('name'),
			'internal_team_member_mobile_number' => $this->input->post('mobile_number'),
			'internal_team_member_email_id' => $this->input->post('email_id'),
			'internal_team_member_block' => $this->input->post('block'),
			'internal_team_member_password' => MD5($this->input->post('mobile_number')),
			'internal_team_member_district' => $this->input->post('district'),
			'tag' => $this->input->post('tag'),
			'internal_team_member_address' => $this->input->post('address')
		);

		if ($this->db->insert('internal_team_member',$add_data)) {
			$admin_info = $this->session->userdata('logged-in-admin');
			$add_data['internal_team_member_id'] = $this->db->insert_id();
			$add_data['added_updated_by_admin_id'] = $admin_info['admin_id'];

			$this->db->insert('internal_team_member_log',$add_data);

			return array('status'=>'1','message'=>'Role has been added successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while adding the role. Please try again');
		}
	}

	function insert_bulk_case($users){
		if ($this->db->insert_batch('users',$users)) {
		return array('status'=>'1','message'=>'Service has been inserted.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while insert the users. Please try again');
		}
	}

	function insert_new_customer_details(){
		$users = array(
			'user_id' => $this->input->post('user_id'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('user_password'),
            'full_name' => $this->input->post('user_full_name'),
            'phone' => $this->input->post('user_phone'),
            'email' => $this->input->post('user_email'),
            'address' => $this->input->post('user_address'),
            'note' => $this->input->post('user_note'),
            'id_proof' => $this->input->post('user_id_proof'),
            'start_date' => $this->input->post('user_start_date'),
            'end_date' => $this->input->post('user_end_date'),
            'bandwidth' => $this->input->post('user_bandwidth'),
            'ip_address' => $this->input->post('user_ip_address'),
            'extra_ip_address' => $this->input->post('user_extra_ip_address'),
            'mac_address' => $this->input->post('user_mac_address'),
            'mac_vendor' => $this->input->post('user_mac_vendor'),
            'location' => $this->input->post('user_location'),
            'type' => $this->input->post('user_type'),
            'auto_bind' => $this->input->post('user_auto_bind'),
            'bandwidth_lock' => $this->input->post('user_bandwidth_lock'),
            'status' => $this->input->post('user_status'),
            'bill' => $this->input->post('user_bill'),
            'due' => $this->input->post('user_due'),
            'tag' => $this->input->post('user_tag'),
            'zone' => $this->input->post('user_zone'),
            'u_created_date' => date('Y-m-d H:i:s')
		);
		if ($this->db->insert('users',$users)) {
		return array('status'=>'200','message'=>'Service has been inserted.');
		} else {
			return array('status'=>'202','message'=>'Something went wrong while insert the users. Please try again');
		}
	}

	function update_single_user_details(){
	 
		$users = array( 
            'username' => $this->input->post('user_name'),  
            'full_name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'note' => $this->input->post('note'),
            'id_proof' => $this->input->post('id_proof'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'bandwidth' => $this->input->post('bandwidth'),  
            'connection_type' => $this->input->post('connection_type'), 
            'status' => $this->input->post('status'),
            'bill' => $this->input->post('bill'),
            'due' => $this->input->post('due'),
            'tag' => $this->input->post('tag'),
            'zone' => $this->input->post('zone'), 
            'plan_type' => $this->input->post('plan_type'),
		);
		$this->db->where('user_id',$this->input->post('user_id'));
		if ($this->db->update('users',$users)) {
		return array('status'=>'200','message'=>'Service has been inserted.');
		} else {
			return array('status'=>'202','message'=>'Something went wrong while insert the users. Please try again');
		}
	}


	/* user section */

	function get_single_user_details(){
		return $this->db->where('uid',$this->input->post('uid'))->get('users')->row_array();
	}

	function send_mail(){
		$user = $this->get_single_user_details();
		$mail_subject = "Credentials";
		$mail_message = '';
		$mail_message="
				<html>
					<head>
						<style>
							table {
								font-family: arial, sans-serif;
								border-collapse: collapse;
								width: 100%;
							}

							td, th {
								border: 1px solid #dddddd;
								text-align: left;
								padding: 8px;
							}

							tr:nth-child(even) {
								background-color: #dddddd;
							}
						</style>
					</head>
					<body>
						<p>Dear “".$user['username']."”,</p>
						<p>Greetings from Hello!!</p> 
						<table> 
							<th>Candidate Name</th>
							<th>Mobile Number</th>
							<th>Password</th>
							<tr> 
							<td>".$user['username']."</td>
							<td>".$user['phone']."</td>
							<td>".$user['password']."</td>
							<tr>
						</table>
						 
						<p><b>Yours sincerely,<br>
						Hello Network</b></p>
					</body>
				</html>";
		
	$this->emailModel->send_mail($user['email'],$mail_subject,$mail_message);
	}
}