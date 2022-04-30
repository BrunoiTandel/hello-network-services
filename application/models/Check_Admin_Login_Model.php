<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_Admin_Login_Model extends CI_Model {

	function check_admin_login() {
		if(!$this->session->userdata('logged-in-admin')) {
			redirect($this->config->item('my_base_url').'admin');
		}
	}
}