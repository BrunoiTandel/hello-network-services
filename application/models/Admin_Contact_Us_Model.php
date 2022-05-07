<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Contact_Us_Model extends CI_Model {

	function get_contact_us_details() {
		return $this->db->where('contact_us_id','1')->get('contact_us_details')->row_array();
	}

	function update_contact_us_details($contact_us_header_image) {
		$update_data = array(
			'contact_us_contact_number' => $this->input->post('contact_number'),
			'contact_us_email_id' => $this->input->post('contact_email_id'),
			'contact_us_sales_email_id' => $this->input->post('sales_email_id'),
			'contact_us_support_email_id' => $this->input->post('support_email_id'),
			'facebook_link' => $this->input->post('facebook_link'),
			'linkedin_link' => $this->input->post('linkedin_link'),
			'twitter_link' => $this->input->post('twitter_link'),
			'instagram_link' => $this->input->post('instagram_link'),
			'office_address' => $this->input->post('office_address'),
			'map_location' => $this->input->post('map_location')
		);

		if ($this->db->where('contact_us_id',1)->update('contact_us_details',$update_data)) {			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'contact_us_contact_number' => $this->input->post('contact_number'),
				'contact_us_email_id' => $this->input->post('contact_email_id'),
				'contact_us_sales_email_id' => $this->input->post('sales_email_id'),
				'contact_us_support_email_id' => $this->input->post('support_email_id'),
				'facebook_link' => $this->input->post('facebook_link'),
				'linkedin_link' => $this->input->post('linkedin_link'),
				'twitter_link' => $this->input->post('twitter_link'),
				'instagram_link' => $this->input->post('instagram_link'),
				'office_address' => $this->input->post('office_address'),
				'map_location' => $this->input->post('map_location'),
				'contact_us_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('contact_us_details_log',$log_data);

			return array('status'=>'1','message'=>'Contact Us Details has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the contact us details. Please try again');
		}
	}
}