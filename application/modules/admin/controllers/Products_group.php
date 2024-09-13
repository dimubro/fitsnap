<?php
include_once APPPATH . "modules/admin/core/MY_Controller.php";
class Products_group extends MY_Controller
//class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'model');
		$this->load->model('Category_model', 'category');
		
	}
	public function index(){
		$data['records'] = $this->model->get_group_products();
		$this->load->view('product_group/index', $data);
	}
	public function create(){
		$data['products'] = $this->model->get_all();
		$this->load->view('product_group/create', $data);
	}
	public function edit($group_id){
		$data['products'] = $this->model->get_all();
		$data['obj'] = $this->model->get_data($group_id);
		$data['group_product'] = $this->model->get_group_product($group_id);
		$this->load->view('product_group/create', $data);
		// print_r($data['group_product']);
	}
	public function save(){
		if($post = $this->input->post('form')){
			$GroupId = $this->input->post('GroupId');
			$prodcut_group = $this->input->post('products');
			if($GroupId){
				$res = $this->model->update_product_group($GroupId, $post);
				$this->model->delete_group_product_items($GroupId);
				foreach ($prodcut_group as $k => $val) {
					$group = array('GroupId' => $GroupId, 
									'ProductId' => $val);
					$this->model->insert_group_products($group);
				}
				if($res){
					$this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully updated !!!
                  </div>');
				}else{
					$this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>Opps!</strong> something went wrong !!!
                  </div>');
				}
				redirect(base_url().'admin/Edit-Group/'.$GroupId);
			}else{
				
				$GroupId = $this->model->insert_group($post);
				// echo $GroupId;
				foreach ($prodcut_group as $k => $val) {
					$group = array('GroupId' => $GroupId, 
									'ProductId' => $val);
					$this->model->insert_group_products($group);
				}
				if($GroupId){
					$this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully created !!!
                  </div>');
				}else{
					$this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>Opps!</strong> something went wrong !!!
                  </div>');
				}
				redirect(base_url().'admin/Create-Group');
			}
		}
	}
	public function delete($group_id){
		$data = array('IsDeleted' => 1 );
		$res = $this->model->update_product_group($group_id, $data);
		if($res){
			$this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully deleted !!!
                  </div>');
		}else{
			$this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>Opps!</strong> something went wrong !!!
                  </div>');
		}
		redirect(base_url().'admin/Products-Group');
	}
}