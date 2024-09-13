<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/top_bar'); ?>



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
                        $hidden = array('CategoryId' => $obj->CategoryId);
                        echo form_open('admin/category/save', '', $hidden);
                        ?>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="usr">Category:</label>
                                        <input type="text" required="" value="<?=$obj->CategoryTitle?>" name="form[CategoryTitle]" class="form-control" id="usr">
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



