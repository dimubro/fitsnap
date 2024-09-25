<?php
class Home_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	// public function get_suggestion_products(){
	// 	$this->db->select('*');
	// 	$this->db->from('product');
	// 	// $this->db->join('group_products', 'product.ProductId=group_products.ProductId');
	// 	$this->db->where('product.IsDeleted', 0);
	// 	$data = $this->db->get();
	// 	return $data->result();
	// }
	public function get_suggestion_products($age, $skin_tone, $gender, $colors){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('product_ages', 'product_ages.ProductId=product.ProductId');
		// $this->db->where('', $age);
		$this->db->join('ages', 'ages.AgeId=product_ages.AgeId');
		$this->db->where('ages.AgeStart<', $age);
		$this->db->where('ages.EgeEnd>=', $age);
		$this->db->where('product.Gender', $gender);
		if($colors){
			$this->db->where_in('product.ColorId', $colors);
		}
		$data = $this->db->get();
		return $data->result();
	}
	public function get_skin_tone_colours($skintone_id, $gender){
		$this->db->select('*');
		$this->db->where('SkinToneId', $skintone_id);
		$this->db->where('Gender', $gender);
		$data = $this->db->get('color');
		return $data->result();
	}
	public function get_age_range($age){
		$this->db->where('AgeStart<', $age);
		$this->db->where('EgeEnd>=', $age);
		$data = $this->db->get('ages');
		return $data->row();

	}
	public function get_skintone($skin_tone){
		$this->db->where('SkinToneId', $skin_tone);
		$data = $this->db->get('skin_tone');
		return $data->row();
	}
}