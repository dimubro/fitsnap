<?php
class Order_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function insert($post){
		$this->db->insert('orders', $post);
	}
	public function get_all(){
		$this->db->order_by('OrderId', 'desc');
		$data = $this->db->get('orders');
		return $data->result();
	}
	public function get_data($order_id){
		$this->db->where('OrderId', $order_id);
		$data = $this->db->get('orders');
		return $data->row();
	}
	public function get_costomer_orders($customer_id){
		$this->db->where('CustomerId', $customer_id);
		$data = $this->db->get('orders');
		return $data->result();
	}
}