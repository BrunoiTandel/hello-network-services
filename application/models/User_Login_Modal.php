<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login_Modal extends CI_Model {

	function verify_login() {
		$where_array = array(
			'user_mobile_number' => $this->input->post('mobile_no_or_email_id'),
			'user_password' => MD5($this->input->post('password'))
		);
		$get_user_details = $this->db->where($where_array)->get('user')->row_array();
		
		if ($get_user_details != '') {
			$this->session->set_userdata('logged-in-user',$get_user_details);
			return array('status'=>1,'message'=>'User logged in successfully','data'=>$this->session->userdata('logged-in-user'));
		} else {
	    	return array('status'=>0,'message'=>'Incorrect Credentials Entered.');
		}
	}

	function update_profile_details() {
		$user = $this->session->userdata('logged-in-user'); 
		$db_crm = $this->load_Database_Model->load_database();

		$client = array(
			'client_name' => ucwords($this->input->post('client_name')),
			'client_country' => $this->input->post('sign_up_country'),
			'client_state' => $this->input->post('sign_up_state'),
			'client_city' => $this->input->post('sign_up_city'),
			'client_industry' => $this->input->post('sign_up_industry'),
			'client_zip' => $this->input->post('sign_up_pin_code'),
			'client_address' => $this->input->post('sign_up_address'),
			'gst_number' => strtoupper($this->input->post('gst_number')),
			'is_address_added' => 1
		);

		$client_details = array(
			'spoc_name' => ucwords($this->input->post('client_name')),
			'spoc_phone_no' => $this->input->post('contact'),
		);

		if ($db_crm->where('client_id',$user['client_id'])->update('tbl_client',$client) && $db_crm->where('client_id',$user['client_id'])->update('tbl_clientspocdetails',$client_details)) {
			$user_details = $db_crm->select("*")->from('tbl_clientspocdetails')->join('tbl_client','tbl_clientspocdetails.client_id = tbl_client.client_id','left')->where('tbl_client.client_id',$user['client_id'])->get()->row_array();
			$this->session->set_userdata('logged-in-user',$user_details);
			return array('status'=>'1','message'=>'successfully updated.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while update data. Please try again');
		}
	}

	function update_profile_details_from_make_payment($variable_array) {
		$user = $this->session->userdata('logged-in-user'); 
		$db_crm = $this->load_Database_Model->load_database();
		$client = array(
			'client_country' => $variable_array['selected_country'],
			'client_state' => $variable_array['selected_state'],
			'client_city' => $variable_array['city'],
			'client_zip' => $variable_array['pincode'],
			'client_address' => $variable_array['address'],
			'gst_number' => strtoupper($variable_array['gst_number']),
			'is_address_added' => 1
		);

		if ($db_crm->where('client_id',$user['client_id'])->update('tbl_client',$client)) {
			$user_details = $db_crm->select("*")->from('tbl_clientspocdetails')->join('tbl_client','tbl_clientspocdetails.client_id = tbl_client.client_id','left')->where('tbl_client.client_id',$user['client_id'])->get()->row_array();
			$this->session->set_userdata('logged-in-user',$user_details);
			return array('status'=>'1','message'=>'successfully updated.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while update data. Please try again');
		}
	}

	function update_new_user_password() {
		$user = $this->session->userdata('logged-in-user');
		$db_crm = $this->load_Database_Model->load_database();
 		
 		if($user['SPOC_Password'] == base64_encode($this->input->post('current_password'))) {
			$client_details = array(
				'SPOC_Password' => base64_encode($this->input->post('user_password'))
			);

			if ($db_crm->where('client_id',$user['client_id'])->update('tbl_clientspocdetails',$client_details)) {
				$user_details =   $db_crm->select("*")->from('tbl_clientspocdetails')
				 ->join('tbl_client','tbl_clientspocdetails.client_id = tbl_client.client_id','left')->where('tbl_client.client_id',$user['client_id'])->get()->row_array();
				$this->session->set_userdata('logged-in-user',$user_details);
				return array('status'=>'1','message'=>'successfully updated.');
			} else {
				return array('status'=>'0','message'=>'Something went wrong while change password. Please try again');
			}
		} else {
			return array('status'=>'2','message'=>'Entered current password does not match with your current password.');
		}
	}

	function verify_forgot_password_email_id() {
		if($this->check_new_user_email_id($this->input->post('email_id'))['count'] == 1) {
			$db_crm = $this->load_Database_Model->load_database();

			$user_email = strtolower($this->input->post('email_id'));

			$client_email_id = $user_email;
			$date = date("Y-m-d H:i:s");
			$update_data = array(
				'reset_password_date' => $date
			);

			$db_crm->where('spoc_email_id',$user_email)->update('tbl_clientspocdetails',$update_data);

			// Send To User Starts
			$client_email_subject = 'Reset Password';

			$client_email_message ='';
			$client_email_message .= '<html> ';
			$client_email_message .= '<body> ';
			$client_email_message .= '<p>Hey there,</p>';
			$client_email_message .= '<p>Trouble signing in?</p>';
			$client_email_message .= '<p>Resetting your password is easy.</p>';
			$client_email_message .= '<p>You can reset your password by clicking the link below:</p>';
			$client_email_message .= 'Link : '.$this->config->item('my_base_url').'reset-password/'.$user_email.'/'.md5(base64_encode(md5(md5($date))));
			$client_email_message .= '<p>If you did not make this request then please ignore this email.</p>';
			$client_email_message .= 'Yours Sincerely,<br>';
			$client_email_message .= 'Team FactSuite';
			$client_email_message .= '</body>';
			$client_email_message .= '</html>';

			$send_email_to_user = $this->email_Model->send_mail($client_email_id,$client_email_subject,$client_email_message);
			if($send_email_to_user == 1) {
				$reset_password_session_details = array(
					'date' => $date,
					'email_id' => $user_email
				);
				$this->session->set_userdata('reset-password-user',$reset_password_session_details);
				return array('status'=>'1','message'=>'A mail has been sent to the registered mail id for reseting the password.');
			}
			return array('status'=>'0','message'=>'Something went wrong. Please try again.');
		}
		return array('status'=>'2','message'=>'Entered email id doesn\'t exisits with us. Please enter the correct email id.');
	}

	function check_input_details_for_reset_password($variable_array) {
		$db_crm = $this->load_Database_Model->load_database();
		$where_array = array(
			'spoc_email_id' => $variable_array['email_id'],
			'MD5(TO_BASE64(MD5(MD5(reset_password_date))))' => $variable_array['encoded_date']
		);
		return $db_crm->where($where_array)->get('tbl_clientspocdetails')->row_array();
	}

	function verify_and_reset_password($variable_array) {
		$reset_password_user = $this->session->userdata('reset-password-user');
		if ($this->check_new_user_email_id($variable_array['email_id'])['count'] == 1) {
			$db_crm = $this->load_Database_Model->load_database();
			$update_data = array(
				'SPOC_Password' => base64_encode($this->input->post('new_password')),
				'reset_password_date' => null
			);
			if ($db_crm->where('spoc_email_id',$variable_array['email_id'])->update('tbl_clientspocdetails',$update_data)) {
				$this->session->unset_userdata('reset-password-user');
				return array('status'=>'1','message'=>'Password Has been updated successfully.');
			}
			return array('status'=>'0','message'=>'Something went wrong while updating your password. Please try again.');
		}
		return array('status'=>'2','message'=>'Entered email id doesn\'t exisits with us. Please enter the correct email id.');
	}
}