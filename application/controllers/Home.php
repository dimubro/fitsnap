<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Front_Controller
{
  function __construct()
  {
    
    parent::__construct();
    $this->load->model('Home_model', 'model');
    $this->load->model('Product_model', 'product');
  }

  public function error()
  {
    $this->view('404');
  }

  public function index()
  {
    
    $this->view('index', $d);
  }
  public function suggestions(){
    $data['records'] = $this->model->get_suggestion_products();
    $this->view('suggestions', $data);
  }
  public function thank_you(){
    $this->view('thank_you');
  }

}

