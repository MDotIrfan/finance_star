<div class="container-fluid">
    <nav aria-label="breadcrumb" class="">
        <ol class="breadcrumb breadcrumb-dot" style="font-size: 14px;background:transparent;">
            <li class="breadcrumb-item" style="color: #9598A3;">Dashboard</li>
            <li class="breadcrumb-item active" aria-current="page" style="color:black;">Edit Invoice</li>
        </ol>
    </nav>
    <?php $userdata = $this->session->userdata('user_logged'); ?>
        <?php foreach ($inv as $po) { ?>
            <form method="POST" action="" target="" id="myform">
                <div class=" justify-content-start" style="font-size: 18px; color:#222B45;">
                    <div class="row ">
                        <div class="col">
                            <label for="noquitation">No. Purchase Order</label>
                            <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="status" name="status" aria-describedby="" placeholder="" value="<?= $po->no_Po ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="ps">Cabang Bank</label>
                            <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="" value="<?= $po->cabang_bank ?>">
                        </div>
                        <div class="col">
                        <label for="Duedate">Due Date </label>
                            <!-- <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                                </div>
                                <input style="background: #E2EFFC;color:black;" type="text" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?= $po->due_date ?>">
                            </div> -->
                            <input type="date" class="form-control form-control-user datepicker" id="dd" name="duedate" style="background: #E2EFFC;color:black;" value="<?= $po->due_date ?>">
                        </div>
                        <div class="col">
                            <label for="Duedate">Email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                </div>
                                <input style="background: #E2EFFC;color:black;" type="text" class="form-control form-control-user" id="dd" name="email" value="<?= $po->email ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" justify-content-start" style="font-size: 18px; color:#222B45;">
                    <div class="row">
                        <div class="col">
                            <label for="cn">No. Invoice</label>
                            <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $po->no_invoice ?>" readonly>
                            <input class="form-control form-control-user" id="company" name="company" aria-describedby="" placeholder="" type="hidden" value="<?= $po->company ?>">
                        </div>
                        <div class="col">
                            <label for="Pm">Mitra Name</label>
                            <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="" value="<?= $po->mitra_name ?>">
                            <input style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="word">
                            <input type="hidden" style="color:black;" class="form-control form-control-user" id="id_fl" name="id_fl" aria-describedby="" placeholder="" value="<?php echo $po->id_fl; ?>">
                        </div>
                        <div class="col">
                            <label for="Duedate">Invoice Date </label>
                            <div class="input-group mb-2">
                                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                                </div> -->
                                <!-- <input style="background: #E2EFFC;color:black;" type="text" class="form-control form-control-user datepicker" id="id" name="invoicedate" value="<?= $po->invoice_date ?>"> -->
                                <input type="date" class="form-control form-control-user datepicker" id="dd" name="invoicedate" style="background: #E2EFFC;color:black;" value="<?= $po->invoice_date ?>">
                            </div>
                        </div>
                        <div class="col">
                            <label for="dd">No. NPWP</label>
                            <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="ce" name="ce" aria-describedby="" placeholder="" value="<?= $po->no_npwp ?>" oninput="tampil()">
                        </div>


                    </div>
                </div>

                <div class=" justify-content-start" style="margin-bottom: 15px;font-size: 18px; color:#222B45;">
                    <div class="row">
                        <div class="col">
                            <label for="cn">No, Rekening </label>
                            <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $po->no_rekening ?>">
                        </div>
                        <div class="col">
                            <label for="Pm">Address Payment</label>
                            <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?= $po->address ?>">
                        </div>
                        <div class="col">
                            
                        </div>
                        <div class="col">
                        </div>


                    </div>
                </div>

                <div style="border-radius: 10px; color:#000000;font: size 20px;color:#222B45;">
                    <div style="border-radius: 10px;">
                        <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;">
                            <thead>
                                <tr style="color:#000000; ">
                                    <th>Job Description</th>
                                    <th>Quantity Words</th>
                                    <th>Rate</th>
                                    <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="<?= $po->currency_inv ?>">
                                    <th style="" id="curr">
                                        <?php 
                                            if($po->currency_inv=='IDR'){echo 'Amount IDR';}
                                            else if($po->currency_inv=='USD'){echo 'Amount USD';}
                                            else if($po->currency_inv=='EUR'){echo 'Amount EUR';}
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="dinamisRow">
                        </table>
                    </div>

                </div>

                <div class=" " style="border-radius: 10px;color:#222B45;">
                    <div class="row">
                        <div class="col-lg-4">
                            <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;font-size: 18px; color:#222B45;font-weight: normal;">
                                <thead>
                                    <tr>
                                        <th>Public Notes</th>
                                        <!-- <th>Terms</th>
                                        <th>Signature</th>
                                        <th>Footer</th> -->
                                </thead>
                                <tbody>
                                    <tr>
                                    <tr>
                                        <td><textarea style="border-color: #FFFFFF;color:black;" name="public_notes" class="form-control"><?= $po->public_notes ?></textarea></td>
                                        <!-- <td><textarea style="border-color: #FFFFFF;color:black;" name="regards" class="form-control"><?= $po->terms ?></textarea></td>
                                        <td><textarea style="border-color: #FFFFFF;color:black;" name="footer" class="form-control"><?= $po->footer ?></textarea></td> -->
                                        <!-- <td><textarea style="border-color: #FFFFFF;color:black;" name="address_resource" class="form-control"><?= $po->signature ?></textarea></td> -->
                                    </tr>
                                    </tr>


                            </table>
                        </div>
                        <div class="col-lg-3">
                  
                        </div>
                        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-center">

                            <a href="<?php echo base_url('freelance/edit_inv_word'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
                            <a>&emsp;&emsp;</a>
                            <a href="<?php echo base_url('freelance/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
                        </div> -->
                        
                        <div class="col-lg-4" style="color:#222B45;font: size 18px;">
                            <div class="row text-left font-weight-normal">
                                <input type="hidden" id="total" name="total" value="0" readonly class="form-control font-weight-bold">
                                <div class="col">Total Cost</div>
                                <div class="col" style="text-align: end;" id="total-text">0</div>
                            </div>
                            <hr>
                            <div class=" row text-left font-weight-normal" style="">
                            <div class="col" id="tax-label">
                                <script>
                                var jenis = '';
                                </script>
                             <?php 
                                if($po->tax_tipe=='ftn'){
                                    echo '<script>jenis="ftn"</script>';
                                } else if($po->tax_tipe=='tatn'){
                                    echo '<script>jenis="tatn"</script>';
                                } else if($po->tax_tipe=='vendor'){
                                    echo '<script>jenis="vendor"</script>';
                                }
                            ?>
                            </div>
                            <input type="hidden" id="tax-tipe" name="tax-tipe" value="<?= $po->tax_tipe ?>" readonly>
                            <input type="hidden" id="tax" name="tax" value="" readonly>
                            <div class="col" style="text-align: end;"><span id="pajak"></span></div>
                            </div>
                            <hr>
                            <div class=" row text-left font-weight-bold">
                                <input type="hidden" id="grand" name="grand" value="" readonly>
                                <div class=" col">Grand Total</div>
                                <div class="col" style="text-align: end;" id="grand-text">0</div>
                            </div>
                            <hr>
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
                    </div>
                    <!-- <div class="col-lg-6">
                        <hr>
                        <div class="">
                            Total Cost<input type="text" id="total" name="total" value="<?= $po->total_cost ?>" readonly class="form-control">
                            <hr>
                            <script>
                                var jenis = '';
                            </script>
                            
                            <span id="pajak"></span>
                            <hr>
                            Grand Total <input type="text" id="grand" name="grand" value="<?= $po->grand_total ?>" readonly class="form-control">
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
<?php } ?>
<script>
    var item_list = [];

    <?php
    foreach ($pi as $q) {
        echo "item_list.push('" . base64_encode(json_encode($q)) . "');" . PHP_EOL;
    }
    ?>

function kirim_email(){
   form.attr('action','<?php echo base_url('freelance/edit_inv_word/email'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function submit_data(){
   form.attr('action','<?php echo base_url('freelance/edit_inv_word'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function preview_pdf(){
   form.attr('action','<?php echo base_url('freelance/preview_inv_word'); ?>');
   form.attr('target','_blank');
   console.log(form.attr('action'));
}
</script>