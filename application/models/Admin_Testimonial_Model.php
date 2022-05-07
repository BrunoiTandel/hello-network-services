<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Testimonial_Model extends CI_Model {

	function get_all_testimonials() {
		return $this->db->order_by('testimonial_id','DESC')->get('testimonial')->result_array();
	}

	function add_new_testimonial($testimonial_client_image) {
		$add_data = array(
			'client_name' => $this->input->post('client_name'),
			'client_company_name' => $this->input->post('client_name'),
			'client_role' => $this->input->post('client_role'),
			'client_review' => $this->input->post('client_review'),
			'client_selected_service' => $this->input->post('client_services'),
			'client_image_or_logo' => $testimonial_client_image
		);

		if ($this->db->insert('testimonial',$add_data)) {
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'testimonial_id' => $this->db->insert_id(),
				'client_name' => $this->input->post('client_name'),
				'client_company_name' => $this->input->post('client_name'),
				'client_role' => $this->input->post('client_role'),
				'client_review' => $this->input->post('client_review'),
				'client_selected_service' => $this->input->post('client_services'),
				'client_image_or_logo' => $testimonial_client_image,
				'testimonial_added_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('testimonials_log',$log_data);

			return array('status'=>'1','message'=>'Testimonial has been added successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while adding the testimonial. Please try again');
		}
	}

	function change_testimonial_status() {
		$userdata = array(
			'testimonial_status'=>$this->input->post('changed_status')
		);

		if ($this->db->where('testimonial_id',$this->input->post('id'))->update('testimonial',$userdata)) {
			
			$log_data = $this->db->where('testimonial_id',$this->input->post('id'))->get('testimonial')->row_array();
			
			$status_log = '3';
			if ($this->input->post('changed_status') == 0) {
				$status_log = '4';
			}

			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data_array = array(
				'testimonial_id' => $this->input->post('id'),
				'client_name' => $log_data['client_name'],
				'client_company_name' => $log_data['client_company_name'],
				'client_role' => $log_data['client_role'],
				'client_review' => $log_data['client_review'],
				'client_selected_service' => $log_data['client_selected_service'],
				'client_image_or_logo' => $log_data['client_image_or_logo'],
				'testimonial_status' => $status_log,
				'testimonial_added_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('testimonials_log',$log_data_array);

			return array('status'=>'1','message'=>'Status updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the status.');
		}
	}

	function get_testimonial_details() {
		return $this->db->where('testimonial_id',$this->input->post('testimonial_id'))->get('testimonial')->row_array();
	}

	function update_testimonial($testimonial_client_image) {
		$update_data = array(
			'client_name' => $this->input->post('client_name'),
			'client_company_name' => $this->input->post('company_name'),
			'client_role' => $this->input->post('client_role'),
			'client_review' => $this->input->post('client_review'),
			'client_selected_service' => $this->input->post('client_services')
		);

		if($testimonial_client_image != 'no-file') {
			$update_data['client_image_or_logo'] = $testimonial_client_image;
		}

		if ($this->db->where('testimonial_id',$this->input->post('testimonial_id'))->update('testimonial',$update_data)) {
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'testimonial_id' => $this->input->post('testimonial_id'),
				'client_name' => $this->input->post('client_name'),
				'client_company_name' => $this->input->post('company_name'),
				'client_role' => $this->input->post('client_role'),
				'client_review' => $this->input->post('client_review'),
				'client_selected_service' => $this->input->post('client_services'),
				'client_image_or_logo' => $testimonial_client_image,
				'testimonial_status' => '2',
				'testimonial_added_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('testimonials_log',$log_data);

			return array('status'=>'1','message'=>'Testimonial has been updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the testimonial. Please try again');
		}
	}

	function delete_testimonial() {
		$userdata = array(
			'testimonial_id' => $this->input->post('testimonial_id'),
		);

		$db_num_rows = $this->db->where($userdata)->get('testimonial');

		if ($db_num_rows->num_rows() > 0) {
			$db_details = $db_num_rows->row_array();
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'testimonial_id' => $this->input->post('testimonial_id'),
				'client_name'=>$db_details['client_name'],
				'client_company_name'=>$db_details['client_company_name'],
				'client_role'=>$db_details['client_role'],
				'client_review'=>$db_details['client_review'],
				'client_selected_service'=>$db_details['client_selected_service'],
				'client_image_or_logo'=>$db_details['client_image_or_logo'],
				'testimonial_status'=>'5',
				'testimonial_added_updated_by_admin_id'=>$admin_info['admin_id']
			);
			$this->db->insert('testimonials_log',$log_data);

			if($this->db->where('testimonial_id',$this->input->post('testimonial_id'))->delete('testimonial')) {
				return array('status'=>'1','message'=>'Testimoial been deleted successfully.');
			}
			return array('status'=>'0','message'=>'Something went wrong while deleting the testimonial.');
		}
		return array('status'=>'0','message'=>'Something went wrong while deleting the testimonial.');
	}
}