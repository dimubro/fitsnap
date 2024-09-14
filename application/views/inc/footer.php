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
            
            
           
           
           <!-- The Modal -->
<div class="modal" id="myModal_show">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            
           
            
            
        
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

<script type="text/javascript">
    function upload_image(){
        Swal.fire({
          title: "Are you sure?",
          text: "Do you want to upload this image",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, upload it??"
        }).then((result) => {
          if (result.isConfirmed) {
            
          }
})
    }
</script>