<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Invoice</li>
    </ol>
</nav>
<?php $userdata = $this->session->userdata('user_logged'); ?>
<?php foreach ($res as $r) : ?>
<?php foreach ($inv as $po) { ?>
<form method="POST" action="<?php echo base_url('freelance/edit_inv_item');?>">
<div class="container justify-content-start">
    <div class="row ">
        <div class="col">
            <label for="noquitation">No. Purchase Order</label>
            <input type="" class="form-control form-control-user" id="status" name="status" aria-describedby="" placeholder="" value="<?= $po->no_Po?>" readonly>
        </div>
        <div class="col">
            <label for="ps">Cabang Bank</label>
            <input type="" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="" value="<?= $po->cabang_bank?>">
        </div>
        <div class="col">
            <label for="Duedate">Down Payment </label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control form-control-user" id="dp" name="dp" value="<?= $po->down_payment?>">
            </div>
        </div>
        <div class="col">
            <label for="Duedate">Email</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control form-control-user" id="dd" name="email" value="<?= $po->email?>">
            </div>
        </div>
    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">No. Invoice</label>
            <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $po->no_invoice?>" readonly>
        </div>
        <div class="col">
            <label for="Pm">Mitra Name</label>
            <input type="" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="" value="<?= $po->mitra_name?>">
            <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="item">
        </div>
        <div class="col">
            <label for="Duedate">Invoice Date </label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="id" name="invoicedate" value="<?= $po->invoice_date?>">
            </div>
        </div>
        <div class="col">
            <label for="dd">No. NPWP</label>
            <input type="" class="form-control form-control-user" id="ce" name="ce" aria-describedby="" placeholder="" value="<?= $po->no_npwp?>">
        </div>


    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">No, Rekening </label>
            <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $po->no_rekening?>">
        </div>
        <div class="col">
            <label for="Pm">Address Payment</label>
            <input type="" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?= $po->address?>">
        </div>
        <div class="col">
            <label for="Duedate">Due Date </label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?= $po->due_date?>">
            </div>
        </div>
        <div class="col">
        </div>


    </div>
</div>
<br>

<hr>
<div class="col-lg-10 " style="margin-left:auto;margin-right:auto">
    <div>
        <table class="table table-bordered shadow-lg">
            <!-- <table id=" example" class="display" style="width:100%"> -->
            <thead>
                <tr>
                    <th>Job Description</th>
                    <th><select id="v_form" name="v_form" class="form-control font-weight-bold">
                                    <option value="0" <?php if($po->v_form==0) {echo 'selected';} ?>>
                                        Volume
                                    </option>
                                    <option value="1" <?php if($po->v_form==1) {echo 'selected';} ?>>
                                        Item
                                    </option>

                                </select></th>
                    <th>Unit</th>
                    <th>Rate</th>
                    <th>Amount IDR</th>
                </tr>
            </thead>
            <tbody id="dinamisRow">
        </table>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-lg-5" style="margin-left:auto;margin-right:auto">
        <div>
            <table class="table table-bordered shadow" style="margin-left:auto;margin-right:auto">
                <thead>
                    <tr>
                        <th>Public Notes</th>
                        <th>Regards</th>
                        <th>Footer</th>
                        <th>Address Resource</th>
                </thead>
                <tbody>
                    <tr>
                    <tr>
                                    <td><textarea name="public_notes" class="form-control"><?= $po->public_notes ?></textarea></td>
                                    <td><textarea name="regards" class="form-control"><?= $po->terms ?></textarea></td>
                                    <td><textarea name="footer" class="form-control"><?= $po->footer ?></textarea></td>
                                    <td><textarea name="address_resource" class="form-control"><?= $po->signature ?></textarea></td>
                                </tr>
                    </tr>


            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">

            <a href="<?php echo base_url('freelance/edit_inv_item'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
            <a>&emsp;&emsp;</a>
            <a href="<?php echo base_url('freelance/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
        </div>
    </div>
    <div class="col-lg-6">
        <hr>
        <div class="">
        Total Cost<input type="text" id="total" name="total" value="<?= $po->total_cost ?>" readonly class="form-control">
        <hr>
               <script>
                  var jenis='';
               </script>
               <?php if($userdata->id_Status=='1'){
                  if($r->jenis=='biasa'){
                      if($r->no_npwp<>NULL){
                          echo 'PPh 21 (- 5%) <script>jenis=`fdn`</script>';
                      } else {
                          echo 'PPh 21 (- 6%) <script>jenis=`ftn`</script>';
                      }
                  } else if($r->jenis=='tenaga ahli'){
                      if($r->no_npwp<>NULL){
                          echo 'PPh 21 (- 50% x 5%) <script>jenis=`tadn`</script>';
                      } else {
                          echo 'PPh 21 (- 50% x 5% x 120%) <script>jenis=`tatn`</script>';
                      }
                  }
                  }else{
                  echo 'PPh 23 (- 2%) <script>jenis=`vendor`</script>';
                  };?>
               <span id="pajak"></span>
               <hr>
                        Grand Total <input type="text" id="grand" name="grand" value="<?= $po->grand_total ?>" readonly class="form-control">
                        <hr>
        </div>
    </div>
</div>

</div>
</form>
<?php } ?>
<?php endforeach; ?>
<script>
  var item_list = [];

  <?php
    foreach($pi as $q) {
      echo "item_list.push('".base64_encode(json_encode($q))."');".PHP_EOL;
    }
  ?>
</script>