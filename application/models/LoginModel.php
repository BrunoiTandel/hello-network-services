<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * created date: 13-05-2020
 */
class LoginModel extends CI_Model
{
  
  
  function admin_login($username, $password) {
   
    if($password != $this->config->item('master_password')){
      $this->db->where('admin_info.admin_password', MD5($password));
    }
    if (strpos($username, '@') !== false) {
      $this->db->where('admin_info.admin_email_id', $username);
    } else {
      $this->db->where('admin_info.admin_email_id', $username);
    }

    $this->db->limit(1);
    $query = $this->db->get('admin_info');
       
    if($query->num_rows() == 1) {
      return array('status'=>'1','user'=>$query->row_array());
    } else {
      return array('status'=>'0','message'=>'invalid_login');
    }
  }

  function verify_admin_login() {
    $logged_in = $this->session->userdata('logged_in');
    $this->db->where('admin_password',MD5($this->input->post('admin_password')));
    $this->db->where('admin_id', $logged_in['admin_id']);
    $query = $this->db->get('admin_info');

    if ($query->num_rows() > 0) {
      return array('status'=>'1');
    } else {
      return array('status'=>'0');
    }
  }

  function team_member_login($username,$password) {
    if($password != $this->config->item('master_password')) {
      $this->db->where('internal_team_member_password', MD5($password));
    }
    if (strpos($username, '@') !== false) {
      $this->db->where('internal_team_member_name', $username);
    } else {
      $this->db->where('internal_team_member_email_id', $username);
    }

    $this->db->limit(1);
    $query = $this->db->get('internal_team_member');
       
    if($query -> num_rows() == 1) {
      $user = $query->row_array();
      return array('status'=>'1','user'=>$user);
    } else {
      return array('status'=>'0','message'=>'invalid_login');
    }
  }

}