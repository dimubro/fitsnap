<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Front_Controller
{
  function __construct()
  {
    
    parent::__construct();
    $this->load->model('Home_model', 'model');
    $this->load->model('Product_model', 'product');
    $this->load->model('Customer_model', 'customer');
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
    $age = $this->session->age;
    $skin_tone = $this->session->skine_tone;
    
    $data['Age_range'] = $this->model->get_age_range($age);
    // $skin_tone = 1;
    if($this->session->gender=='Female'){
      $gender = 2;
    }else if($this->session->gender=='Male'){
      $gender = 1;
    }
    if($skin_tone){
      $data['Status'] = 2;
    }else{
      $data['Status'] = 1;
    }
    $colors = $this->model->get_skin_tone_colours($skin_tone, $gender);
    $colo = array();
    foreach ($colors as $k => $va) {
      $colo[] = $va->ColorId;
    }
    $data['colorss'] = $colors;
    $data['records'] = $this->model->get_suggestion_products($age, $skin_tone, $gender, $colo);
    $this->view('suggestions', $data);
    // print_r($data['Age_range']);
  }
  public function thank_you(){
    $this->view('thank_you');
  }
  public function uplaod_image(){
    $config['upload_path']          = './media/customer_images';
    $config['allowed_types']        = 'jpg|png';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('file_upload')) {
      $error = array('error' => $this->upload->display_errors());

      echo json_encode(1);
    } else {
      $data = $this->upload->data();
      if($this->session->customer->CustomerId){
        $data = array('Image' => $this->upload->data('file_name'),
                      'CustomerId' =>$this->session->customer->CustomerId );

        $this->customer->insert_customer_images($data);
      }
      $this->session->set_userdata('uploaded_image', $this->upload->data('file_name'));
      $this->load_model();
      
    }
  }
  public function load_model(){
    $flask_api_url = 'http://localhost:5000/predict';  
    $image_url = base_url().'media/customer_images/'.$this->session->uploaded_image;

    
    $ch = curl_init($flask_api_url);

    
    $data = array(
      'image_url' => $image_url
    );

    
    $payload = json_encode($data);

    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    
    $response = curl_exec($ch);

    
    curl_close($ch);

    
    $response_data = json_decode($response, true);
    
    $this->session->set_userdata('age', $response_data['age']);
    $this->session->set_userdata('gender', $response_data['gender']);
    $this->session->set_userdata('size', "M");
    $this->session->set_userdata('skine_tone', "3");
    if($response_data['age']==""||$response_data['gender']==""){

      echo json_encode(3);
    }else{
      echo json_encode(2);
    }
  }

}

