<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/top_bar'); ?>



<div class="container-fluid">
    <div class="row">

        <?php $this->load->view('include/side_bar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom page-title-div px-3">
                <h5 class="title_page">Dashboard > Group</h5>
            </div>
            <div class="row mx-3">
                <div class="col-md-12">
                   <?=$this->session->flashdata('notification')?>
                    <div class="card card_backgroud">
                      <div class="card-header d-flex justify-content-between align-items-center"><label class="card-title">Group</label>
                    <a href="<?=base_url()?>admin/Create-Group" class="btn btn-primary">Create Group</a>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <table id="myTable" class="table table-style">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Group Title</th>
                                      <th scope="col">Age</th>
                                      <th scope="col">Gender</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($records as $k => $val): ?>
                                    <tr>
                                      <td><center><?=$k+1?></center></td>
                                      <td><center><?=$val->GroupTitle?></center></td>
                                      <td><center><?php if($val->Age==1){
                                        echo "1 - 5 years";
                                      }elseif($val->Age==2){
                                        echo "5 - 10 years";
                                      }elseif($val->Age==3){
                                        echo "10 - 15 years";
                                      }elseif($val->Age==4){
                                        echo "15 - 20 years";
                                      }elseif($val->Age==5){
                                        echo "20 - 30 years";
                                      }elseif($val->Age==6){
                                        echo "30 - 40 years";
                                      }elseif($val->Age==7){
                                        echo "40 - 50 years";
                                      }elseif($val->Age==8){
                                        echo "50 - 60 years";
                                      }elseif($val->Age==9){
                                        echo "60 - 70 years";
                                      } ?></center></td>
                                      <td><center><?=($val->Gender==1)?"Male":"Female"?></center></td>
                                      <td><center><a class="btn btn-warning btn-sm" href="<?=base_url()?>admin/Edit-Group/<?=$val->GroupId?>"><i class="fas fa-pen"></i></a>
                                        <button class="btn btn-danger btn-sm" onclick="delete_modal('<?= base_url() ?>admin/Delete-Group/<?=$val->GroupId?>');"><i class="fas fa-trash-alt"></i></button></center></td>
                                    </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                      <!-- <div class="card-footer">Footer</div> -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php $this->load->view('include/page_footer'); ?>
<?php $this->load->view('include/footer'); ?>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>


