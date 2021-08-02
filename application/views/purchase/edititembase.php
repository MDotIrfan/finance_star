<div class="container-fluid">
    <?php $userdata = $this->session->userdata('user_logged'); ?>
    <nav aria-label="breadcrumb" style="width:fit-content">
        <ol class="breadcrumb breadcrumb-dot" style="font-size: 14px;background:transparent;">
            <li class="breadcrumb-item" style="color: #9598A3;">Purchase Order</li>
            <li class="breadcrumb-item active" style="color:#9598A3;">Item Base</li>
            <li class="breadcrumb-item active" aria-current="page" style="color:black;">Edit Item Base</li>
        </ol>
    </nav>
    <form method="POST" autocomplete="off" action="" id="myform">
        <?php foreach($po as $po) { ?>
        <div class=" justify-content-start" style="font-size: 18px; color:#222B45;">
            <div class="row ">
                <div class="col">
                    <label for="noquitation">No Purchase Order</label>
                    <input type="hidden" class="form-control form-control-user" id="nopo_awal" name="nopo_awal" aria-describedby="" placeholder="" value="<?= $po->no_Po; ?>" readonly>
                <input type="" class="form-control form-control-user" id="nopo" name="nopo" aria-describedby="" placeholder="" value="<?= $po->no_Po; ?>" readonly>
                </div>
                <div class="col">
                    <label for="ps">Resource Name</label>
                    <input type="" style="color:black;" class="form-control form-control-user" id="rn" name="rn" aria-describedby="" placeholder="" value="<?= $po->resource_Name; ?>">
                </div>
                <div class="col">
                    <label for="ps">Mobile Phone</label>
                    <input type="" style="color:black;" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="" value="<?= $po->mobile_Phone; ?>">
                </div>
                <div class="col">
                    <label for="pn">Project Name</label>
                    <input style="color:black;" class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" type="text" value="<?= $po->project_Name_po; ?>">
                    <input style="color:black;" class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="item">
                </div>

            </div>
        </div>
        <br>
        <div class=" justify-content-start" style="font-size: 18px; color:#222B45;">
            <div class="row">
                <div class="col">
                    <label for="cn">PM Name</label>
                    <input type="" style="color:black;" class="form-control form-control-user" id="pmn" name="pmn" aria-describedby="" placeholder="" value="<?= $po->nama_Pm; ?>">
                </div>
                <div class="col">
                    <label for="Pm">Resource Email</label>
                    <input type="" style="color:black;" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="" value="<?= $po->resource_Email; ?>">
                </div>
                <div class="col">
                    <label for="dd">Date </label>
                    <input type="date" style="color:black;" class="form-control form-control-user" name="tgl" value="<?= $po->date; ?>">
                </div>
                <div class="col">
                <label for="dd">No. Quotation</label>
                <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="status" name="status" aria-describedby="" placeholder="" value="<?= $po->id_quotation ?>" readonly>
                </div>

            </div>
        </div>
        <br>
        <div class=" justify-content-start" style="font-size: 18px; color:#222B45;">
            <div class="row">
                <div class="col">
                    <label for="cn">PM Email</label>
                    <input type="" style="color:black;" class="form-control form-control-user" id="cn" name="pme" aria-describedby="" placeholder="" value="<?= $po->email_pm; ?>">
                </div>
                <div class="col">
                    <label for="Pm">Resource Status</label>
                    <select style="color:black;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="rs" name="rs">
                        <?php foreach ($position as $p) {
                                $selected = ($p->status_Name == $po->resource_Status) ? "selected" : "";
                                echo '<option ' . $selected . ' value="' . $p->status_Name . '">' . $p->status_Name . '</option>';
                            } ?>
                    </select>
                </div>
                <div class="col">
                <label for="cn">Jumlah Pembayaran</label>
            <input type="" class="form-control form-control-user" id="jumlah" name="jumlah" aria-describedby="" placeholder="" value="<?= $po->jumlah_pembayaran ?>" oninput="">
                </div>
                <div class="col">
                </div>
            </div>
        </div>

        <div style="border-radius: 10px; color:#000000;font: size 20px;color:#222B45;">
            <div style="border-radius: 10px;">
                <table class="table table-bordered shadow" id="dynamicAddRemove" style="border-radius: 10px;background-color: #FFFFFF;">
                    <thead>
                        <tr style="color:#000000; ">
                            <th>Job Description</th>
                            <th>
                                <select id="v_form" name="v_form" class="form-control font-weight-bold">
                                    <option value="0" selected="selected">
                                        Volume
                                    </option>
                                    <option value="1">
                                        Item
                                    </option>
                                </select>
                            </th>
                            <th>Unit</th>
                            <th>Price/Unit</th>
                            <th>
                                <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="<?= $po->currency_po ?>">
                                <select style="color:#000000; " id="curr" name="curr" class="form-control font-weight-bold">
                                    <option value="IDR" <?php if($po->currency_po=='IDR') echo 'selected="selected"'?>>
                                        Cost in IDR
                                    </option>
                                    <option value="USD" <?php if($po->currency_po=='USD') echo 'selected="selected"'?>>
                                        Cost in USD
                                    </option>
                                    <option value="EUR" <?php if($po->currency_po=='EUR') echo 'selected="selected"'?>>
                                        Cost in EURO
                                    </option>

                                </select>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dinamisRow">
                        <div class="control-group after-add-more">


                        </div>
                </table>
            </div>

        </div>
        <div style="border-radius: 10px;color:#222B45;">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-7" style="margin-right: 80px">
                    <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;font-size: 18px; color:#222B45;font-weight: normal;">
                        <thead>
                            <tr>
                                <th>Public Notes</th>
                                <th>Regards</th>
                                <th>Footer</th>
                                <th>Address Resource</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="public_notes"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="regards"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="footer"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="address_resource"></textarea></td>
                            </tr>
                    </table>
                </div>
                <div class="col-lg-4" style="color:#222B45;font: size 18px;">
                    <!-- <div class="text-left font-weight-bold">
                        Grand Total 
                        <hr>
                    </div> -->
                    <div class="row text-left font-weight-bold" style="margin-top: 30px;">
                        <div class=" col">Grand Total</div>
                        <div class="col" style="text-align: end; display : none;" id="total-text">0</div>
                        <input type="hidden" id="grand" name="grand" value="" readonly>
                        <div class="col" style="text-align: end;" id="grand-text">0</div>
                    </div>
                    <hr>
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
        </div>
    <?php } ?>
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

<script>
    var countries = [];
    var item_list = [];
    // 
    // foreach ($res as $q) {
    //     echo "countries.push('" . $q->full_Name . "');";
    // }
        <?php
        foreach($pi as $pi) {
        echo "item_list.push('".base64_encode(json_encode($pi))."');".PHP_EOL;
      }
      ?>

function kirim_email(){
   form.attr('action','<?php echo base_url('purchase/edit_po_item/email'); ?>');
   console.log(form.attr('action'));
}

function submit_data(){
   form.attr('action','<?php echo base_url('purchase/edit_po_item'); ?>');
   console.log(form.attr('action'));
}

function preview_pdf(){
   form.attr('action','<?php echo base_url('purchase/preview_po_item'); ?>');
   form.attr('target','_blank');
   console.log(form.attr('action'));
}
</script>