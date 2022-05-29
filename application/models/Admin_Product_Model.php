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
			'product_volume_data_limit' => $this->input->post('limit'),
			'product_data_speed' => $this->input->post('speed'),
			'product_data_validation' => $this->input->post('validity'),
			'product_plan_price' => $this->input->post('price'),
			'product_plan_type' => $this->input->post('product_type'),
			'product_content' => $this->input->post('product_content'),
		);

		if($product_thumbnail_image != 'no-file') {
			$update_data['product_image'] = $product_thumbnail_image;
		}

		if ($this->db->where('product_id',$this->input->post('product_id'))->update('products',$update_data)) {

			$get_image = $this->db->select('product_image')->where('product_id',$this->input->post('product_id'))->get('products')->row_array();
			 
			return array('status'=>'1','message'=>'Product has been updated successfully.','product_thumbnail_image'=>$get_image['product_image']);
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
			 
			if($this->db->where('product_id',$this->input->post('product_id'))->delete('products')) {
				return array('status'=>'1','message'=>'Product been deleted successfully.');
			}
			return array('status'=>'0','message'=>'Something went wrong while deleting the product.');
		}
		return array('status'=>'0','message'=>'Something went wrong while deleting the product.');
	}

	function get_data_yearly_monthly(){
		$join ='';
		if($this->session->userdata('logged-in-team-member')) {
			$join = 'LEFT JOIN `users` ON `user_purchased_package`.`user_id` = `users`.`uid` where users.tag="bbnl"';
		}
		
		return $this->db->query("SELECT YEAR(purchased_date) as Year, MONTH(purchased_date)  as Month, COUNT(*) as SalesCount, DATE_FORMAT(date(purchased_date),'%M %Y') as monthname, SUM(amount_paid) as amount_paid
			FROM user_purchased_package ".$join." 
			GROUP BY YEAR(purchased_date), MONTH(purchased_date) 
			ORDER BY user_purchased_package_id DESC")->result_array();
	}
}