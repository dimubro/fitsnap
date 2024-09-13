<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/top_bar'); ?>



<div class="container-fluid">
    <div class="row">

        <?php $this->load->view('include/side_bar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom page-title-div px-3">
                <h5 class="title_page">Dashboard > Orders</h5>
            </div>
            <div class="row mx-3">
                <div class="col-md-12">
                   <?=$this->session->flashdata('notification')?>
                    <div class="card card_backgroud">
                      <div class="card-header d-flex justify-content-between align-items-center"><label class="card-title">Orders</label>
                    
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <table id="myTable" class="table table-style">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Telephone</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($records as $k => $val): ?>
    <tr>
      <td><center><?=$k+1?></center></td>
      <td><center><?=$val->FirstName?></center></td>
      <td><center><?=$val->LastName?></center></td>
      <td><center><?=$val->Phone?></center></td>
      <td><center><?=$val->StreetAddress?></center></td>
      <td><center><?=$val->City ?></center></td>
      <td><center>LKR <?=number_format($val->CartTotal,2)?></center></td>
      <td><center><a class="btn btn-warning btn-sm" href="<?=base_url()?>admin/View-Order/<?=$val->OrderId?>"><i class="fas fa-eye"></i></a>
        <!-- <button class="btn btn-danger btn-sm" onclick="delete_modal('<?= base_url() ?>admin/Delete-Category/<?=$val->CategoryId?>');"><i class="fas fa-trash-alt"></i></button></center> --></td>
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


