<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Util_Modal extends CI_Model {

	function random_number($digits) {
		return rand(pow(10, $digits - 1) - 1, pow(10, $digits) - 1);
	}

	function send_sms($first_name,$client_name,$ph_number,$login_otp,$messageStatus) {
		$login_link = 'http://onelink.to/k5gcup';
		$pass_data = '';
		if($messageStatus == '1') {
			// OTP message
			// $pass_data = 'Hi '.$first_name.', this verification is initiated by '.$client_name.' as part of your Background Verification Process. Kindly click on the link to complete the task. http://onelink.to/j4yv6q Login by entering your mobile number and password:'.$login_otp.'. Thanks, Team FactSuite';
			$pass_data = 'Hi '.$first_name.', this verification is initiated by '.$client_name.' as part of your employee/tenant/support staff background verification process. Kindly click on the link to complete the task '.$login_link.'. Log in by entering your mobile number and password: '.$login_otp.'. Thanks, Team FactSuite';

		}else if($messageStatus == '2') {
			// Insuff Message
			// $pass_data = 'Hi '.$first_name.', this verification is initiated by '.$client_name.' as part of your Background Verification Process. Kindly click on the link to complete the task. http://onelink.to/j4yv6q Login by entering your mobile number and password:'.$login_otp.'. Thanks, Team FactSuite';

			$pass_data = 'Hi '.$first_name.', this verification is initiated by '.$client_name.' as part of your employee/tenant/support staff background verification process. Kindly click on the link to complete the task '.$login_link.'. Log in by entering your mobile number and password: '.$login_otp.'. Thanks, Team FactSuite';
		}
		
	    $curl = curl_init();
	    curl_setopt_array($curl, array(
	        CURLOPT_URL => 'http://sms-alerts.servetel.in/api/v4/?api_key=A25b53c27773fb73f72a71c651134b73e&method=sms&message='.urlencode($pass_data).'&to=91'.$ph_number.'&sender=FACTSU',
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_ENCODING => "",
	        CURLOPT_MAXREDIRS => 10,
	        CURLOPT_TIMEOUT => 0,
	        CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        CURLOPT_CUSTOMREQUEST => "POST",
	    ));
	    $response = curl_exec($curl);
	    $curl_response_data = json_decode($response,true);
	    
	    if(strtolower($curl_response_data['status']) == 'ok') {
	        return $status = '200';
	    } else { 
	    	return $status = '201';
	        // $sms_error_insert = "INSERT INTO `sms_email_error_log`(`error_type`, `candidate_id`)
	        //                     VALUES (1,'".$candidate_id."')";
	        // if(mysqli_query($conncetion,$sms_error_insert)){
	        //     echo $status = '201';
	        // } else {
	        //     echo $status = '202';
	        // }
	    }
	}

	function moneyFormatIndia($num) {
	    $explrestunits = "" ;
	    if(strlen($num) > 3) {
	        $lastthree = substr($num, strlen($num)-3, strlen($num));
	        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
	        $restunits = (strlen($restunits)%2 == 1) ? "0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
	        $expunit = str_split($restunits, 2);
	        for($i = 0; $i < sizeof($expunit);  $i++) {
	            // creates each of the 2's group and adds a comma to the end
	            if($i == 0) {
	                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
	            } else {
	                $explrestunits .= $expunit[$i].",";
	            }
	        }
	        $thecash = $explrestunits.$lastthree;
	    } else {
	        $thecash = $num;
	    }
	    return $thecash; // writes the final format where $currency is the currency symbol.
	}

}