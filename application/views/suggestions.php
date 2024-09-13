<?php $this->load->view('inc/header'); ?>
<div class="breadcrumb-section">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="<?=base_url()?>">home</a></li>
                                    <li class="active">Suggestion </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="shop_area">
                <div class="container">
                    <div class="row shop_reverse">
                        <div class="col-lg-4 col-md-12">
                            <div class="sidebar_widget">
                                
                                <div class="widget_list widget_banner">
                                    <img src="<?=base_url()?>assets/html/img/banner/banner26.jpg" alt="">
            
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="shop_wrapper">
                                <!-- <div class="banner_slider">
                                    <img src="<?=base_url()?>assets/html/img/banner/banner25.jpg" alt="">
                                </div> -->
                                
                                <div class="tab-content tab_four tab_six shop_list">
                                    
                                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                                        <?php foreach ($records as $k => $val): ?>
                                            
                                        
                                        <div class="product_list_item"> 
                                            <div class="row align-items-center">
                                               <div class="col-lg-4 col-md-4">
                                                    <div class="product_thumb">
                                                        <a href="javascript:void()">
                                                           <img class="primary_img" src="<?=base_url()?>media/image/<?=$val->Image?>" alt="Product Image">
                                                           
                                                        </a> 
                                                        
                                                    </div>
                                               </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="product_content">
                                                        <div class="product_name">
                                                            <h2><a href="javascript:void()"><?=$val->ProductTitle?></a></h2>
                                                        </div> 
                                                        <div class="product_price">
                                                            <?php
                                    $price = 00;
                                    $new_old_price = '';
                                    $old_price = '';
                                    $expiredate = strtotime($val->EndDate);
                                    $expiredate = strtotime("+1 day", $expiredate);
                                    $date_now = time();
                                    if ($val->IsDiscount == 1 && $date_now < $expiredate) {
                                           
                                            $dicount = $val->Price * $val->Percentage / 100;
                                            $price = $val->Price - $dicount;
                                            $old_price = $val->Price;
                                        
                                    } else {
                                        $price = $val->Price;
                                    }
                                    ?>
                                                            <span class="current_price">LKR <?=number_format($price, 2)?></span>
                                                            <?php if ($old_price): ?>
                                                                <span class="old_price">LKR <?=number_format($val->Price,2)?></span>
                                                            <?php endif ?>
                                                            

                                                        </div>
                                                        <div class="product_desc">
                                                            <?=$val->Description?>
                                                        </div>
                                                        <div class="product_ratting">
                                                            
                                                        </div>
                
                                                        <div class="product_action">
                                                           <ul>
                                                               <li><a  href="javascript:void()" onclick="add_cart(<?=$val->ProductId?>)">+ add to cart</a></li>
                                                               
                                                           </ul>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div>
                                        <?php endforeach ?> 
                                    </div>
                                </div>
                                <!--pagination style start--> 
                                <!-- <div class="pagination_style">
                                    <div class="pagination">
                                        <ul>
                                            <li class="current">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">next</a></li>
                                        </ul>
                                    </div>
                                    <div class="page_amount">
                                        <p>Showing 1–9 of 21 results</p>
                                    </div>         
                                </div> -->
                                <!--pagination style end--> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->load->view('inc/footer'); ?>

<script type="text/javascript">
    function add_cart(product_id) {
        var qty = 1;
        Swal.fire({
            imageUrl: '<?= base_url() ?>assets/html/loading/lg.gif',
            imageHeight: 200,
            imageAlt: 'A tall image',
            showCancelButton: false,
            showConfirmButton: false,
            title: '',
        })
        $.ajax({
            type: 'ajax',
            method: 'POST',
            url: "<?php echo base_url() ?>cart/add_cart",

            data: {
                product_id: product_id, qty:qty
            },

            dataType: 'json',
            success: function(data) {
                swal.close()
                $('#cart_count').html(data.count);
                Swal.fire({
                  
                  icon: 'success',
                  title: 'Product added to cart successfully!!',
                  showConfirmButton: false,
                  timer: 1500
                })
            }
        });
    }
</script>