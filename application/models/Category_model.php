<?php
class Category_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function insert($post){
		return $this->db->insert('category', $post);
	}
	public function get_all(){
		$this->db->where('IsDeleted', 0);
		$this->db->order_by('CategoryId', 'desc');
		$data = $this->db->get('category');
		return $data->result();
	}
	public function get_data($category_id){
		$this->db->where('CategoryId', $category_id);
		$data = $this->db->get('category');
		return $data->row();
	}
	public function update($CategoryId, $post){
		$this->db->where('CategoryId', $CategoryId);
		return $this->db->update('category', $post);
	}
	


}