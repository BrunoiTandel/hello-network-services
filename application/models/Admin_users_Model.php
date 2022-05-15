<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users_Model extends CI_Model {

	function get_all_users() {
		return $this->db->order_by('user_id','ASC')->get('user')->result_array();
	}

	function get_analytics(){
		$user = $this->db->get('user')->num_rows();
		$internal_team_member = $this->db->get('internal_team_member')->num_rows();
		$user_purchased_package = $this->db->get('user_purchased_package')->num_rows();
		$products = $this->db->get('products')->num_rows();

		return array(
			'user' => $user,
			'internal_team_member' => $internal_team_member,
			'user_purchased_package' => $user_purchased_package,
			'products' => $products,
		);
	}

	 
}