<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_About_Us_Model extends CI_Model {

	function get_about_us_details() {
		return $this->db->where('about_us_id','1')->get('about_us')->row_array();
	}

	function update_about_us_details($about_us_header_image) {
		$update_data = array(
			'about_us_header_caption' => $this->input->post('header_caption'),
			'about_us_header_sub_heading' => $this->input->post('header_sub_heading')
		);

		if ($about_us_header_image != '') {
			$update_data['about_us_banner_image'] = $about_us_header_image;
		}

		if ($this->db->where('about_us_id',1)->update('about_us',$update_data)) {
			$get_db_result = $this->db->where('about_us_id',1)->get('about_us')->row_array();

			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'about_us_header_caption' => $get_db_result['about_us_header_caption'],
				'about_us_header_sub_heading' => $get_db_result['about_us_header_sub_heading'],
				'about_us_banner_image' => $get_db_result['about_us_banner_image'],
				'about_us_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('about_us_log',$log_data);

			return array('status'=>'1','message'=>'About Us Details has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the about us details. Please try again');
		}
	}
}