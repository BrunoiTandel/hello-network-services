<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users_Model extends CI_Model {

	function get_all_users() {
		return $this->db->order_by('user_id','ASC')->get('user')->result_array();
	}

	 
}