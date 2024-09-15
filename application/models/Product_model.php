<?php
class Product_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function insert($post){
		$this->db->insert('product', $post);
		return $this->db->insert_id();
	}
	public function get_all(){
		// $this->db->where('IsDeleted', 0);
		// $this->db->order_by('ProductId', 'desc');
		// $data = $this->db->get('product');
		// return $data->result();
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category', 'category.CategoryId=product.CategoryId');
		$this->db->where('product.IsDeleted', 0);
		$data = $this->db->get();
		return $data->result();
	}
	public function all_data($product_id){
		$this->db->where('ProductId', $product_id);
		$data = $this->db->get('product');
		return $data->row();
	}
	public function update($ProductId, $post){
		$this->db->where('ProductId', $ProductId);
		return $this->db->update('product', $post);
	}
	public function insert_group($post){
		$this->db->insert('product_group', $post);
		return $this->db->insert_id();
	}
	public function insert_group_products($group){
		$this->db->insert('group_products', $group);
	}
	public function get_group_products(){
		$this->db->where('IsDeleted', 0);
		$this->db->order_by('GroupId', 'desc');
		$data = $this->db->get('product_group');
		return $data->result();
	}
	public function get_data($group_id){
		$this->db->where('GroupId', $group_id);
		$data = $this->db->get('product_group');
		return $data->row();
	}
	public function get_group_product($group_id){
		$this->db->where('GroupId', $group_id);
		$data = $this->db->get('group_products');
		return $data->result();
	}
	public function update_product_group($GroupId, $post){
		$this->db->where('GroupId', $GroupId);
		return $this->db->update('product_group', $post);
	}
	public function delete_group_product_items($GroupId){
		$this->db->where('GroupId', $GroupId);
		$this->db->delete('group_products');
	}
	public function get_ages(){
		$data = $this->db->get('ages');
		return $data->result();
	}
	
	public function get_all_colors($gender){
		$this->db->where('Gender', $gender);
		$data = $this->db->get('color');
		return $data->result();
	}
	public function insert_product_age($ages){
		$this->db->insert('product_ages', $ages);
	}
	public function get_product_age($product_id){
		$this->db->where('ProductId', $product_id);
		$data = $this->db->get('product_ages');
		return $data->result();
	}
	public function delete_product_ages($ProductId){
		$this->db->where('ProductId', $ProductId);
		$this->db->delete('product_ages');
	}
}