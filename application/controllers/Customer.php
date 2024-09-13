<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends Front_Controller
{
  function __construct()
  {
    
    parent::__construct();
    $this->load->model('Customer_model', 'model');
    $this->load->model('Order_model', 'order');
    $this->load->library('form_validation');
  }
  public function register(){
      $this->form_validation->set_rules('form[FirstName]', 'First Name', 'required');
      $this->form_validation->set_rules('form[LastName]', 'Last Name', 'required');
      $this->form_validation->set_rules('form[Email]', 'Email', 'required|valid_email');
      
      $this->form_validation->set_rules('form[Password]', 'Password', 'required');
      if($this->form_validation->run()){
        $post = $this->input->post('form');
        $check = $this->model->check_user($post['Email']);
        if($check){
          $this->session->set_flashdata('notification', '<div class="alert alert-info">
                    <strong>Ops!</strong> you have a account, please login!!
                  </div>');
        }else{
        $post['Password'] = sha1($this->input->post('form[Password]'));
        
        $res = $this->model->insert($post);
        if($res){
          $this->session->set_flashdata('notification', '<div class="alert alert-success">
              <strong>Success!!</strong> Your account has been created please login!!</div>');
        }else{
          $this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>wrong!</strong> Somthing went wrong !!!
                  </div>');
        }
        }
        redirect(base_url().'register');
      }
      $this->view('register');
     

  }
  public function login(){
    $this->form_validation->set_rules('form[Email]', 'Email', 'required|valid_email'); 
    $this->form_validation->set_rules('form[Password]', 'Password', 'required');
    if($this->form_validation->run()){
      $user = $this->model->login($this->input->post('form[Email]'), sha1($this->input->post('form[Password]')));
      $this->session->set_userdata("customer", $user);
      if($user){
        if($this->session->is_from_checkout==1){
          $this->session->unset_userdata('is_from_checkout');
          redirect(base_url().'checkout');
        }else{
          redirect(base_url());
        }
        
      }else{
         $this->session->set_flashdata('notification', '<div class="alert alert-danger">
                    <strong>wrong!</strong> Check your email password !!!
                  </div>');
         redirect(base_url().'login');
      }
    }
    $this->view('login');
  }
  public function login_from_checkout(){
    $this->session->set_userdata('is_from_checkout', '1');
    redirect(base_url().'login');
  }
  public function my_account(){
    if($this->session->customer){
      $data['records'] = $this->order->get_costomer_orders($this->session->customer->CustomerId);
      $this->view('my_account', $data);
    }else{
      redirect(base_url());
    }
    
  }
  public function log_out(){
    $this->session->sess_destroy();
    redirect(base_url());
  }


}