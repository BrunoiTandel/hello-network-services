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
	  	$this->load->model('fs_User_Services_Model');
	  	$this->load->model('fs_User_Index_Model');
	  	$this->load->model('fs_User_Testimonial_Model');
	  	$this->load->model('fs_User_Clients_Model');
	  	$this->load->model('fs_User_Contact_Us_Model');
	  	$this->load->model('fs_User_Careers_Model');
	  	$this->load->model('email_Model');
	}

	function test(){
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
			$email_msg .= '<p>Dear Viral,</p>';
			$email_msg .= '<p>Greetings from Factsuite!!</p>'; 
			$email_msg .= '<p>We appreciate your business & hope to delight you with our efficient service offerings during our association.</p>';
			$email_msg .= '<p>Please find the Login OTP for your Factsuite CRM access, mentioned below- </p>';
			$email_msg .= '<table>'; 
			$email_msg .= '<th>UserName</th>';
			$email_msg .= '<th>Otp</th>';
			$email_msg .= '<tr>'; 
			$email_msg .= '<td>viral@riyatsa.com</td>';
			$email_msg .= '<td>1234</td>';//http://localhost:8080/factsuitecrm/
			$email_msg .= '<tr>';
			$email_msg .= '</table>';
			$email_msg .= '<p><b>Yours sincerely,<br>';
			$email_msg .= 'Team Factsuite</b></p>';
			$email_msg .= '</body>';
			$email_msg .= '</html>';
			$client_otp_subject = "Login OTP";
		$this->email_Model->send_mail('viral@riyatsa.com','test',$email_msg );
	}

	function mail() {
			$this->db->where('mail_id','1');
			$mail_result = $this->db->get('mail_details');
			$mail_data = $mail_result->row_array();

			$mail = new PHPMailer();
			$mail->Encoding = "base64";
			$mail->SMTPAuth = true;
			$mail->Host = "smtp.zeptomail.in";
			$mail->Port = 587;
			$mail->Username = "emailapikey";
			$mail->Password = 'PHtE6r0NFOC/jmN8+hcDsKDpEMOsZost+Lk0fwNPtocUX/cGGE1WqdopkWTmqhYvUaNKEKHIntg6uL6Us+PQImvrMW4ZXGqyqK3sx/VYSPOZsbq6x00YslgedETbU4HsetBi1C3TvtjdNA==';
			$mail->SMTPSecure = 'TLS';
			$mail->isSMTP();
			$mail->IsHTML(true);
			$mail->CharSet = "UTF-8";
			$mail->From = "noreply@factsuite.com";
			$mail->addAddress('viral@riyatsa.com');
			$mail->Body="Test email sent successfully.";
			$mail->Subject="Test Email";
			$mail->SMTPDebug = 3;
			$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str"; echo "<br>";};
			if(!$mail->Send()) {
			    echo "Mail sending failed";
			} else {
			    echo "Successfully sent";
			}
		}

	function index() {
		$data['title'] = 'Factsuite';
		$data['all_services'] = $this->fs_User_Services_Model->get_all_services();
		$data['cart_count'] = $this->fs_User_Services_Model->get_cart_count();
		$data['check_careers_page_active'] = $this->fs_User_Careers_Model->check_careers_page_active();
		$data['home_page_details'] = $this->fs_User_Index_Model->get_home_page_details();
		$data['home_page_we_enable_list'] = $this->fs_User_Index_Model->get_all_home_page_we_enable();
		$data['testimonial_list'] = $this->fs_User_Testimonial_Model->get_all_testimonials();
		$data['client_list'] = $this->fs_User_Clients_Model->get_all_clients();
		$data['contact_us_details'] = $this->fs_User_Contact_Us_Model->get_contact_us_page_details();
		$data['components_list'] = $this->fs_User_Services_Model->get_all_components();
		
		$this->load->view('user-common/desktop-header',$data);
		$this->load->view('user/desktop/index');
		$this->load->view('user-common/desktop-footer');
	}

	function m_index() {
		$data['title'] = 'Factsuite';
		$data['all_services'] = $this->fs_User_Services_Model->get_all_services();
		$data['check_careers_page_active'] = $this->fs_User_Careers_Model->check_careers_page_active();
		$data['home_page_details'] = $this->fs_User_Index_Model->get_home_page_details();
		$data['home_page_we_enable_list'] = $this->fs_User_Index_Model->get_all_home_page_we_enable();
		$data['testimonial_list'] = $this->fs_User_Testimonial_Model->get_all_testimonials();
		$data['client_list'] = $this->fs_User_Clients_Model->get_all_clients();
		$data['contact_us_details'] = $this->fs_User_Contact_Us_Model->get_contact_us_page_details();
		$this->load->view('user-common/mobile-header',$data);
		$this->load->view('user/mobile/index');
		$this->load->view('user/mobile/contact-us-section');
		$this->load->view('user-common/mobile-footer');
	}
}
