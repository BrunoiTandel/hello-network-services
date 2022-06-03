<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {

	function get_all_orders() {
		if($this->session->userdata('logged-in-team-member')) {
			$user = $this->session->userdata('logged-in-team-member');
			$this->db->where('users.tag',$user['tag']);
		}
		return $this->db->order_by('user_purchased_package_id','DESC')->select('*')->from('user_purchased_package')->join('users','user_purchased_package.user_id = users.uid','left')->join('products','user_purchased_package.package_id = products.product_id','left')->get('')->result_array();
	}

	 
} 