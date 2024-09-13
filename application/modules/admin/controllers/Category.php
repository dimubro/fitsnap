<?php
include_once APPPATH . "modules/admin/core/MY_Controller.php";
class Category extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        // $this->load->model('Slider_model', 'model');
        $this->load->model('Category_model', 'model');
        $this->controller = get_class();
    }
    public function index(){
        $data['records'] = $this->model->get_all();
        $this->load->view('category/index', $data);
    }
    public function edit($category_id){
        $data['obj'] = $this->model->get_data($category_id);
        $this->load->view('category/create', $data);
    }
    public function create(){
        $this->load->view('category/create');
    }
    public function save(){
        if($post = $this->input->post('form')){
            $CategoryId = $this->input->post('CategoryId');
            if($CategoryId){
                $res = $this->model->update($CategoryId, $post);
                if($res){
                    $this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully updated !!!
                  </div>');
                }else{
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>wrong!</strong> Somthing went wrong !!!
                  </div>');
                }
                redirect(base_url().'admin/Edit-Category/'.$CategoryId);
            }else{
                $res = $this->model->insert($post);
                if($res){
                    $this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully saved !!!
                  </div>');
                }else{
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>wrong!</strong> Somthing went wrong !!!
                  </div>');
                }
                redirect(base_url().'admin/Create-Category');
            }
        }
    }
    public function delete($category_id){
        $data = array('IsDeleted' => 1 );
        $res = $this->model->update($category_id, $data);
        if($res){
            $this->session->set_flashdata('notification', '<div class="alert alert-success">
                    <strong>Success!</strong> Record succesfully deleted !!!
                  </div>');
        }else{
            $this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>wrong!</strong> Somthing went wrong !!!
                  </div>');
        }
        redirect(base_url().'admin/Category');
    }

}