<div class="container-fluid" style="font-size: 16px; color:#222B45;">
    <div class="row align-items-start" style="margin-bottom: 25px;">
        <div class="col">
            <ol class=" breadcrumb breadcrumb-dot justify-content-start" style="font-size: 14px;background:transparent">
                <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Home</li>
                <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Invoice</li>
                <li class="breadcrumb-item active justify-content-start" aria-current="page" style="color:black;">Edit Invoice</li>
            </ol>
        </div>
    </div>
    <?php foreach ($inv as $po) { ?>
        <?php $userdata = $this->session->userdata('user_logged'); ?>
        <form method="POST" action="" target="" id="myform">
            <div class=" justify-content-start" style="font-size: 16px; color:#222B45;">
                <div class="row ">
                    <div class="col">
                        <label for="noquitation">No. Invoice</label>
                        <input type="" style="color:black;background: #E2EFFC;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $po->no_invoice; ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="ps">Swift Code</label>
                        <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="swift" name="swift" aria-describedby="" placeholder="" value="<?= $po->swift_code; ?>">
                    </div>
                    <div class="col">
                        <label for="Duedate">Due Date</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <!-- <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div> -->
                            </div>
                            <input type="date" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-top-right-radius: 7px;border-bottom-right-radius: 7px;" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?= $po->due_date; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class=" justify-content-start" style="font-size: 16px; color:#222B45;">
                <div class="row">
                    <div class="col">
                        <label for="noquitation">No. Purchase Order</label>
                        <input type="" style="color:black;background: #E2EFFC;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" id="nopo" name="nopo" aria-describedby="" placeholder="" value="<?= $po->no_Po; ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="Pm">Address</label>
                        <input type="" style="color:black;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?= $po->address; ?>">
                    </div>
                    <div class="col">
                        <label for="dd">Email</label>
                        <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?= $po->email; ?>">
                    </div>


                </div>
            </div>

            <div class=" justify-content-start" style="font-size: 16px; color:#222B45;">
                <div class="row">
                    <div class="col">
                        <label for="cn">Client Name</label>
                        <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $po->client_name; ?>">
                    </div>
                    <div class="col">
                        <label for="cn">Account</label>
                        <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="acc" name="acc" aria-describedby="" placeholder="" value="<?= $po->account; ?>">
                    </div>
                    <div class="col">
                        <label for="cn">Tax</label>
                        <div class="multipleSelection">
                            <div class="selectBox" onclick="showCheckboxes()">
                                <select style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px; font: size 16px;" class="form-control form-control-user">
                                    <option>Select options</option>
                                </select>
                                <div class="overSelect"></div>
                            </div>
                            <div id="checkBoxes" style="display:none">

                                <label for="first">
                                    <input type="checkbox" id="ppn10" value="1" name="tax[]" onchange='hitungpajak();' <?php foreach ($tax as $t) {
                                                                                                                            if ($t->jenis_tax == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?> />
                                    PPN 10%
                                </label>
                                <label for="first">
                                    <input type="checkbox" id="fdn" value="2" name="tax[]" onchange='hitungpajak();' <?php foreach ($tax as $t) {
                                                                                                                            if ($t->jenis_tax == '2') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?> />
                                    PPh 21 (freelancer dengan NPWP)
                                </label><label for="first">
                                    <input type="checkbox" id="ftn" value="3" name="tax[]" onchange='hitungpajak();' <?php foreach ($tax as $t) {
                                                                                                                            if ($t->jenis_tax == '3') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?> />
                                    PPh 21 (freelancer tanpa NPWP)
                                </label><label for="first">
                                    <input type="checkbox" id="tadn" value="4" name="tax[]" onchange='hitungpajak();' <?php foreach ($tax as $t) {
                                                                                                                            if ($t->jenis_tax == '4') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?> />
                                    PPh 21 (Tenaga Ahli dengan NPWP)
                                </label><label for="first">
                                    <input type="checkbox" id="tatn" value="5" name="tax[]" onchange='hitungpajak();' <?php foreach ($tax as $t) {
                                                                                                                            if ($t->jenis_tax == '5') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?> />
                                    PPh 21 (Tenaga Ahli tanpa NPWP)
                                </label>
                                <label for="first">
                                    <input type="checkbox" id="vendor" value="6" name="tax[]" onchange='hitungpajak();' <?php foreach ($tax as $t) {
                                                                                                                            if ($t->jenis_tax == '6') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?> />
                                    PPh 23 (2%)
                                </label>
                            <?php } ?>
                            </div>
                        </div>

                    </div>



                </div>
            </div>

            <div class=" justify-content-start" style="font-size: 16px; color:#222B45;">
                <div class="row">
                    <div class="col">
                        <label for="Duedate">Invoice Date</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <!-- <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div> -->
                            </div>
                            <input style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-top-right-radius: 7px;border-bottom-right-radius: 7px;" type="date" class="form-control form-control-user datepicker" id="ivd" name="invoicedate" value="<?= $po->invoice_date; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="dd">No. Rekening</label>
                        <select style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="no_rek" name="no_rek" value="<?= $po->account; ?>">
                            <option value="">-</option>
                            <option value="1" <?php if ($po->no_rek == '1') {
                                                    echo 'selected';
                                                } ?>>Permata Bank IDR</option>
                            <option value="2" <?php if ($po->no_rek == '2') {
                                                    echo 'selected';
                                                } ?>>Permata Bank Dollar</option>
                            <option value="3" <?php if ($po->no_rek == '3') {
                                                    echo 'selected';
                                                } ?>>Permata Bank Euro</option>
                            <option value="4" <?php if ($po->no_rek == '4') {
                                                    echo 'selected';
                                                } ?>>Bank Danamon</option>
                            <option value="5" <?php if ($po->no_rek == '5') {
                                                    echo 'selected';
                                                } ?>>Paypal</option>
                        </select>
                    </div>
                    <div class="col" style="font-size: 18px;">
                        <label for="dd">Tipe Invoice</label>
                        <input type="hidden" class="form-control form-control-user datepicker" id="tipe" name="tipe" value="<?= $po->tipe; ?>">
                        <select style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" disabled>
                            <option value="1" <?php if ($po->tipe == '1') {
                                                    echo 'selected';
                                                } ?>>Invoice Luar</option>
                            <option value="2" <?php if ($po->tipe == '2') {
                                                    echo 'selected';
                                                } ?>>Invoice Local</option>
                            <option value="3" <?php if ($po->tipe == '3') {
                                                    echo 'selected';
                                                } ?>>Invoice SPQ</option>
                            <option value="4" <?php if ($po->tipe == '4') {
                                                    echo 'selected';
                                                } ?>>Invoice Luar 2</option>
                            <option value="5" <?php if ($po->tipe == '5') {
                                                    echo 'selected';
                                                } ?>>Invoice SPQ 2</option>
                        </select>
                    </div>



                </div>
            </div>
            <div class="" style="border-radius: 10px; color:#000000;">
                <div>
                    <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;" id="dinamisTable">

                    </table>
                </div>

            </div>
            <div class=" " style="border-radius: 10px;color:#222B45;">
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;font-size: 16px; color:#222B45;font-weight: normal;">
                            <thead>
                                <tr>
                                    <th>Public Notes</th>
                                    <th>Terms</th>
                                    <th>Signature</th>
                                    <th>Footer</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="public_notes"></textarea></td>
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="regards"></textarea></td>
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="footer"></textarea></td>
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="address_resource"></textarea></td>
                                </tr>


                        </table>
                    </div>
                    <div class="col-lg-4" style="color:#222B45;font: size 16px;">
                    <div class=" row text-left font-weight-normal" style="">
                        <input type="hidden" id="total" name="total" value="0" readonly>
                         <div class="col">Total Cost</div>
                         <div class="col" style="text-align: end;" id="total-text">0</div>
                     </div>
                     <hr>
                     <div class=" row text-left font-weight-normal" style="">
                         <div class="col">Tax</div>
                         <div class="col" style="text-align: end;"id="pajak-text"> - 0</div>
                     </div>
                     <hr>
                     <div class=" row text-left font-weight-bold">
                        <input type="hidden" id="grand" name="grand" value="0" readonly>
                         <div class=" col">Grand Total</div>
                         <div class="col" style="text-align: end;" id="grand-text">0</div>
                         <!-- <hr>
                         <div class="text-left font-weight-bold">
                             Total Cost <input type="text" id="total" name="total" value="0" readonly>
                             <hr>
                             Grand Total <input type="text" id="grand" name="grand" value="0" readonly>
                             <hr>
                         </div> -->
                     </div>
                    </div>
                    <script>
                  var form = $('#myform');
               </script>
               <div class="col-lg-9">
                  <div class="row">
                  <div class="col"></div>
                    <div class="col"><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-save" onclick="submit_data()">Save</button></div>
                    <div class="col"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#emailModal" style="font-family: Poppins;font-style: normal;font-weight: normal;background: #F80909;background: #F80909;" id="email-send" onclick="kirim_email()">Send Email</button></div>
                    <div class="col"><button type="submit button" class="btn btn-primary" id="preview" onclick="preview_pdf()">Print</button></div>
                    <div class="col"></div>
                  </div>
               </div>
                    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-center">

                        <a href="<?php echo base_url('finance/add_inv_out'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
                        <a>&emsp;&emsp;</a>
                        <a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
                    </div> -->
                </div>
                <!-- <div class="col-lg-4">
                    <hr>
                    <div class="text-left font-weight-bold">
                        Total Cost <input type="text" id="total" name="total" value="0" readonly>
                        <hr>
                        Grand Total <input type="text" id="grand" name="grand" value="0" readonly>
                        <hr>
                    </div>
                </div> -->
            </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Menambah Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit button" class="btn btn-success btn-save">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL -->

<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Mengirim Email dan Menambah Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit button" class="btn btn-danger" style="font-family: Poppins;font-style: normal;font-weight: normal;background: #F80909;background: #F80909;">Send Email</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL -->

</form>
<script type="text/javascript">
    var my_var = `<?php $this->load->helper('date');
                    $format = '%Y-%m-%d';
                    echo @mdate($format); ?>`;
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

    function kirim_email(){
   form.attr('action','<?php echo base_url('finance/edit_inv_out/email'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function submit_data(){
   form.attr('action','<?php echo base_url('finance/edit_inv_out'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function preview_pdf(){
   form.attr('action','<?php echo base_url('finance/preview_inv_out'); ?>');
   form.attr('target','_blank');
   console.log(form.attr('action'));
}
</script>
<script>
    var item_list = [];

    <?php
    foreach ($pi as $q) {
        echo "item_list.push('" . base64_encode(json_encode($q)) . "');" . PHP_EOL;
    }
    ?>
</script>