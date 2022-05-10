<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Home_Page_Model extends CI_Model {

	function get_all_banner_image() {
		return $this->db->where_not_in('home_page_banner_image_status',array('2'))->order_by('home_page_banner_image_id','DESC')->get('home_page_banner_image')->result_array();
	}

	function get_home_page_details() {
		return $this->db->where('home_page_details_id','1')->get('home_page_details')->row_array();
	}

	function get_all_we_enable_description() {
		return $this->db->order_by('home_page_we_enable_description_id','DESC')->get('home_page_we_enable_description')->result_array();
	}

	function update_home_page_content($banner_image,$banner_video) {
		$update_data = array(
			'home_page_header_caption' => $this->input->post('header_caption'),
			'home_page_header_sub_heading' => $this->input->post('header_sub_heading'),
			'home_page_video_thumbnail_text' => $this->input->post('video_thumbnail_text')
		);

		if ($banner_image != 'no-file') {
			$update_data['home_page_banner_image'] = $banner_image;
		}

		if ($banner_video != 'no-file') {
			$update_data['home_page_banner_video'] = $banner_video;
		}

		if ($this->db->where('home_page_details_id',1)->update('home_page_details',$update_data)) {
			$get_db_result = $this->db->where('home_page_details_id',1)->get('home_page_details')->row_array();
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'home_page_details_id' => '1',
				'home_page_header_caption' => $this->input->post('header_caption'),
				'home_page_header_sub_heading' => $this->input->post('header_sub_heading'),
				'home_page_video_thumbnail_text' => $this->input->post('video_thumbnail_text'),
				'home_page_banner_image' => $get_db_result['home_page_banner_image'],
				'home_page_banner_video' => $get_db_result['home_page_banner_video'],
				'home_page_details_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('home_page_details_log',$log_data);

			if($this->input->post('we_enable_description') != '') {
				$we_enable_description = explode(',', $this->input->post('we_enable_description'));
				if (count($we_enable_description) > 0) {
					foreach ($we_enable_description as $key => $value) {
						$add_data = array(
							'home_page_we_enable_description' => $value
						);
						if($this->db->insert('home_page_we_enable_description',$add_data)) {
							$add_data = array(
								'home_page_we_enable_description_id' => $this->db->insert_id(),
								'home_page_we_enable_description' => $value,
								'we_enable_description_added_or_updated_by_admin_id' => $admin_info['admin_id']
							);
							$this->db->insert('home_page_we_enable_description_log',$add_data);
						}
					}
				}
			}

			return array('status'=>'1','message'=>'Home page details has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the home page details. Please try again');
		}
	}

	function change_we_enabled_description_status() {
		$userdata = array(
			'home_page_we_enable_description_status'=>$this->input->post('changed_status'),
		);

		if ($this->db->where('home_page_we_enable_description_id',$this->input->post('id'))->update('home_page_we_enable_description',$userdata)) {
			
			$log_data = $this->db->where('home_page_we_enable_description_id',$this->input->post('id'))->get('home_page_we_enable_description')->row_array();
			
			$status_log = '3';
			if ($this->input->post('changed_status') == 0) {
				$status_log = '4';
			}

			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data_array = array(
				'home_page_we_enable_description_id' => $this->input->post('id'),
				'home_page_we_enable_description' => $log_data['home_page_we_enable_description'],
				'home_page_we_enable_description_status' => $status_log,
				'we_enable_description_added_or_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('home_page_we_enable_description_log',$log_data_array);

			return array('status'=>'1','message'=>'Status updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the status.');
		}
	}

	function get_single_we_enable_description() {
		return $this->db->select('home_page_we_enable_description_id, home_page_we_enable_description, home_page_we_enable_description_status')->where('home_page_we_enable_description_id',$this->input->post('home_page_we_enable_description_id'))->get('home_page_we_enable_description')->row_array();
	}

	function update_we_enable_description() {
		$update_data = array(
			'home_page_we_enable_description' => $this->input->post('we_enable_description')
		);

		if ($this->db->where('home_page_we_enable_description_id',$this->input->post('home_page_we_enable_description_id'))->update('home_page_we_enable_description',$update_data)) {
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'home_page_we_enable_description_id' => $this->input->post('home_page_we_enable_description_id'),
				'home_page_we_enable_description' => $this->input->post('we_enable_description'),
				'home_page_we_enable_description_status' => '2',
				'we_enable_description_added_or_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('home_page_we_enable_description_log',$log_data);

			return array('status'=>'1','message'=>'We enable description has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the we enabe description. Please try again');
		}
	}

	function delete_we_enable_description() {
		$userdata = array(
			'home_page_we_enable_description_id'=>$this->input->post('home_page_we_enable_description_id'),
		);

		$num_rows = $this->db->where($userdata)->get('home_page_we_enable_description');

		if ($num_rows->num_rows() > 0) {
			$db_details = $num_rows->row_array();
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'home_page_we_enable_description_id'=>$db_details['home_page_we_enable_description_id'],
				'home_page_we_enable_description'=>$db_details['home_page_we_enable_description'],
				'home_page_we_enable_description_status'=>'5',
				'we_enable_description_added_or_updated_by_admin_id'=>$admin_info['admin_id']
			);
			$this->db->insert('home_page_we_enable_description_log',$log_data);

			if($this->db->where('home_page_we_enable_description_id',$this->input->post('home_page_we_enable_description_id'))->delete('home_page_we_enable_description')) {
				return array('status'=>'1','message'=>'We enabled description has been deleted successfully.');
			}
			return array('status'=>'0','message'=>'Something went wrong while deleting the we enabled description.');
		}
		return array('status'=>'0','message'=>'Something went wrong while deleting the we enabled description.');
	}
}