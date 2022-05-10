<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Product_Model extends CI_Model {

	function get_all_products() {
		return $this->db->order_by('product_id','DESC')->get('products')->result_array();
	}

	function add_new_product($product_thumbnail_image) { 
		$add_data = array(
			'product_title' => $this->input->post('product_title'),
			'product_volume_data_limit' => $this->input->post('limit'),
			'product_data_speed' => $this->input->post('speed'),
			'product_data_validation' => $this->input->post('validity'),
			'product_plan_price' => $this->input->post('price'),
			'product_plan_type' => $this->input->post('product_type'),
			'product_content' => $this->input->post('product_content'),
			'product_image' => $product_thumbnail_image
		);

		if ($this->db->insert('products',$add_data)) { 
			return array('status'=>'1','message'=>'Product has been added successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while adding the product. Please try again');
		}
	}

	function change_product_status() {
		$userdata = array(
			'product_status'=>$this->input->post('changed_status')
		);

		if ($this->db->where('product_id',$this->input->post('id'))->update('products',$userdata)) {
			
			$log_data = $this->db->where('product_id',$this->input->post('id'))->get('products')->row_array();
			
			$status_log = '3';
			if ($this->input->post('changed_status') == 0) {
				$status_log = '4';
			}

			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data_array = array(
				'product_id' => $this->input->post('id'),
				'product_title' => $log_data['product_title'],
				'product_link' => $log_data['product_link'],
				'post_type' => $log_data['post_type'],
				'product_content' => $log_data['product_content'],
				'product_thumbnail_image' => $log_data['product_thumbnail_image'],
				'product_status' => $status_log,
				'product_add_or_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('product_log',$log_data_array);

			return array('status'=>'1','message'=>'Status updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the status.');
		}
	}

	function get_product_details() {
		return $this->db->where('product_id',$this->input->post('product_id'))->get('products')->row_array();
	}

	function update_product($product_thumbnail_image) {
		$update_data = array(
			'product_title' => $this->input->post('product_title'),
			'product_link' => $this->input->post('external_link'),
			'post_type' => $this->input->post('post_type'),
			'product_content' => $this->input->post('product_content')
		);

		if($product_thumbnail_image != 'no-file') {
			$update_data['product_thumbnail_image'] = $product_thumbnail_image;
		}

		if ($this->db->where('product_id',$this->input->post('product_id'))->update('products',$update_data)) {

			$get_image = $this->db->select('product_thumbnail_image')->where('product_id',$this->input->post('product_id'))->get('products')->row_array();
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'product_id' => $this->input->post('product_id'),
				'product_title' => $this->input->post('product_title'),
				'product_link' => $this->input->post('external_link'),
				'post_type' => $this->input->post('post_type'),
				'product_content' => $this->input->post('product_content'),
				'product_thumbnail_image' => $product_thumbnail_image,
				'product_add_or_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('product_log',$log_data);

			return array('status'=>'1','message'=>'Product has been updated successfully.','product_thumbnail_image'=>$get_image['product_thumbnail_image']);
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the nlog. Please try again');
		}
	}

	function delete_product() {
		$userdata = array(
			'product_id' => $this->input->post('product_id'),
		);

		$db_num_rows = $this->db->where($userdata)->get('products');

		if ($db_num_rows->num_rows() > 0) {
			$db_details = $db_num_rows->row_array();
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'product_id' => $this->input->post('product_id'),
				'product_title'=>$db_details['product_title'],
				'product_link'=>$db_details['product_link'],
				'post_type' => $db_details['post_type'],
				'product_content'=>$db_details['product_content'],
				'product_thumbnail_image'=>$db_details['product_thumbnail_image'],
				'product_status'=>'5',
				'product_add_or_updated_by_admin_id'=>$admin_info['admin_id']
			);
			$this->db->insert('product_log',$log_data);

			if($this->db->where('product_id',$this->input->post('product_id'))->delete('products')) {
				return array('status'=>'1','message'=>'Product been deleted successfully.');
			}
			return array('status'=>'0','message'=>'Something went wrong while deleting the product.');
		}
		return array('status'=>'0','message'=>'Something went wrong while deleting the product.');
	}
}