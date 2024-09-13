<?php $this->load->view('inc/header'); ?>
<div class="breadcrumb-section cart_bread">
    <div class="container">   
        <div class="row">
            <div class="col-12">
            	<div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?=base_url()?>">home</a></li>
                        <li class="active">cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="shopping_cart_area">
                <div class="container">  
                    <form action="#"> 
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc">
                                    <div class="cart_page table-responsive">
                                        <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($this->cart->contents() as $k => $item) : ?>
                                        <tr>
                                           <td class="product_remove"><a href="<?=base_url()?>cart/remove_prodcut/<?=$item['rowid']?>"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="product_thumb"><a href="javascript:void()"><img class="cart-image" src="<?=base_url()?>media/image/<?= $item['Image'] ?>" alt=""></a></td>
                                            <td class="product_name"><a href="javascript:void()"><?=$item['name']?></a></td>
                                            <td class="product-price">LKR <?= number_format($item['price'], 2) ?></td>
                                            <td class="product_quantity"><input onchange="update_qty('<?=$item['rowid']?>', this.value)" min="0" max="100" value="<?=$item['qty']?>" type="number"></td>
                                            <td class="product_total">LKR <?= number_format($item['subtotal'], 2) ?></td>


                                        </tr>
                                        <?php endforeach ?>
                                        

                                    </tbody>
                                </table>   
                                    </div>  
                                    <!-- <div class="cart_submit">
                                        <button type="submit">update cart</button>
                                    </div>   -->    
                                </div>
                             </div>
                         </div>
                         <!--coupon code area start-->
                        <div class="coupon_area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <!-- <div class="coupon_code">
                                        <h3>Coupon</h3>
                                        <div class="coupon_inner">   
                                            <p>Enter your coupon code if you have one.</p>                                
                                            <input placeholder="Coupon code" type="text">
                                            <button type="submit">Apply coupon</button>
                                        </div>    
                                    </div> -->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="coupon_code">
                                        <h3>Cart Totals</h3>
                                        <div class="coupon_inner">
                                           <div class="cart_subtotal">
                                               <p>Subtotal</p>
                                               <p class="cart_amount">LKR <?=number_format($this->cart->total(), 2)?></p>
                                           </div>
                                           <!-- <div class="cart_subtotal ">
                                               <p>Shipping</p>
                                               <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                                           </div> -->
                                           <a href="#"><!-- Calculate shipping --></a>

                                           <div class="cart_subtotal">
                                               <p>Total</p>
                                               <p class="cart_amount">LKR <?=number_format($this->cart->total(), 2)?></p>
                                           </div>
                                           <div class="checkout_btn">
                                               <a href="<?=base_url()?>checkout">Proceed to Checkout</a>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--coupon code area end-->
                    </form> 
                </div>     
            </div>
<?php $this->load->view('inc/footer'); ?>
<script type="text/javascript">
	function update_qty(row_id, qty){
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
            url: "<?php echo base_url() ?>cart/update_cart",

            data: {
                row_id: row_id,
                qty: qty
            },

            dataType: 'json',
            success: function(data) {
            	swal.close();
            	location.reload();
            }
        });
	}
</script>
