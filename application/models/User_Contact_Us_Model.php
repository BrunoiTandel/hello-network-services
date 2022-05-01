<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Contact_Us_Model extends CI_Model {

	function add_contact_us_enquiry() {
		$enquirer_email = strtolower($this->input->post('contact_us_email_id'));
		$add_data = array(
			'user_contact_us_query_first_name' => $this->input->post('contact_us_first_name'),
			'user_contact_us_query_last_name' => $this->input->post('contact_us_last_name'),
			'user_contact_us_query_email_id' => $enquirer_email,
			'user_contact_us_query_phone_number' => $this->input->post('contact_us_phone_number'),
			'user_contact_us_query_message' => $this->input->post('contact_us_message')
		);

		if ($this->db->insert('user_contact_us_query',$add_data)) {

			$subject = 'New Enquiry from '.$enquirer_email;

			$message = '<html><body>';
			$message .= 'Hi Admin,<br>';
			$message .= 'Their is a new enquiry from : '.$this->input->post('contact_us_first_name').' '.$this->input->post('contact_us_last_name');
			$message .= '<br>Mobile Number : '.$this->input->post('contact_us_phone_number');
			$message .= '<br>Email ID : '.$enquirer_email;
			$message .= '<br>Message : '.$this->input->post('contact_us_message');
			$message .= '<br>Thank You,<br>';
			$message .= 'Team FactSuite';
			$message .= '</html></body>';

			// $get_email_list = $this->get_contact_us_email_ids();
			// $email_list = [];
			// if (count($get_email_list) > 0) {
			// 	foreach ($get_email_list as $value) {
			// 		array_push($email_list, $value['contact_us_email_id']);
			// 	}
			// 	$email_list = implode(',', $email_list);
			// } else {
			// 	$email_list = 'admin';
			// }
			$email_id = 'admin';

			// $send_email_to_admin = $this->email_Model->send_mail($email_id,$subject,$message);

			return array('status'=>'1','message'=>'User Enquiry has been generated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while generating the user enquiry. Please try again');
		}
	}
}