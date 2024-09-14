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
    $data['records'] = $this->model->get_suggestion_products();
    $this->view('suggestions', $data);
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
    $flask_api_url = 'http://localhost:5000/predict'; // Change this to your Flask server URL

    // Image URL you want to send for prediction
    $image_url = base_url().'media/customer_images/'.$this->session->uploaded_image;

    // Create a new cURL resource
    $ch = curl_init($flask_api_url);

    // Create an array of data to send in the POST request
    $data = array(
      'image_url' => $image_url
    );

    // Convert the array to JSON format
    $payload = json_encode($data);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    // Execute the request and get the response
    $response = curl_exec($ch);

    // Close the cURL resource
    curl_close($ch);

    // Output the response from the Flask API
    $response_data = json_decode($response, true);
    
    $this->session->set_userdata('age', $response_data['age']);
    $this->session->set_userdata('gender', $response_data['gender']);
    if($response_data['age']==""||$response_data['gender']==""){

      echo json_encode(3);
    }else{
      echo json_encode(2);
    }
  }

}

