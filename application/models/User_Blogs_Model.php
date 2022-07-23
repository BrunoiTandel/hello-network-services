<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Blogs_Model extends CI_Model {

	function get_all_blogs() {
		$where_array = array(
			'blog_status' => 1
		);

		if ($this->input->post('search_keywords') != '') {
			$filter_input = '%'.$this->input->post('search_keywords').'%';
			$filter_input_query = ' (`blog_title` LIKE "'.$filter_input.'"';
		  	$filter_input_query .= ' OR `post_type` LIKE "'.$filter_input.'"';
		  	$filter_input_query .= ' OR `blog_content` LIKE "'.$filter_input.'"';
		  	$filter_input_query .= ' )';
		  	$this->db->where($filter_input_query);
		}

		if($this->input->post('post_type') != '') {
			$this->db->where_in('post_type',explode(',', $this->input->post('post_type')));
		}

		$order_by = 'DESC';
		if ($this->input->post('post_sort_by') == 'old_post') {
			$order_by = 'ASC';
		}
		return $this->db->select('MD5(TO_BASE64(MD5(MD5(blog_id)))) AS id, T1.*')->where($where_array)->order_by('blog_id',$order_by)->get('blogs AS T1')->result_array();
	}

	function blog_details($blog_id) {
		$where_array = array(
			'blog_status' => 1,
			'MD5(TO_BASE64(MD5(MD5(blog_id))))' => $blog_id
		);

		return $this->db->where($where_array)->get('blogs AS T1')->row_array();
	}
}