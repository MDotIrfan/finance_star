<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="#">Invoice Out</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Invoice Out</li>
</ol>
</nav>
<?php foreach ($inv as $po) { ?>
    <?php $userdata = $this->session->userdata('user_logged'); ?>
<form method="POST" autocomplete=off action="<?php echo base_url('finance/edit_inv_out');?>">
<div class="container justify-content-start">
    <div class="row ">
        <div class="col">
            <label for="noquitation">No. Invoice</label>
            <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $po->no_invoice; ?>" readonly>
        </div>
        <div class="col">
            <label for="ps">Swift Code</label>
            <input type="" class="form-control form-control-user" id="swift" name="swift" aria-describedby="" placeholder="" value="<?= $po->swift_code; ?>">
        </div>
        <div class="col">
            <label for="Duedate">Due Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?= $po->due_date; ?>">
            </div>
        </div>
    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
        <label for="noquitation">No. Purchase Order</label>
        <input type="" class="form-control form-control-user" id="nopo" name="nopo" aria-describedby="" placeholder="" value="<?= $po->no_Po; ?>" readonly>
        </div>
        <div class="col">
            <label for="Pm">Address</label>
            <input type="" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?= $po->address; ?>">
        </div>
        <div class="col">
            <label for="dd">Email</label>
            <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?= $po->email; ?>">
        </div>


    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">Client Name</label>
            <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $po->client_name; ?>">
        </div>
        <div class="col">
            <label for="cn">Account</label>
            <input type="" class="form-control form-control-user" id="acc" name="acc" aria-describedby="" placeholder="" value="<?= $po->account; ?>">
        </div>
        <div class="col">
        <label for="cn">Tax</label>
        <div class="multipleSelection">
            <div class="selectBox" onclick="showCheckboxes()">
                <select class="form-control form-control-user">
                    <option>Select options</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="checkBoxes" style="display:none">
            
                <label for="first">
                    <input type="checkbox" id="ppn10" value="1" name="tax[]" onchange='hitungpajak();' <?php foreach($tax as $t){if($t->jenis_tax=='1'){echo 'checked';}}?>/>
                    PPN 10%
                </label>
                <label for="first">
                    <input type="checkbox" id="fdn" value="2" name="tax[]" onchange='hitungpajak();' <?php foreach($tax as $t){if($t->jenis_tax=='2'){echo 'checked';}}?>/>
                    PPh 21 (freelancer dengan NPWP)
                </label><label for="first">
                    <input type="checkbox" id="ftn" value="3" name="tax[]" onchange='hitungpajak();' <?php foreach($tax as $t){if($t->jenis_tax=='3'){echo 'checked';}}?>/>
                    PPh 21 (freelancer tanpa NPWP)
                </label><label for="first">
                    <input type="checkbox" id="tadn" value="4" name="tax[]" onchange='hitungpajak();' <?php foreach($tax as $t){if($t->jenis_tax=='4'){echo 'checked';}}?>/>
                    PPh 21 (Tenaga Ahli dengan NPWP)
                </label><label for="first">
                    <input type="checkbox" id="tatn" value="5" name="tax[]" onchange='hitungpajak();' <?php foreach($tax as $t){if($t->jenis_tax=='5'){echo 'checked';}}?>/>
                    PPh 21 (Tenaga Ahli tanpa NPWP)
                </label>
                <label for="first">
                    <input type="checkbox" id="vendor" value="6" name="tax[]" onchange='hitungpajak();' <?php foreach($tax as $t){if($t->jenis_tax=='6'){echo 'checked';}}?>/>
                    PPh 23 (2%) 
                </label>
                <?php } ?>
            </div>
        </div>
       
        </div>



    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
        <label for="Duedate">Invoice Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="ivd" name="invoicedate" value="<?= $po->invoice_date; ?>">
            </div>
        </div>
        <div class="col">
        <label for="dd">No. Rekening</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="no_rek" name="no_rek" value="<?= $po->account; ?>">
            <option value="">-</option>
            <option value="1"<?php if($po->no_rek=='1'){echo 'selected';} ?>>Permata Bank IDR</option>
            <option value="2" <?php if($po->no_rek=='2'){echo 'selected';} ?>>Permata Bank Dollar</option>
            <option value="3" <?php if($po->no_rek=='3'){echo 'selected';} ?>>Permata Bank Euro</option>
            <option value="4" <?php if($po->no_rek=='4'){echo 'selected';} ?>>Bank Danamon</option>
            <option value="5" <?php if($po->no_rek=='5'){echo 'selected';} ?>>Paypal</option>
                                    </select>
        </div>
        <div class="col">
        <label for="dd">Tipe Invoice</label>
        <input type="hidden" class="form-control form-control-user datepicker" id="tipe" name="tipe" value="<?= $po->tipe; ?>">
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" disabled>
            <option value="1" <?php if($po->tipe=='1'){echo 'selected';} ?>>Invoice Luar</option>
            <option value="2" <?php if($po->tipe=='2'){echo 'selected';} ?>>Invoice Local</option>
            <option value="3" <?php if($po->tipe=='3'){echo 'selected';} ?>>Invoice SPQ</option>
            <option value="4" <?php if($po->tipe=='4'){echo 'selected';} ?>>Invoice Luar 2</option>
            <option value="5" <?php if($po->tipe=='5'){echo 'selected';} ?>>Invoice SPQ 2</option>
                                    </select>
        </div>



    </div>
</div>
<hr>
<div class="col-lg-10 " style="">
    <div>
        <table class="table table-bordered shadow-lg" id="dinamisTable">
            
        </table>
    </div>

</div>
<hr>
<div class="col-lg-12" style="margin-left:auto;margin-right:auto">
<div class="row">
    <div class="col-lg-8" style="margin-left:auto;margin-right:auto">
        <div>
            <table class="table table-bordered shadow" style="">
                <thead>
                    <tr>
                        <th>Public Notes</th>
                        <th>Regards</th>
                        <th>Footer</th>
                        <th>Address Resource</th>
                </thead>
                <tbody>
                    <tr>
                    <td><textarea name="public_notes"></textarea></td>
                     <td><textarea name="regards"></textarea></td>
                     <td><textarea name="footer"></textarea></td>
                     <td><textarea name="address_resource"></textarea></td>
                    </tr>


            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">

            <a href="<?php echo base_url('finance/add_inv_out'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
            <a>&emsp;&emsp;</a>
            <a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
        </div>
    </div>
    <div class="col-lg-4">
        <hr>
        <div class="text-left font-weight-bold">
            Total Cost <input type="text" id="total" name="total" value="0" readonly>
            <hr>
            Grand Total <input type="text" id="grand" name="grand" value="0" readonly>
            <hr>
        </div>
    </div>
    </div>
</div>
</div>
</form>
<script type="text/javascript">
    var my_var = `<?php $this->load->helper('date');$format = '%Y-%m-%d';echo @mdate($format); ?>`;
    var show = true;
  
        function showCheckboxes() {
            var checkboxes = 
                document.getElementById("checkBoxes");
  
            if (show) {
                checkboxes.style.display = "block";
                show = false;
            } else {
                checkboxes.style.display = "none";
                show = true;
            }
        }
</script>
<script>
  var item_list = [];

  <?php
    foreach($pi as $q) {
      echo "item_list.push('".base64_encode(json_encode($q))."');".PHP_EOL;
    }
  ?>
</script>