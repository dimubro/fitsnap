<?php
class Customer_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function insert($post){
		return $this->db->insert('customer', $post);

	}
	public function check_user($email){
		$this->db->where('Email', $email);
		$data = $this->db->get('customer');
		return $data->row();
	}
	public function login($email, $password){
		$this->db->where('Email like binary', $email);
		$this->db->where('Password', $password);
		// $this->db->where('IsDeleted', 0);
		$data = $this->db->get('customer');
		return $data->row();
	}
	public function insert_customer_images($data){
		$this->db->insert('customer_image', $data);
	}
	
}