<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_Login extends CI_Controller {
		
		function __construct() {
		  	parent::__construct();
		  	$this->load->database();
		  	$this->load->helper('url');
		  	$this->load->model('user_Login_Modal');
		}

		function verify_login() { 
			if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
				echo json_encode(array('status'=>'1','user_data'=>$this->user_Login_Modal->verify_login()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function verify_logout() {
			if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
				$this->session->unset_userdata('logged-in-user');
 				echo json_encode(array('status'=>'1','message'=>'User Logout Successfully.'));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function reset_password($email_id,$encoded_date) {
			$data['title'] = 'Factsuite';
			$data['all_services'] = $this->fs_User_Services_Model->get_all_services();
			$data['check_careers_page_active'] = $this->fs_User_Careers_Model->check_careers_page_active();
			$data['contact_us_details'] = $this->fs_User_Contact_Us_Model->get_contact_us_page_details();
			$data['components_list'] = $this->fs_User_Services_Model->get_all_components();
			$data['email_id'] = $email_id;
			$data['encoded_date'] = $encoded_date;

			$this->load->view('user-common/desktop-header',$data);
			if(isset($email_id) && $email_id != '' && isset($encoded_date) && $encoded_date != '') {
				$reset_password_user = $this->session->userdata('reset-password-user');

				$variable_array = array(
					'email_id' => $email_id,
					'encoded_date' => $encoded_date
				);
				$check_details_for_reset_password = $this->check_input_details_for_reset_password($variable_array);
				if($check_details_for_reset_password['status'] == 1 && $check_details_for_reset_password['verify'] != '') {
					$current_date_time = new DateTime();
					$reset_password_time = new DateTime($check_details_for_reset_password['verify']['reset_password_date']);

					$diff = $current_date_time->diff($reset_password_time);

					if((($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i) < $this->config->item('reset_password_timeout')) {
						$data['email_id'] = $email_id;
						$data['encoded_date'] = $encoded_date;
						$this->load->view('user/desktop/reset-password',$data);
					} else {
						$this->load->view('user/desktop/page-not-found');	
					}
				} else {
					$this->load->view('user/desktop/page-not-found');
				}
			} else {
				$this->load->view('user/desktop/page-not-found');
			}
			$this->load->view('user-common/desktop-footer');
		}

		function m_reset_password($email_id,$encoded_date) {
			$data['title'] = 'Factsuite';
			$data['all_services'] = $this->fs_User_Services_Model->get_all_services();
			$data['check_careers_page_active'] = $this->fs_User_Careers_Model->check_careers_page_active();
			$data['contact_us_details'] = $this->fs_User_Contact_Us_Model->get_contact_us_page_details();
			$this->load->view('user-common/mobile-header',$data);
			if(isset($email_id) && $email_id != '' && isset($encoded_date) && $encoded_date != '') {
				$reset_password_user = $this->session->userdata('reset-password-user');
				$variable_array = array(
					'email_id' => $email_id,
					'encoded_date' => $encoded_date
				);
				$check_details_for_reset_password = $this->check_input_details_for_reset_password($variable_array);
				if($check_details_for_reset_password['status'] == 1 && $check_details_for_reset_password['verify'] != '') {
					$current_date_time = new DateTime();
					$reset_password_time = new DateTime($check_details_for_reset_password['verify']['reset_password_date']);

					$diff = $current_date_time->diff($reset_password_time);

					if((($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i) < $this->config->item('reset_password_timeout')) {
						$data['email_id'] = $email_id;
						$data['encoded_date'] = $encoded_date;
						$this->load->view('user/mobile/reset-password',$data);
					} else {
						$this->load->view('user/mobile/page-not-found');
					}
				} else {
					$this->load->view('user/mobile/page-not-found');
				}
			} else {
				$this->load->view('user/mobile/page-not-found');
			}
			$this->load->view('user-common/mobile-footer');
		}

		function check_input_details_for_reset_password($variable_array) {
			if ($variable_array != '') {
				return array('status'=>'1','verify'=>$this->fs_User_Registration_Model->check_input_details_for_reset_password($variable_array));
			} else {
				return array('status'=>'201','message'=>'Bad Request Format');
			}
		}

		function trigger_mail($email,$name) {
			// $rand = '0123';
			$rand = rand(9999,100);
			$email_msg ='';
			$email_msg .= '<html> ';
			$email_msg .= '<head>';
			$email_msg .= '<style>';
			$email_msg .= 'table {';
			$email_msg .= 'font-family: arial, sans-serif;';
			$email_msg .= 'border-collapse: collapse;';
			$email_msg .= 'width: 100%;';
			$email_msg .= '}';

			$email_msg .= 'td, th {';
			$email_msg .= 'border: 1px solid #dddddd;';
			$email_msg .= 'text-align: left;';
			$email_msg .= 'padding: 8px;';
			$email_msg .= '}';

			$email_msg .= 'tr:nth-child(even) {';
			$email_msg .= 'background-color: #dddddd;';
			$email_msg .= '}';
			$email_msg .= '</style>';
			$email_msg .= '</head>';
			$email_msg .= '<body> ';
			$email_msg .= '<p>Dear '.ucwords($name).',</p>';
			$email_msg .= '<p>Thank you for choosing FactSuite as your background verification partner. You’re only a few steps away to become a registered user.</p>';
			$email_msg .= '<p>Please find the login OTP for your FactSuite account access, mentioned below: </p>';
			$email_msg .= '<table>'; 
			$email_msg .= '<th>UserName</th>';
			$email_msg .= '<th>OTP</th>';
			$email_msg .= '<tr>'; 
			$email_msg .= '<td>'.$email.'</td>';
			$email_msg .= '<td>'.$rand.'</td>';//http://localhost:8080/factsuitecrm/
			$email_msg .= '<tr>';
			$email_msg .= '</table>';
			$email_msg .= '<p><b>Yours sincerely,<br>';
			$email_msg .= 'Team FactSuite</b></p>';
			$email_msg .= '</body>';
			$email_msg .= '</html>';
			$client_otp_subject = "Login OTP";
			$this->session->set_userdata('otp',$rand);
			$send_email_to_user = $this->email_Model->send_mail($email,$client_otp_subject,$email_msg);
		}

		function check_new_user_email_id() {
			if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
				echo json_encode(array('status'=>'1','email_count'=>$this->fs_User_Registration_Model->check_new_user_email_id($this->input->post('email'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function check_new_user_mobile_number() {
			if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
				echo json_encode(array('status'=>'1','number_count'=>$this->fs_User_Registration_Model->check_new_user_mobile_number($this->input->post('mobile_number'))));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function submit_registration_details() {
			if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
				echo json_encode(array('status'=>'1','user_resistration'=>$this->fs_User_Registration_Model->submit_registration_details()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function verify_forgot_password_email_id() {
			if (isset($_POST) && $this->input->post('verify_user_request') == '1') {
				echo json_encode(array('status'=>'1','verify'=>$this->fs_User_Registration_Model->verify_forgot_password_email_id()));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}

		function verify_and_reset_password() {
			if (isset($_POST) && $this->input->post('verify_user_request') == '1' && $this->input->post('email_id') != '' && $this->input->post('encoded_date') != '') {
				$variable_array = array(
					'email_id' => $this->input->post('email_id'),
					'encoded_date' => $this->input->post('encoded_date')
				);
				echo json_encode(array('status'=>'1','reset'=>$this->fs_User_Registration_Model->verify_and_reset_password($variable_array)));
			} else {
				echo json_encode(array('status'=>'201','message'=>'Bad Request Format'));
			}
		}
	}
?>