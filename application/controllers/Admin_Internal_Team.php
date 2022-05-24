<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	class Admin_Internal_Team extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');
		  	$this->load->helper('string');
		  	$this->load->model('admin_Internal_Team_Model');
		}

		function index() {
			echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
		}

		function get_all_internal_team_roles() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_list'=>$this->admin_Internal_Team_Model->get_all_internal_team_roles()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_internal_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','check_duplication'=>$this->admin_Internal_Team_Model->check_new_internal_role_name($this->input->post('role_name'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_edit_internal_team_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','check_duplication'=>$this->admin_Internal_Team_Model->check_edit_internal_team_role_name($this->input->post('role_id'),$this->input->post('role_name'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function add_new_internal_team_role() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_details'=>$this->admin_Internal_Team_Model->add_new_internal_team_role()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function update_internal_team_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_details'=>$this->admin_Internal_Team_Model->update_internal_team_role_name()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
		
		function change_internal_team_role_status() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','return_status'=>$this->admin_Internal_Team_Model->change_internal_team_role_status()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function get_single_internal_team_role_details() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','role_details'=>$this->admin_Internal_Team_Model->get_single_internal_team_role_details($this->input->post('internal_team_role_id'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function delete_internal_team_role_name() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','delete_image'=>$this->admin_Internal_Team_Model->delete_internal_team_role_name()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_team_member_mobile_number() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','number_count'=>$this->admin_Internal_Team_Model->check_new_team_member_mobile_number($this->input->post('mobile_number'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_team_member_email_id() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				echo json_encode(array('status'=>'1','email_count'=>$this->admin_Internal_Team_Model->check_new_team_member_email_id($this->input->post('email'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function add_new_internal_team_member() {
			if (isset($_POST) && $this->input->post('verify_admin_request') == '1' && $this->session->userdata('logged-in-admin')) {
				$check_new_team_member_mobile_number = $this->admin_Internal_Team_Model->check_new_team_member_mobile_number($this->input->post('mobile_number'));
				$check_new_team_member_email_id = $this->admin_Internal_Team_Model->check_new_team_member_email_id($this->input->post('email_id'));
				if ($check_new_team_member_mobile_number['count'] == 0 && $check_new_team_member_email_id['count'] == 0) {
					echo json_encode(array('status'=>'1','team_member'=>$this->admin_Internal_Team_Model->add_new_internal_team_member()));
				} else {
					echo json_encode(array('status'=>'2','message'=>'Duplication Found','mobile_number_count'=>$check_new_team_member_mobile_number['count'],'email_id_count'=>$check_new_team_member_email_id['count']));
				}
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}


	function import_excel(){ 
            if(!empty($_FILES['files']['name'])) { 
                // get file extension
                $extension = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
 
                if($extension == 'csv'){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['files']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                 
                // array Count
                $arrayCount = count($allDataInSheet);
              	$flag = true;
                $i=0;
                $date = date('Y-m-d');
                $inserdata = array();
                foreach ($allDataInSheet as $value) {
                  if($flag){
                    $flag =false;
                    continue;
                } 
  /*`user_id`, `username`, `password`, `full_name`, `phone`, `email`, `address`, `note`, `id_proof`, `start_date`, `end_date`, `bandwidth`, `ip_address`, `extra_ip_address`, `mac_address`, `mac_vendor`, `location`, `type`, `auto_bind`, `bandwidth_lock`, `status`, `bill`, `due`, `tag`, `zone*/
                if ($value['A'] !='') {   
				                $inserdata[$i]['user_id'] = $value['A']; 
				                $inserdata[$i]['username'] =$value['D'];
				                $inserdata[$i]['password'] =rand();
				                $inserdata[$i]['full_name'] =$value['E'];
				                $inserdata[$i]['phone'] = $value['F']; 
				                $inserdata[$i]['email'] = $value['G']; 
				                $inserdata[$i]['address'] = $value['H']; 
				                $inserdata[$i]['note'] = $value['I']; 
				                $inserdata[$i]['id_proof'] = $value['J']; 
				                $inserdata[$i]['start_date'] = $value['K']; 
				                $inserdata[$i]['end_date'] = $value['L']; 
				                $inserdata[$i]['bandwidth'] = $value['M']; 
				                $inserdata[$i]['ip_address'] = $value['N']; 
				                $inserdata[$i]['extra_ip_address'] = $value['O']; 
				                $inserdata[$i]['mac_address'] = $value['P']; 
				                $inserdata[$i]['mac_vendor'] = $value['Q']; 
				                $inserdata[$i]['location'] = $value['R']; 
				                $inserdata[$i]['type'] = $value['S']; 
				                $inserdata[$i]['auto_bind'] = $value['T']; 
				                $inserdata[$i]['bandwidth_lock'] = $value['U']; 
				                $inserdata[$i]['status'] = $value['V']; 
				                $inserdata[$i]['bill'] = $value['W']; 
				                $inserdata[$i]['due'] = $value['X']; 
				                $inserdata[$i]['tag'] = $value['Y']; 
				                $inserdata[$i]['zone'] = $value['Z'];  
				       
		            }
                  $i++;
                }   
                	$tempArr = array_unique(array_column($inserdata, 'user_id'));
					$inserdata_new = array_intersect_key($inserdata, $tempArr);   

	                if (count($inserdata) > 0) {
	                    $data = $this->admin_Internal_Team_Model->insert_bulk_case($inserdata_new);	 
	               		// $data = array('status'=>'1','products'=>$inserdata_new);// 
	                }else{
	                	$data = array('status'=>'0');
	                } 
    

                } else {
                    $data = array('status'=>'0');
                }
           echo json_encode($data); 

	}


	function get_new_user_insert_request(){
		
		file_put_contents('logs.txt', json_encode($_POST).PHP_EOL , FILE_APPEND | LOCK_EX);
		 $access_token = "JDJhJDEwJGNiVk1VOVU2NjVWU3FwZndyTlpXT2VVNWNJRE9lNWlCSjhaVmEyeUpDVHNuazlNRVpIdlJx";  
		if ($access_token == $this->input->post('_token')) { 
			$data = $this->admin_Internal_Team_Model->insert_new_customer_details();
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>'403','msg'=>'invalid token key'));
		}
	}


	function get_single_user_details(){
		$data = $this->admin_Internal_Team_Model->get_single_user_details();
			echo json_encode($data);
	}

	}
 