<?php $this->load->view('inc/header'); ?>
<div class="breadcrumb-section cart_bread">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?=base_url()?>">home</a></li>
                        <li class="active">checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="Checkout_section">
               <div class="container">
                    <div class="row">
                       <div class="col-12">
                            <div class="user-actions mb-20">
                                
                                <?php if ($this->session->customer): ?>
                                    
                                <?php else: ?>
                                    <h3> 
                                    <i class="fa fa-file-o" aria-hidden="true"></i>
                                    Do you have have a account?
                                    <a class="Returning" href="<?=base_url()?>login/checkout" >Click here to login</a>     

                                </h3>
                                <?php endif ?>
                                 <!-- <div id="checkout_login" class="collapse" data-parent="#accordion">
                                    <div class="checkout_info">
                                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>  
                                        <form action="#">  
                                            <div class="form_group mb-20">
                                                <label>Username or email <span>*</span></label>
                                                <input type="text">     
                                            </div>
                                            <div class="form_group mb-25">
                                                <label>Password  <span>*</span></label>
                                                <input type="text">     
                                            </div> 
                                            <div class="form_group group_3 ">
                                                <button type="submit">Login</button>
                                                <label for="remember_box">
                                                    <input id="remember_box" type="checkbox">
                                                    <span> Remember me </span>
                                                </label>     
                                            </div>
                                            <a href="#">Lost your password?</a>
                                        </form>          
                                    </div>
                                </div> -->    
                            </div>
                            <!-- <div class="user-actions mb-20">
                                <h3> 
                                    <i class="fa fa-file-o" aria-hidden="true"></i>
                                    Returning customer?
                                    <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>     

                                </h3>
                                 <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                                    <div class="checkout_info">
                                        <form action="#">
                                            <input placeholder="Coupon code" type="text">
                                            <button type="submit">Apply coupon</button>
                                        </form>
                                    </div>
                                </div>    
                            </div> -->    
                       </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <form method="post" action="<?=base_url()?>cart/save_checkout">
                                    <h3>Billing Details</h3>
                                    <div class="row">

                                        <div class="col-lg-6 mb-20">
                                            <label>First Name <span>*</span></label>
                                            <input required="" value="<?=$this->session->customer->FirstName?>" name="form[FirstName]" type="text">    
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <label>Last Name  <span>*</span></label>
                                            <input required="" value="<?=$this->session->customer->LastName?>" name="form[LastName]" type="text"> 
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Street address  <span>*</span></label>
                                            <input required="" name="form[StreetAddress]" placeholder="House number and street name" type="text">     
                                        </div>
                                       
                                        <div class="col-12 mb-20">
                                            <label>City <span>*</span></label>
                                            <input required="" name="form[City]" type="text">    
                                        </div> 
                                        
                                        <div class="col-lg-6 mb-20">
                                            <label>Phone<span>*</span></label>
                                            <input required="" name="form[Phone]" type="text"> 

                                        </div> 
                                         <div class="col-lg-6 mb-20">
                                            <label> Email Address   <span>*</span></label>
                                              <input required="" value="<?=$this->session->customer->Email?>" name="form[Email]" type="text"> 

                                        </div> 
                                       <!--  <div class="col-12 mb-20">
                                            <input id="account" type="checkbox" data-bs-target="createp_account" />
                                            <label for="account" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne">Create an account?</label>

                                            <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                                <div class="card-body1">
                                                   <label> Account password   <span>*</span></label>
                                                    <input placeholder="password" type="password">  
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        <div class="col-12">
                                            <div class="order-notes">
                                                 <label for="order_note">Order Notes</label>
                                                <textarea required="" name="form[OrderNotes]" id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>    
                                        </div>     	    	    	    	    	    	    
                                    </div>
                                   
                            </div>
                            <div class="col-lg-6 col-md-6">
                                   
                                    <h3>Your order</h3> 
                                    <div class="order_table table-responsive mb-30">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php foreach ($this->cart->contents() as $k => $item) : ?>
                                                <tr>
                                                    <td> <?=$item['name']?> <strong> × <?=$item['qty']?></strong></td>
                                                    <td> LKR <?=number_format($item['subtotal'],2)?></td>
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Cart Subtotal</th>
                                                    <td>LKR <?=number_format($this->cart->total(),2)?></td>
                                                </tr>
                                                <!-- <tr>
                                                    <th>Shipping</th>
                                                    <td><strong>$5.00</strong></td>
                                                </tr> -->
                                                <tr class="order_total">
                                                    <th>Order Total</th>
                                                    <td><strong>LKR <?=number_format($this->cart->total(),2)?></strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>     
                                    </div>
                                    <div class="payment_method">
                                        
                                       <div class="panel-default">
                                            <input id="payment_defult" name="check_method" type="radio" data-bs-target="createp_account" />
                                            <label for="payment_defult" >Cash on Deliver</label>

                                            
                                        </div>
                                        <div class="order_button">
                                            <button type="submit">Proceed To Checkout</button> 
                                        </div>    
                                    </div> 
                                </form>         
                            </div>
                        </div> 
                    </div> 
                </div>       
            </div>
<?php $this->load->view('inc/footer'); ?>