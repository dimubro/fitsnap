<?php
include_once APPPATH . "modules/admin/core/MY_Controller.php";
class Products extends MY_Controller
//class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'model');
		$this->load->model('Category_model', 'category');
		
	}
	public function index(){
		$data['records'] = $this->model->get_all();
		$this->load->view('product/index', $data);
	}
	public function create(){
		$data['Category'] = $this->category->get_all();
		$this->load->view('product/create', $data);
	}
	public function edit($product_id){
		$data['Category'] = $this->category->get_all();
		$data['obj'] = $this->model->all_data($product_id);
		
		$this->load->view('product/create', $data);
	}
	public function save_form(){
		if ($post = $this->input->post('form')) {
			$ProductId = $this->input->post('ProductId');
			if($post['IsDiscount']==1){
				$post['IsDiscount'] = 1;
			}else{
				$post['IsDiscount'] = 0;
			}
				$this->img_width = '300px';
                $this->img_height = '400px';
                $config['upload_path']          = './media/image';
                $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('Image')) {
                    $error = array('error' => $this->upload->display_errors());
                    // $this->session->set_flashdata('notification', '<div class="alert alert-custom alert-default" role="alert"><div class="alert-icon"><i class="flaticon-danger text-primary"></i></div><div class="alert-text">File Not Uploaded!</div></div>');
                } else {
                    $data = $this->upload->data();
                    $this->crop($data);
                    $post['Image'] = $data['file_name'];
                }
			if($ProductId){
				$res = $this->model->update($ProductId, $post);
				if($res){
					$this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully updated !!!
                  </div>');
				}else{
					$this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>Opps!</strong> something went wrong !!!
                  </div>');
				}
				redirect(base_url().'admin/Edit-Product/'.$ProductId);
			}else{
				$res = $this->model->insert($post);
				if($res){
					$this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully created !!!
                  </div>');
				}else{
					$this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>Opps!</strong> something went wrong !!!
                  </div>');
				}
				redirect(base_url().'admin/Create-Product');
			}
		}
	}
	public function delete($ProductId){
		$data = array('IsDeleted' => 1 );
		$res = $this->model->update($ProductId, $data);
		if($res){
			$this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully deleted !!!
                  </div>');
		}else{
			$this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>Opps!</strong> something went wrong !!!
                  </div>');
		}
		redirect(base_url().'admin/Products');
	}


}