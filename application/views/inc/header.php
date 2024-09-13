<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?=title?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/html/img/favicon.ico">
        
        <!-- all css here -->
        <link rel="stylesheet" href="<?=base_url()?>assets/html/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/html/css/bundle.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/html/css/plugins.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/html/css/style.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/html/css/responsive.css">
        <script src="<?=base_url()?>assets/html/js/vendor/modernizr-3.7.1.min.js"></script>
        
    </head>
    <body>
            <!-- Add your site or application content here -->
            
            <!--header area start-->
            <header class="header_area">
                <div class="container-fluid p-0">
                    
                    <div class="header_top">
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-6 col-md-6">
                                <div class="welcome_text">
                                    <p><strong>Free Delivery:</strong>  Take advantage of our time to save event</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="right_info text-right">
                                    <ul>
                                        <!-- <li class="currency"><a href="#">USD <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown_currency">
                                                <li><a href="#"> EURO</a></li>
                                                <li><a href="#"> RUB </a></li>
                                                <li><a href="#"> GBP </a></li>
                                            </ul>     
                                        </li> --> 
                                        <!-- <li class="language"><a href="#"> English  <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown_language">
                                                <li><a href="#">French</a></li>
                                                <li><a href="#">German </a></li>
                                                <li><a href="#">Italians</a></li>
                                            </ul> 
                                        </li>  -->
                                        <?php if ($this->session->customer): ?>
                                        <li class=""><a href="<?=base_url()?>my-account">My Acount</a>
                                        <?php else: ?>
                                        <li class=""><a href="<?=base_url()?>login">Login</a>
                                            
                                        </li>
                                        <li class=""><a href="<?=base_url()?>register">Register</a>
                                        <?php endif ?>
                                        

                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>      
                     
                    <div class="header_bottom sticky-header">
                        <div class="row align-items-center">
                            <div class="col-lg-2">
                                <div class="logo">
                                    <a href="<?=base_url()?>l"><img src="<?=base_url()?>assets/html/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block"> 
                                        <ul>
                                            <li class="active"><a href="<?=base_url()?>">Home </a>
                                                
                                            </li>
                                            <li class=""><a href="<?=base_url()?>try-your-best-outfit">Try your best outfit </a>
                                                
                                            </li>
                                            
                                            
                                            <li><a href="<?=base_url()?>shop">Shop</a></li>
                                        </ul>

                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>  
                                            <ul>
                                            <li class="active"><a href="<?=base_url()?>">Home </a>
                                                
                                            </li>
                                            <li class=""><a href="<?=base_url()?>try-your-best-outfit">Try your best outfit </a>
                                                
                                            </li>
                                            
                                            
                                            <li><a href="<?=base_url()?>shop">Shop</a></li>
                                            </ul>
                                        </nav>      
                                    </div>
                                </div>    
                            </div>
                            <div class="col-lg-4">
                                <div class="search_area">
                                    <form action="#">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                    <div class="shopping_cart">
                                        <a href="<?=base_url()?>cart"><i class="fa fa-shopping-bag"></i> <span id="cart_count"><?=count($this->cart->contents())?></span> item(s)    </a>
                                        
                                         
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!--header bottom end-->   
                </div>  
            </header>