<?php
class Home_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function get_suggestion_products(){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('group_products', 'product.ProductId=group_products.ProductId');
		$this->db->where('product.IsDeleted', 0);
		$data = $this->db->get();
		return $data->result();
	}
}