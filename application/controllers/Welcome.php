<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
	  	$this->load->helper('url');
	  	$this->load->model('user_Packages_Modal');
	  	$this->load->model('admin_Blog_Model');
	}

	function index() {
		$data['title'] = 'Hello Network Services';
		$data['packages_list'] = $this->user_Packages_Modal->get_all_products();
		$data['news'] = $this->admin_Blog_Model->get_all_blogs(); 
		$this->load->view('user-common/header',$data);
		$this->load->view('user/index');
		$this->load->view('user-common/footer');
	}

	function index_2() {
		$data['title'] = 'Hello Network Services';
		$data['packages_list'] = $this->user_Packages_Modal->get_all_products();
		
		$this->load->view('user-common/header-2',$data);
		$this->load->view('user/index-2');
		$this->load->view('user-common/footer-2');
	}
}
