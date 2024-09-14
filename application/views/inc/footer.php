            <!--footer area start-->
            <div class="footer_area">
                <div class="container">
                    <div class="footer_top">
                       <!--  <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="single_footer">
                                    <h3>About Us</h3>
                                    <p>The new hero pieces bring instant fashion credibility. Bright florals clash with camouflage prints</p>
                                    <div class="footer_social">
                                        <h3>Follow Us</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single_footer">
                                    <h3>Information</h3>
                                    <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Return Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single_footer">
                                    <h3>My Account</h3>
                                    <ul>
                                        <li><a href="my-account.html">My account</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="#">Validation</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single_footer column_3">
                                    <h3>Get in touch</h3>
                                    <ul>
                                        <li><i class="fa fa-home"></i> 123 Main Street, Anytown, CA 12345 USA.</li>
                                        <li><i class="fa fa-phone"></i> (800) 123 456 789</li>
                                        <li><i class="fa fa-fax"></i> 123 456 789</li>
                                        <li><i class="fa fa-envelope-open-o"></i> <a href="#">Contact@towerthemes.com</a></li>
                                    </ul>
                                    <div class="footer-payment">
                                        <a href="#"><img src="assets/img/visha/payment.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="copyright_area mt-50">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="copyright_conent">
                                    <p>&copy; FITSNAP <?=date("Y")?> Made With <i class="fa fa-heart"></i> by <a href="http://ulindu.lk/" target="_blank" rel="noopener">Dimuth Weerasingha</a></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="footer_menu text-right">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="<?=base_url()?>try-your-best-outfit">Try your best outfit</a></li>
                                        <?php if ($this->session->customer): ?>
                                        <li><a href="<?=base_url()?>My Acount">My Account</a></li>
                                        <?php else: ?>
                                        
                                        <li><a href="<?=base_url()?>login">Login</a></li>
                                        <li><a href="<?=base_url()?>register">Register</a></li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer area end-->
            
            
            <!-- modal area start --> 
           <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal_body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="modal_tab">  
                                            <div class="tab-content product-details-large">
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="assets/img/cart/cart4.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="assets/img/cart/cart3.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="assets/img/cart/cart5.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal_tab_button">    
                                                <ul class="nav product_navactive owl-carousel" role="tablist">
                                                    <li >
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/cart/cart4.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                         <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/cart/cart3.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                       <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/cart/cart5.jpg" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </div>  
                                    </div> 
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="modal_right">
                                            <div class="modal_title mb-10">
                                                <h2>Handbag feugiat</h2> 
                                            </div>
                                            <div class="modal_price mb-10">
                                                <span class="new_price">$64.99</span>    
                                                <span class="old_price" >$78.99</span>    
                                            </div>
                                            <div class="modal_content mb-10">
                                                <p>Short-sleeved blouse with feminine draped sleeve detail.</p>    
                                            </div>
                                            <div class="modal_size mb-15">
                                               <h2>size</h2>
                                                <ul>
                                                    <li><a href="#">s</a></li>
                                                    <li><a href="#">m</a></li>
                                                    <li><a href="#">l</a></li>
                                                    <li><a href="#">xl</a></li>
                                                    <li><a href="#">xxl</a></li>
                                                </ul>
                                            </div>
                                            <div class="modal_add_to_cart mb-15">
                                                <form action="#">
                                                    <input min="0" max="100" step="2" value="1" type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>   
                                            <div class="modal_description mb-15">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>    
                                            </div> 
                                            <div class="modal_social">
                                                <h2>Share this product</h2>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>    
                                            </div>      
                                        </div>    
                                    </div>    
                                </div>     
                            </div>
                        </div>    
                    </div>
                </div>
            </div> 
            
          <!-- modal area end --> 
           
           
            
           
            
            
        
        <!-- all js here -->
        <script src="<?=base_url()?>assets/html/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="<?=base_url()?>assets/html/js/vendor/jquery-migrate-3.3.0.min.js"></script>
        <script src="<?=base_url()?>assets/html/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/html/js/plugins.js"></script>
        <script src="<?=base_url()?>assets/html/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- include summernote css/js -->

    </body>
</html>