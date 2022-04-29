<?php

class Custom_Util extends CI_Controller {

	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');
	  	$this->load->helper('string');
	}

	function get_ticket_priority_list() {
		echo file_get_contents(base_url().'assets/custom-js/json/ticket-priority-list.json');
	}

	function get_ticket_classification_list() {
		echo file_get_contents(base_url().'assets/custom-js/json/ticket-classification-list.json');
	}

	// function get_fs_crm_image_upload_path() {
	// 	echo file_get_contents(base_url().'assets/custom-js/json/ticket-classification-list.json');
	// }
}