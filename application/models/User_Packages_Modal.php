<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Packages_Modal extends CI_Model {

	function get_all_products() {
		return $this->db->where('product_status','1')->order_by('product_id','DESC')->get('products')->result_array();
	}

	function get_purchased_packages() {
		$user_details = $this->session->userdata('logged-in-user');
		return $this->db->where('user_id',$user_details['uid'])->order_by('user_purchased_package_id','DESC')->get('user_purchased_package')->result_array();
	}

	function get_purchase_package_details($package_id) {
		$where_array = array(
			'product_status' => 1,
			'MD5(TO_BASE64(MD5(MD5(product_id))))' => $package_id

		);
		$package_details = $this->db->where($where_array)->get('products')->row_array();
		if ($package_details != '') {
			$gst_details = $this->get_gst_details();
			
			$data['package_details'] = $package_details;

			$data['package_payment_amount'] = ((float)$package_details['product_plan_price'] + (((float)$package_details['product_plan_price']) * ((float)$gst_details['gst_percentage'] / 100))) * 100;
			
			$user_details = $this->session->userdata('logged-in-user');
			$data['user_details'] = array(
				'name' => $user_details['full_name'],
				'mobile_number' => $user_details['phone'],
				'email_id' => $user_details['email']
			);

			$data['payment_key'] = $this->admin_Payment_Details_Model->get_payment_details()['api_authentication_key'];

			$data['gst_percentage'] = $gst_details['gst_percentage'];
			return array('status'=>'1','purchase_package_details'=>$data);
		} else {
			return array('status'=>'0','message'=>'Wrong Package selected. Please select the correct package.');
		}
	}

	function get_gst_details() {
		return $this->db->where('gst_id','1')->get('gst_details')->row_array();
	}

	function store_purchased_package_details() {
		$where_array = array(
			'product_status' => 1,
			'MD5(TO_BASE64(MD5(MD5(product_id))))' => $this->input->post('package_id')

		);
		$package_details = $this->db->where($where_array)->get('products')->row_array();
		if ($package_details != '') {
			$user_details = $this->session->userdata('logged-in-user');
			$add_data = array(
				'user_id' => $user_details['uid'],
				'package_id' => $package_details['product_id'],
				'payment_id' => $this->input->post('razorpay_payment_id'),
				'amount_paid' => (float)$this->input->post('package_amount') / 100,
				'gst_applied' => $this->input->post('gst_applied'),
				'package_details' => json_encode($package_details),
			);

			if ($this->db->insert('user_purchased_package',$add_data)) {
				return array('status'=>'1','message'=>'Package purchased successfully.');
			}
			return array('status'=>'2','message'=>'Something went wrong while purchasing the package.');
		} else {
			return array('status'=>'0','message'=>'Wrong Package selected. Please select the correct package.');
		}
	}



	function store_purchased_package_details_direct() {
		$where_array = array(
			'product_status' => 1,
			'product_id' => $this->input->post('product')

		);
		$package_details = $this->db->where($where_array)->get('products')->row_array();
		if ($package_details != '') { 
			$add_data = array(
				'user_id' => $this->input->post('user'),
				'package_id' => $package_details['product_id'],
				'payment_id' => '-',
				'amount_paid' => (float)($package_details['product_plan_price'] * (18 / 100))+$package_details['product_plan_price'],
				'gst_applied' => '18',
				'package_details' => json_encode($package_details),
			);

			if ($this->db->insert('user_purchased_package',$add_data)) {
				return array('status'=>'1','message'=>'Package purchased successfully.');
			}
			return array('status'=>'2','message'=>'Something went wrong while purchasing the package.');
		} else {
			return array('status'=>'0','message'=>'Wrong Package selected. Please select the correct package.');
		}
	}
}