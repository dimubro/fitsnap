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
                            <h5 class="mb-20">Uploaded Image</h5>
                            <div class="sidebar_widget">
                                
                                <div class="widget_list widget_banner">
                                    <img src="<?=base_url()?>media/customer_images/<?=$this->session->uploaded_image?>" alt="">
            
                                </div>
                            </div>
                        <h6 class="mt-15">Summary of image</h6>
                        <!-- <label>Gender: <?=$this->session->gender?></label><br> -->
                        <label>Your age range is <?=$Age_range->AgeStart?> to <?=$Age_range->EgeEnd?> years.</label><br>
                        <?php if ($this->session->size): ?>
                          <label><b><?=$this->session->size?></b> size is suitable for your body shape.</label>  
                        <?php endif ?>
                        
                        <label>Your skin tone is <b><?=$Skin_tone_data->SkinTone?></b>. this is Suitable colors for your skin tone include <?php foreach ($colorss as $k => $valla): ?>
                            <?=$valla->Color?>, 
                        <?php endforeach ?> colors</label>
                        <div class="product_button">
                            <label style="width: 100%;" for="file_upload"><center>Try your best outfit</center></label>
                                    <form id="image_upload">
                                    <input style="display: none;" onchange="upload_image()" type="file" id="file_upload" name="file_upload">
                                    </form>
                        </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-lg-7 col-md-12">
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
                                                            <?=word_limiter($val->Description, 25)?>
                                                        </div>
                                                        <div  class="product_ratting">
                                                             <div class="mt-20 mb-20" class="form-group">
                                                              
                                                              <select id="size<?=$k?>" class="form-control">
                                                                <option value="">Select Size</option>
                                                                <option <?=($this->session->size=="XXS")?"selected":""?> value="XXS">XXS</option>
                                                                <option <?=($this->session->size=="XS")?"selected":""?> value="XS">XS</option>
                                                                <option <?=($this->session->size=="S")?"selected":""?> value="S">S</option>
                                                                <option <?=($this->session->size=="M")?"selected":""?> value="M">M</option>
                                                                <option <?=($this->session->size=="L")?"selected":""?> value="L">L</option>
                                                                <option <?=($this->session->size=="XL")?"selected":""?> value="XL">XL</option>
                                                                <option <?=($this->session->size=="XL")?"selected":""?> value="XL">XL</option>
                                                                <option <?=($this->session->size=="XL")?"selected":""?> value="XXL">XXL</option>
                                                                <option <?=($this->session->size=="XL")?"selected":""?> value="XXXL">XXXL</option>
                                                              </select>
                                                            </div> 
                                                        </div>
                                                        <br><br>
                                                        <div class="product_action mt-20">
                                                           <ul>
                                                               <li><a  href="javascript:void()" onclick="add_cart(<?=$val->ProductId?>, <?=$k?>)">+ add to cart</a></li>
                                                               
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
    function add_cart(product_id, row) {
        var qty = 1;
        var size = $('#size'+row).val();
        ;
        if(size==""){
            
            Swal.fire({
              title: "The Size?",
              text: "Plese select a size",
              icon: "question"
            });
            return false;
        }
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
                product_id: product_id, qty:qty, size:size
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
<script>
function showSizePredictionForm() {
  Swal.fire({
    title: 'Can you support us to predict your size?',
    html: `
      <form id="sizeForm">
        <div style="margin-bottom: 10px;">
          <label for="height">Height (cm):</label>
          <input type="number" id="height" class="swal2-input" placeholder="Enter your height">
        </div>
        <div style="margin-bottom: 10px;">
          <label for="weight">Weight (kg):</label>
          <input type="number" id="weight" class="swal2-input" placeholder="Enter your weight">
        </div>
      </form>
    `,
    confirmButtonText: 'Submit',
    focusConfirm: false,
    preConfirm: () => {
      const height = document.getElementById('height').value;
      const weight = document.getElementById('weight').value;
      
      if (!height || !weight) {
        Swal.showValidationMessage('Please enter both height and weight');
        return false;
      }
      
      return { height: height, weight: weight };
    }
  }).then((result) => {
    if (result.isConfirmed) {
      const { height, weight } = result.value;
      console.log(`Height: ${height}, Weight: ${weight}`);
      Swal.fire({
                imageUrl: '<?= base_url() ?>assets/html/loading/upload.gif',
                imageHeight: 200,
                imageAlt: 'A tall image',
                showCancelButton: false,
                showConfirmButton: false,
                // title: 'Uploading Image',
            })
            $.ajax({
            type: 'ajax',
            method: 'POST',
            url: "<?php echo base_url() ?>home/load_size",
            // async:false,
            data: {height:height, weight:weight},
            dataType: 'json',
            success: function(data) {
                swal.close()
                if(data==4){
                    Swal.fire({
                      title: "The Image?",
                      text: "Please upload your image!!",
                      icon: "question"
                    });
                }else if(data==3){
                    Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: "Something went wrong!",
                          
                        });
                }else if(data==2){
                    window.location.href = "<?=base_url()?>try-your-best-outfit";
                }
            }
        });
      // You can now use these values to send to your server or process further
    }
  });
}
$(document).ready(function() {
 var size = "<?=$this->session->size?>";
 // alert(size);
 if(size==""){
    showSizePredictionForm();
 }
  
});
</script>


<!-- Button to trigger the SweetAlert -->
<!-- <button onclick="showSizePredictionForm()">Predict My Size</button> -->