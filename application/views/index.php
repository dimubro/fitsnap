<?php $this->load->view('inc/header'); ?>
<div class="slider_area">
                <div class="slider_active owl-carousel">
                    <div class="single_slider slider_one">
                        <div class="container-fluid p-0">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="slider_content">
                                        <h4>new arrivals</h4>
                                        <h1>coat hoody</h1>
                                        <a href="#">discover now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_slider slider_two">
                        <div class="container-fluid">
                            <div class="row align-items-center p-0">
                                <div class="col-12">
                                    <div class="slider_content">
                                        <h4>top trending</h4>
                                        <h1>pink color</h1>
                                        <a href="#">discover now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="banner_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single_banner">
                                <a href="javascript:void()"><img src="<?=base_url()?>assets/html/img/banner/banner1.jpg" alt=""></a>
                                <div class="banner_content">
                                    <h3>Clothing.No18</h3>
                                    <p>Sale Off 20% All Store</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 column_2">
                            <div class="single_banner">
                                <a href="javascript:void()"><img src="<?=base_url()?>assets/html/img/banner/banner2.jpg" alt=""></a>
                                <div class="banner_content">
                                    <h3>Men’s Summer Sneaker</h3>
                                    <p>Big Sale Off This Week</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_banner">
                                <a href="javascript:void()"><img src="<?=base_url()?>assets/html/img/banner/banner3.jpg" alt=""></a>
                                <div class="banner_content">
                                    <h3>Bag.No1</h3>
                                    <p>Big Sale No Limited</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="countdown_product">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="product_thumb countdown">
                                <a href="javascript:void"><img src="<?=base_url()?>assets/html/img/banner/image_upload_banner.jpg" alt=""></a>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="countdown_product_content">
                                <div class="product_name">
                                    <h2><a href="javascript:void()">Try your best outfit</a></h2>
                                </div>
                                
                                
                                <div class="product_desc">
                                    <p>Upload your photo to get tailored outfit recommendations based on your unique features, like body shape and skin tone. Discover clothing that fits and complements your style, all from our store!</p>
                                </div>
                                
                                <div class="product_button">
                                    <!-- <a  href="<?=base_url()?>try-your-best-outfit" data-bs-toggle="tooltip" data-placement="top" >Try your best outfit</a> -->
                                    <!-- <a for="file_upload" href="javascript:void()" data-toggle="modal" data-target="#myModal" >Try your best outfit</a> -->
                                    <label for="file_upload">Try your best outfit</label>
                                    <form id="image_upload">
                                    <input style="display: none;" onchange="upload_image()" type="file" id="file_upload" name="file_upload">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php $this->load->view('inc/footer'); ?>