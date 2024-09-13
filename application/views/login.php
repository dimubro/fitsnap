<?php $this->load->view('inc/header'); ?>
<div class="breadcrumb-section cart_bread">
  <div class="container">   
      <div class="row">
          <div class="col-12">
              <div class="breadcrumb_content">
                  <ul>
                    <li><a href="<?=base_url()?>">home</a></li>
                    <li class="active">login</li>
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
                                
                                <h2>login</h2>
                                <?=$this->session->flashdata('notification')?>
                                <form method="post" action="">
                                    <p>   
                                        <label>Email <span>*</span></label>
                                        <input required="" name="form[Email]" type="text">
                                     </p>
                                     <p>   
                                        <label>Passwords <span>*</span></label>
                                        <input required="" name="form[Password]" type="password">
                                     </p>   
                                    <div class="login_submit">
                                        <button type="submit">login</button>
                                        <label for="remember">
                                            <input id="remember" type="checkbox">
                                            Remember me
                                        </label>
                                        <a href="#">Lost your password?</a>
                                    </div>

                                </form>
                             </div>    
                        </div>
                        <div class="col-lg-3 col-md-3"></div>
                        
                    </div>
                </div>    
            </div>
<?php $this->load->view('inc/footer'); ?>