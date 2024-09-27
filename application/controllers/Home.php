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
    if($this->session->gender){

    
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
    $data['Skin_tone_data'] = $this->model->get_skintone($skin_tone);
    $colors = $this->model->get_skin_tone_colours($skin_tone, $gender);
    $colo = array();
    foreach ($colors as $k => $va) {
      $colo[] = $va->ColorId;
    }
    $data['colorss'] = $colors;
    $data['records'] = $this->model->get_suggestion_products($age, $skin_tone, $gender, $colo);
  }
    $this->view('suggestions', $data);
    // print_r($data['Skin_tone_data']);
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
      'image_url' => $image_url,
      'type'=>1,
      'weight' => 70,
      'age' => 25,
      'height' => 170
    );

    
    $payload = json_encode($data);

    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    
    $response = curl_exec($ch);

    
    curl_close($ch);

    
    $response_data = json_decode($response, true);

    // print_r($response_data);

    $this->session->unset_userdata('age');
    $this->session->unset_userdata('gender');
    $this->session->unset_userdata('size');
    $this->session->unset_userdata('skine_tone');
    
    $this->session->set_userdata('age', $response_data['age']);
    $this->session->set_userdata('gender', $response_data['gender']);
    // $this->session->set_userdata('size', "M");

    
    if($response_data['skin_tone']['predicted_class']==0){
      $this->session->set_userdata('skine_tone', "5");
    }else if($response_data['skin_tone']['predicted_class']==1){
      $this->session->set_userdata('skine_tone', "2");
    }else if($response_data['skin_tone']['predicted_class']==2){
      $this->session->set_userdata('skine_tone', "4");
    }else if($response_data['skin_tone']['predicted_class']==3){
      $this->session->set_userdata('skine_tone', "3");
    }

    if($response_data['age']==""||$response_data['gender']==""){
      // $this->skintone_prediction($image_url);
      echo json_encode(3);
    }else{
      // $this->skintone_prediction($image_url);
      echo json_encode(2);
    }
  }
  public function skintone_prediction($image_url){
    $flask_api_url = 'http://localhost:5000/skin_tone';  
    

    
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
    // print_r($response_data);
    // echo $response_data["predicted_class"];
    if($response_data["predicted_class"]==0){
      $this->session->set_userdata('skine_tone', "5");
    }else if($response_data["predicted_class"]==1){
      $this->session->set_userdata('skine_tone', "2");
    }else if($response_data["predicted_class"]==2){
      $this->session->set_userdata('skine_tone', "4");
    }else if($response_data["predicted_class"]==3){
      $this->session->set_userdata('skine_tone', "3");
    }
    // echo $this->session->skine_tone;
    // $this->session->set_userdata('skine_tone', "3");
  }
  public function size_prediction(){

    // The data to send to the API (make sure to adjust the values according to your needs)
      $data = array(
          "weight" => 70,
          "age" => 25,
          "height" => 170
      );

      // Convert the data to JSON
      $json_data = json_encode($data);

      // Initialize cURL
      $ch = curl_init('http://127.0.0.1:5000/predict_size');

      // Set the cURL options
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return the response instead of outputting it
      curl_setopt($ch, CURLOPT_POST, true);  // Indicate that this is a POST request
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  // Set content type to JSON
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);  // Attach the JSON payload

      // Execute the request and get the response
      $response = curl_exec($ch);
      // echo $response;
      // Check for any errors
      if ($response === false) {
          echo 'cURL error: ' . curl_error($ch);
      } else {
          // Decode the response from JSON
          $decoded_response = json_decode($response, true);
          
          // Print the response
          echo 'Prediction: ' . $decoded_response['prediction'];
      }

      // Close the cURL session
      curl_close($ch);
  }
  public function load_size(){
    if($this->session->age){


    $flask_api_url = 'http://localhost:5000/predict';  
    $heght = $this->input->post('height');
    $weight = $this->input->post('weight');
    
    $ch = curl_init($flask_api_url);

    
    $data = array(
      'type'=>2,
      'weight' => $weight,
      'age' => $this->session->age,
      'height' => $heght
    );

    
    $payload = json_encode($data);

    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    
    $response = curl_exec($ch);

    
    curl_close($ch);

    
    $response_data = json_decode($response, true);

    // print_r($response_data);

    
    $this->session->unset_userdata('size');
   
    
    
    // $this->session->set_userdata('size', "M");

    
    

    if($response_data['prediction']==""){
      // $this->skintone_prediction($image_url);
      echo json_encode(3);
    }else{
      // $this->skintone_prediction($image_url);
      if($response_data['prediction']==1){
        $this->session->set_userdata('size', "XL");
      }elseif($response_data['prediction']==2){
        $this->session->set_userdata('size', "L");
      }elseif($response_data['prediction']==3){
        $this->session->set_userdata('size', "M");
      }elseif($response_data['prediction']==4){
        $this->session->set_userdata('size', "S");
      }elseif($response_data['prediction']==5){
        $this->session->set_userdata('size', "XXS");
      }elseif($response_data['prediction']==6){
        $this->session->set_userdata('size', "XXXL");
      }elseif($response_data['prediction']==7){
        $this->session->set_userdata('size', "XXL");
      }
      echo json_encode(2);
    }
  }else{
    echo json_encode(4);
  }
  }
}

