<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends Front_Controller
{
  function __construct()
  {
    
    parent::__construct();
    $this->load->model('Home_model', 'model');
    $this->load->model('Product_model', 'product');
    $this->load->model('Order_model', 'order');
  }
  public function cart(){
    $this->view('cart', $data);
  }
  public function add_cart(){
    $procuct_id = $this->input->post('product_id');
    $qty = $this->input->post('qty');
    $product = $this->product->all_data($procuct_id);
      $expiredate = strtotime($product->EndDate);
      $expiredate = strtotime("+1 day", $expiredate);
      $date_now = time();
      if($product->IsDiscount==1&&$date_now<$expiredate){
      
      $dicount = $product->Price*$product->Percentage/100;
      $price = $product->Price - $dicount;
      $old_price = $product->Price;
      
      }else{
      $price = $product->Price;
      }
      $data = array(
        'id'      => $product->ProductId,
        'qty'     => $qty,
        'price'   => $price,
        'name'    => "$product->ProductTitle",
        'Image'   => $product->Image,
        // 'Weight'  =>  $product->Weight
        // 'options' => array('Size' => 'L', 'Color' => 'Red')
    );
      $datass['Status'] = 1;
      $this->cart->insert($data);
      $datass['count'] = count($this->cart->contents());
      
      echo json_encode($datass);
  }
  
  public function remove_prodcut($row_id){
    $this->cart->remove($row_id);
    redirect(base_url().'cart');
  }
  public function update_cart(){
    $row_id = $this->input->post('row_id');
    $qty = $this->input->post('qty');
    $data = array(
        'rowid' => $row_id,
        'qty'   => $qty
    );

    $this->cart->update($data);
    echo json_encode(1);
  }
  public function checkout(){
    $this->view('checkout');
  }
  public function save_checkout(){
    if($post = $this->input->post('form')){
      // print_r($post);
      $post['Cart'] = json_encode($this->cart->contents());
      $post['CartTotal'] = $this->cart->total();
      $post["OrderDate"] = date('Y-m-d H:i:s');
      if($this->session->customer->CustomerId){
        $post['CustomerId'] = $this->session->customer->CustomerId;
      }
      $this->order->insert($post);
      $this->cart->destroy();
      redirect(base_url().'thank-you');
    }
  }

}