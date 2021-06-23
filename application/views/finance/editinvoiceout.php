<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="#">Invoice Out</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Invoice Out</li>
</ol>
</nav>
<?php foreach ($inv as $po) { ?>
<form method="POST" action="<?php echo base_url('finance/edit_inv_out');?>">
<div class="container justify-content-start">
    <div class="row ">
        <div class="col">
            <label for="noquitation">No. Invoice</label>
            <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $po->no_invoice?>" readonly>
            <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="4">
        </div>
        <div class="col">
            <label for="ps">Swift Code</label>
            <input type="" class="form-control form-control-user" id="swift" name="swift" aria-describedby="" placeholder="" value="<?= $po->swift_code?>">
        </div>
        <div class="col">
            <label for="Duedate">Due Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?= $po->due_date?>">
            </div>
        </div>
    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">No. PO</label>
            <input type="" class="form-control form-control-user" id="status" name="status" aria-describedby="" placeholder="" value="<?= $po->no_Po?>" readonly>
        </div>
        <div class="col">
            <label for="Pm">Address</label>
            <input type="" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?= $po->address?>">
        </div>
        <div class="col">
            <label for="dd">Email</label>
            <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?= $po->email?>">
        </div>


    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">Client Name</label>
            <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $po->client_name?>">
        </div>
        <div class="col">
            <label for="Pm">Down Payment</label>
            <input type="" class="form-control form-control-user" id="dp" name="dp" aria-describedby="" placeholder="" value="<?= $po->down_payment?>">
        </div>
        <div class="col">
            <!-- <label for="dd">Tax</label>
            <input type="" class="form-control form-control-user" id="ce" name="ce" aria-describedby="" placeholder=""> -->
        </div>



    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">Account</label>
            <input type="" class="form-control form-control-user" id="acc" name="acc" aria-describedby="" placeholder="" value="<?= $po->account?>">
        </div>
        <div class="col">
            <label for="Duedate">Invoice Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="ivd" name="invoicedate" value="<?= $po->invoice_date?>">
            </div>
        </div>
        <div class="col">
            <label for="dd">No. Rekening</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="no_rek" name="no_rek">
            <option value="">-</option>
            <option value="1" <?php if($po->no_rek=="1"){echo 'selected';}?>>Permata Bank IDR</option>
            <option value="2" <?php if($po->no_rek=="2"){echo 'selected';}?>>Permata Bank Dollar</option>
            <option value="3" <?php if($po->no_rek=="3"){echo 'selected';}?>>Permata Bank Euro</option>
            <option value="4" <?php if($po->no_rek=="4"){echo 'selected';}?>>Bank Danamon</option>
            <option value="5" <?php if($po->no_rek=="5"){echo 'selected';}?>>Paypal</option>
                                    </select>
        </div>



    </div>
</div>
<hr>
<div class="col-lg-10 " style="margin-left:auto;margin-right:auto">
    <div>
        <table class="table table-bordered shadow-lg">
            <!-- <table id=" example" class="display" style="width:100%"> -->
            <thead>
                <tr>
                    <th>Job Description</th>
                    <th>Qtt Words</th>
                    <th>Unit Price</th>
                    <th>
                        <select name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
                            <option selected="selected">Amount IDR</option>
                            <option>Amount US</option>

                        </select>
                    </th>


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
                    <td><textarea name="public_notes"><?= $po->public_notes?></textarea></td>
                     <td><textarea name="regards"><?= $po->terms?></textarea></td>
                     <td><textarea name="footer"><?= $po->footer?></textarea></td>
                     <td><textarea name="address_resource"><?= $po->signature?></textarea></td>
                    </tr>


            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">

            <a href="<?php echo base_url('finance/edit_inv_out'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
            <a>&emsp;&emsp;</a>
            <a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
        </div>
    </div>
    <div class="col-lg-4">
        <hr>
        <div class="text-left font-weight-bold">
            Total Cost <input type="text" id="total" name="total" value="" readonly>
            <hr>
            Grand Total <input type="text" id="grand" name="grand" value="" readonly>
            <hr>
        </div>
    </div>
    </div>
</div>
</form>
<?php } ?>
<script>
  var item_list = [];

  <?php
    foreach($pi as $q) {
      echo "item_list.push('".base64_encode(json_encode($q))."');".PHP_EOL;
    }
  ?>
</script>