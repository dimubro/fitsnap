<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/top_bar'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<div class="container-fluid">
    <div class="row">

        <?php $this->load->view('include/side_bar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom page-title-div px-3">
                <h5 class="title_page">Dashboard > Category > <?=($obj->CategoryId)?"Edit":"Create"?> Category</h5>
            </div>
            

            <div class="row mx-3">
                <div class="col-md-12">
                    <?=$this->session->flashdata('notification')?>
                    <div class="card card_backgroud">
                      <div class="card-header d-flex justify-content-between align-items-center"><label class="card-title">Category Details</label>
                    <!-- <a href="<?=base_url()?>admin/Create-User" class="btn btn-primary">Add User</a> -->
                      </div>
                      <?php 
                        $hidden = array('GroupId' => $obj->GroupId);
                        echo form_open('admin/Products_group/save', '', $hidden);
                        ?>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="usr">Group:</label>
                                        <input type="text" required="" value="<?=$obj->GroupTitle?>" name="form[GroupTitle]" class="form-control" id="usr">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="usr">Age:</label>
                                        <select class="form-control" required="" name="form[Age]" id="sel1">
                                          <option value="">Select Age</option>
                                          <option <?=($obj->Age==1)?"selected":""?> value="1">1 - 5 years</option>
                                          <option <?=($obj->Age==2)?"selected":""?> value="2">5 - 10 years</option>
                                          <option <?=($obj->Age==3)?"selected":""?> value="3">10 - 15 years</option>
                                          <option <?=($obj->Age==4)?"selected":""?> value="4">15 - 20 years</option>
                                          <option <?=($obj->Age==5)?"selected":""?> value="5">20 - 30 years</option>
                                          <option <?=($obj->Age==6)?"selected":""?> value="6">30 - 40 years</option>
                                          <option <?=($obj->Age==7)?"selected":""?> value="7">40 - 50 years</option>
                                          <option <?=($obj->Age==8)?"selected":""?> value="8">50 - 60 years</option>
                                          <option <?=($obj->Age==9)?"selected":""?> value="9">60 - 70 years</option>
                                          
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="usr">Gender:</label>
                                        <select class="form-control" required="" name="form[Gender]" id="sel1">
                                          <option value="">Select Gender</option>
                                          <option <?=($obj->Gender==1)?"selected":""?> value="1">Male</option>
                                          <option <?=($obj->Gender==2)?"selected":""?> value="2">Female</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <label for="usr">Products:</label>
                                        <select multiple="multiple" required="" id="select_product" name="products[]" class="form-control" >
                                          <!-- <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option> -->
                                          <!-- <option disabled="" value="">Select Product</option> -->
                                          <?php foreach ($products as $k => $va): ?>
                                            <option <?php foreach ($group_product as $k => $v): ?>
                                              <?php if ($v->ProductId==$va->ProductId): ?>
                                                selected
                                              <?php endif ?>
                                            <?php endforeach ?> value="<?=$va->ProductId?>"><?=$va->ProductTitle?></option>
                                          <?php endforeach ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              
                          </div>

                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn btn-primary">Save</button>
                      </div>
                      <?= form_close() ?> 
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php $this->load->view('include/page_footer'); ?>
<?php $this->load->view('include/footer'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#select_product').select2();
});
</script>



