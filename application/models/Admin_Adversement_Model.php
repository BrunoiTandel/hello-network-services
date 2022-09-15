<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Adversement_Model extends CI_Model {

	function get_all_blogs() {
		return $this->db->order_by('adversement_id','DESC')->get('blogs')->result_array();
	}

	function add_new_blog($blog_thumbnail_image) {
		$add_data = array(
			'blog_title' => $this->input->post('blog_title'),
			'blog_link' => $this->input->post('external_link'),
			'post_type' => $this->input->post('post_type'),
			'blog_content' => $this->input->post('blog_content'),
			'blog_thumbnail_image' => $blog_thumbnail_image
		);

		if ($this->db->insert('blogs',$add_data)) {
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'adversement_id' => $this->db->insert_id(),
				'blog_title' => $this->input->post('blog_title'),
				'blog_link' => $this->input->post('external_link'),
				'post_type' => $this->input->post('post_type'),
				'blog_content' => $this->input->post('blog_content'),
				'blog_thumbnail_image' => $blog_thumbnail_image,
				'blog_add_or_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('blog_log',$log_data);

			return array('status'=>'1','message'=>'Blog has been added successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while adding the blog. Please try again');
		}
	}

	function change_blog_status() {
		$userdata = array(
			'blog_status'=>$this->input->post('changed_status')
		);

		if ($this->db->where('adversement_id',$this->input->post('id'))->update('blogs',$userdata)) {
			
			$log_data = $this->db->where('adversement_id',$this->input->post('id'))->get('blogs')->row_array();
			
			$status_log = '3';
			if ($this->input->post('changed_status') == 0) {
				$status_log = '4';
			}

			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data_array = array(
				'adversement_id' => $this->input->post('id'),
				'blog_title' => $log_data['blog_title'],
				'blog_link' => $log_data['blog_link'],
				'post_type' => $log_data['post_type'],
				'blog_content' => $log_data['blog_content'],
				'blog_thumbnail_image' => $log_data['blog_thumbnail_image'],
				'blog_status' => $status_log,
				'blog_add_or_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('blog_log',$log_data_array);

			return array('status'=>'1','message'=>'Status updated successfully.');
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the status.');
		}
	}

	function get_blog_details() {
		return $this->db->where('adversement_id',$this->input->post('adversement_id'))->get('blogs')->row_array();
	}

	function update_blog($blog_thumbnail_image) {
		$update_data = array(
			'blog_title' => $this->input->post('blog_title'),
			'blog_link' => $this->input->post('external_link'),
			'post_type' => $this->input->post('post_type'),
			'blog_content' => $this->input->post('blog_content')
		);

		if($blog_thumbnail_image != 'no-file') {
			$update_data['blog_thumbnail_image'] = $blog_thumbnail_image;
		}

		if ($this->db->where('adversement_id',$this->input->post('adversement_id'))->update('blogs',$update_data)) {

			$get_image = $this->db->select('blog_thumbnail_image')->where('adversement_id',$this->input->post('adversement_id'))->get('blogs')->row_array();
			
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'adversement_id' => $this->input->post('adversement_id'),
				'blog_title' => $this->input->post('blog_title'),
				'blog_link' => $this->input->post('external_link'),
				'post_type' => $this->input->post('post_type'),
				'blog_content' => $this->input->post('blog_content'),
				'blog_thumbnail_image' => $blog_thumbnail_image,
				'blog_add_or_updated_by_admin_id' => $admin_info['admin_id']
			);
			$this->db->insert('blog_log',$log_data);

			return array('status'=>'1','message'=>'Blog has been updated successfully.','blog_thumbnail_image'=>$get_image['blog_thumbnail_image']);
		} else {
			return array('status'=>'0','message'=>'Something went wrong while updating the nlog. Please try again');
		}
	}

	function delete_blog() {
		$userdata = array(
			'adversement_id' => $this->input->post('adversement_id'),
		);

		$db_num_rows = $this->db->where($userdata)->get('blogs');

		if ($db_num_rows->num_rows() > 0) {
			$db_details = $db_num_rows->row_array();
			$admin_info = $this->session->userdata('logged-in-admin');
			$log_data = array(
				'adversement_id' => $this->input->post('adversement_id'),
				'blog_title'=>$db_details['blog_title'],
				'blog_link'=>$db_details['blog_link'],
				'post_type' => $db_details['post_type'],
				'blog_content'=>$db_details['blog_content'],
				'blog_thumbnail_image'=>$db_details['blog_thumbnail_image'],
				'blog_status'=>'5',
				'blog_add_or_updated_by_admin_id'=>$admin_info['admin_id']
			);
			$this->db->insert('blog_log',$log_data);

			if($this->db->where('adversement_id',$this->input->post('adversement_id'))->delete('blogs')) {
				return array('status'=>'1','message'=>'Blog been deleted successfully.');
			}
			return array('status'=>'0','message'=>'Something went wrong while deleting the blog.');
		}
		return array('status'=>'0','message'=>'Something went wrong while deleting the blog.');
	}
}