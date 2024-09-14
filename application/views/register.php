<?php $this->load->view('inc/header'); ?>
<div class="breadcrumb-section cart_bread">
  <div class="container">   
      <div class="row">
          <div class="col-12">
              <div class="breadcrumb_content">
                  <ul>
                    <li><a href="<?=base_url()?>">home</a></li>
                    <li class="active">Register</li>
                  </ul>
                </div>
              </div>
          </div>
      </div>    
</div>
<div class="customer_login">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-3 col-md-3"></div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="account_form">
                                <h2>Register</h2>
                                <?=$this->session->flashdata('notification')?>
                                <form method="post" action="">
                                    
                                     <p>   
                                        <label>Fist Name <span>*</span></label>
                                        <input required="" name="form[FirstName]" type="text">
                                     </p>
                                     <p>   
                                        <label>Last Name <span>*</span></label>
                                        <input required="" name="form[LastName]" type="text">
                                     </p>
                                     <p>   
                                        <label>Email <span>*</span></label>
                                        <input required="" name="form[Email]" type="text">
                                     </p>
                                     <p>   
                                        <label>Passwords <span>*</span></label>
                                        <input required="" name="form[Password]" type="password">
                                     </p>   
                                    <div class="login_submit">
                                        <button type="submit">Create a Account</button>
                                        
                                        <a href="<?=base_url()?>login">Do you have a account?</a>
                                    </div>

                                </form>
                             </div>    
                        </div>
                        <div class="col-lg-3 col-md-3"></div>
                        
                    </div>
                </div>    
            </div>
<?php $this->load->view('inc/footer'); ?>