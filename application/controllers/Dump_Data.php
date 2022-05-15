<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Dump_Data extends CI_Controller {
	
	function __construct()  
	{
	  parent::__construct();
	  $this->load->database();
	  $this->load->helper('url');   
	}	

	function index(){
		 die("something wen't wrong."); 
	}

    function date_convert($date){
        $d = 'NA';
        if ($date !='' && $date !=null && $date !='-') { 
            $d = date('d-m-Y', strtotime($date));
        }
        return $d;
    }

	function daily_user_report(){
	  
 
 			// $data = $this->adminViewAllCaseModel->getAllAssignedCases();   
        $where ='';
        if ($this->input->post('duration') == 'today') {
          $where=" where date(user_created_date) = CURDATE()";
        }else if($this->input->post('duration') == 'week'){
          $where=" where date(user_created_date) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()";
        }else if($this->input->post('duration') == 'month'){
          $where=" where date(user_created_date) BETWEEN CURDATE() - INTERVAL 1 MONTH AND CURDATE()";
        }else if($this->input->post('duration') == 'year'){
          $where=" where date(user_created_date) BETWEEN CURDATE() - INTERVAL 1 YEAR AND CURDATE()";
        }else if($this->input->post('duration') == 'between'){
          $where=" where date(user_created_date) BETWEEN  '".$_POST['from']."' AND '".$_POST['to']."'";
        }else{
            $where="";
        }

        $user_details = $this->db->query('SELECT * FROM user '.$where.'  ORDER BY user_id DESC')->result_array();
 
 			 
 			
	 		// create file name
	        $fileName = 'users-report-'.time().'.xlsx';   
	        $objPHPExcel = new Spreadsheet();
	        
	        // set Header
	        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sr.no.');
	        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'User Id');        
	        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'First Name');       
	        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Last Name');     
	        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Email');     
	        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Phone Number');     
	        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'User IP');     
	        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Block');     
	        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Address');      
	        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Joining Date');     
	               
	        // set Row
	        $rowCount = 2;
	        $i =1;
 
	        foreach ($user_details as $key => $value) {
	   
	            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i++);
	            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value['user_id']);
	            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value['user_first_name']);
	            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $value['user_last_name']);
	            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $value['user_email_id']); 
	            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $value['user_mobile_number']); 
	            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $value['user_ip_address']); 
	            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $value['user_block']); 
	            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $value['user_address']); 
	            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $this->date_convert($value['user_created_date']));  
	            

	            $rowCount++;

	        }
	         
	    
	 
	        $objWriter = new Xlsx($objPHPExcel);
	        $objWriter->save('assets/uploads/report/'.$fileName);
	 		// download file
	        // header("Content-Type: application/vnd.ms-excel");
	        // redirect(base_url().'uploads/report/'.$fileName);  

			echo json_encode(array('filename' =>$fileName ,'path' =>base_url().'assets/uploads/report/'.$fileName));

	} 


 
    function daily_order_report(){
      
 
            // $data = $this->adminViewAllCaseModel->getAllAssignedCases();   
        $where ='';
        if ($this->input->post('duration') == 'today') {
          $where=" where date(purchased_date) = CURDATE()";
        }else if($this->input->post('duration') == 'week'){
          $where=" where date(purchased_date) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()";
        }else if($this->input->post('duration') == 'month'){
          $where=" where date(purchased_date) BETWEEN CURDATE() - INTERVAL 1 MONTH AND CURDATE()";
        }else if($this->input->post('duration') == 'year'){
          $where=" where date(purchased_date) BETWEEN CURDATE() - INTERVAL 1 YEAR AND CURDATE()";
        }else if($this->input->post('duration') == 'between'){
          $where=" where date(purchased_date) BETWEEN  '".$_POST['from']."' AND '".$_POST['to']."'";
        }else{
            $where="";
        }

        $user_details = $this->db->query('SELECT * FROM `user_purchased_package` LEFT JOIN `user` ON `user_purchased_package`.`user_id` = `user`.`user_id` LEFT JOIN `products` ON `user_purchased_package`.`package_id` = `products`.`product_id` '.$where.'  ORDER BY `user_purchased_package_id` DESC')->result_array();
 
             
            
            // create file name
            $fileName = 'order-report-'.time().'.xlsx';   
            $objPHPExcel = new Spreadsheet();
            
            // set Header
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sr.no.');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'User Id');        
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'First Name');       
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Last Name');     
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Email');     
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Phone Number');     
            $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'User IP');     
            $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Block');     
            $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Address');      
            $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Package Name');     
            $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Order Price');     
            $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Order Date');     
                   
            // set Row
            $rowCount = 2;
            $i =1;
 
            foreach ($user_details as $key => $value) {
       
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i++);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value['user_id']);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value['user_first_name']);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $value['user_last_name']);
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $value['user_email_id']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $value['user_mobile_number']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $value['user_ip_address']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $value['user_block']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $value['user_address']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $value['product_title']);  
                $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $value['amount_paid']);  
                $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $this->date_convert($value['purchased_date']));  
                

                $rowCount++;

            }
             
        
     
            $objWriter = new Xlsx($objPHPExcel);
            $objWriter->save('assets/uploads/report/'.$fileName);
            // download file
            // header("Content-Type: application/vnd.ms-excel");
            // redirect(base_url().'uploads/report/'.$fileName);  

            echo json_encode(array('filename' =>$fileName ,'path' =>base_url().'assets/uploads/report/'.$fileName));

    } 




}
