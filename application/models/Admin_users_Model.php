<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users_Model extends CI_Model {

	function get_all_users() {
		return $this->db->order_by('uid','ASC')->get('users')->result_array();
	}

	function get_analytics(){
		$user = $this->db->get('users')->num_rows();
		$internal_team_member = $this->db->get('internal_team_member')->num_rows();
		$user_purchased_package = $this->db->get('user_purchased_package')->num_rows();
		$products = $this->db->get('products')->num_rows();
		$total = $this->db->query('Select sum(amount_paid) as amount_paid from user_purchased_package')->row_array();
		return array(
			'user' => $user,
			'internal_team_member' => $internal_team_member,
			'user_purchased_package' => $user_purchased_package,
			'products' => $products,
			'total' => $total['amount_paid'],
		);
	}

	 
}