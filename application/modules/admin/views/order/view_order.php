<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/top_bar'); ?>



<div class="container-fluid">
    <div class="row">

        <?php $this->load->view('include/side_bar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom page-title-div px-3">
                <h5 class="title_page">Dashboard > Order > View order details</h5>
            </div>
            

            <div class="row mx-3">
                <div class="col-md-12">
                    <?=$this->session->flashdata('notification')?>
                    <div class="card card_backgroud">
                      <div class="card-header d-flex justify-content-between align-items-center"><label class="card-title">Order Details</label>
                    <!-- <a href="<?=base_url()?>admin/Create-User" class="btn btn-primary">Add User</a> -->
                      </div>
                      
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-lg-6 mt-5">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3 class="mb-0">Billing Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>
                                                 <?=$obj->FirstName?> <?=$obj->LastName?><br>
                                                    <?=$obj->StreetAddress?>,
                                                    <?=$obj->AddressLine2?><br><?=$obj->City?><br>
                                                    </address>
                                            <p><?=$obj->Phone?></p>
                                            <p>Payement Type : Cash on Deliver</p>
                                        </div>
                                    </div>

                                </div>
                                   <div class="col-lg-6 mt-5">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3 class="mb-0">Billing Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>
                                                 <?=$obj->FirstName?> <?=$obj->LastName?><br>
                                                    <?=$obj->StreetAddress?>,<br>
                                                    <?=$obj->City?><br> </address>
                                            <!-- <p><?=$obj->Phone?></p> -->
                                            
                                        </div>
                                    </div>
                                    
                                </div> 
                                
                                  </div>
                                  <div style="margin-top:20px" class="row">
                                <div class="col-lg-12">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3 class="mb-0">Ordered List</h3>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>


                                                    <th>Price</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cart = (array)json_decode($obj->Cart) ?>
                                                
                                                <?php foreach ($cart as $k => $val): ?>
                                                <tr>
                                                    <?php $new_price = $val->subtotal*$car_val ?>
                                                    <td><?=$val->qty?> x <?=$val->name?></td>
                                                    <td>LKR <?=number_format($val->price, 2)?></td>

                                                </tr>
                                                <?php endforeach ?>
                                                <tr>
                                                    <td>Cart Total</td>
                                                    <?php $new_price = $val->price*$car_val ?>
                                                    <td><?=$curr->Symbol?> <?=number_format($obj->CartTotal, 2)?></td>

                                                </tr>
                                                <tr>
                                                    <td>Shipping</td>
                                                    <td><?=$curr->Symbol?> <?=number_format($obj->Shiping, 2)?></td>

                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td><?=$curr->Symbol?> <?=number_format($obj->CartTotal, 2)?></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3 class="mb-0">Order Note</h3>
                                        </div>
                                        <div class="card-body">
                                           <p><?=$obj->OrderNotes?></p>
                                            
                                        </div>
                                    </div>
                                    
                                </div> 
                            </div>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">
                        
                      </div>
                      
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php $this->load->view('include/page_footer'); ?>
<?php $this->load->view('include/footer'); ?>



