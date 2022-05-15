<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {

	function get_all_orders() {
		return $this->db->order_by('user_purchased_package_id','DESC')->select('*')->from('user_purchased_package')->join('user','user_purchased_package.user_id = user.user_id','left')->join('products','user_purchased_package.package_id = products.product_id','left')->get('')->result_array();
	}

	 
} 