<?php
include_once APPPATH . "modules/admin/core/MY_Controller.php";
class Orders extends MY_Controller
//class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model', 'model');
		$this->load->model('Category_model', 'category');
		
	}
	public function index(){
		$data['records'] = $this->model->get_all();
		$this->load->view('order/index', $data);
	}
	public function view_order($order_id){
		$data['obj'] = $this->model->get_data($order_id);
		$this->load->view('order/view_order', $data);
	}

}