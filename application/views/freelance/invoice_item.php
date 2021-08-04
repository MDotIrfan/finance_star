<div class="container-fluid">
    <nav aria-label="breadcrumb" class="">
        <ol class="breadcrumb" style="font-size: 14px;background:transparent;">
            <li class="breadcrumb-item" style="color: #9598A3;">Dashboard</li>
            <li class="breadcrumb-item active" aria-current="page" style="color:black;">Invoice</li>
        </ol>
    </nav>
    <?php $userdata = $this->session->userdata('user_logged'); ?>
    <form method="POST" action="" target="" id="myform">
        <?php foreach ($res as $r) : ?>
            <div class=" justify-content-start" style="font-size: 18px;">
                <div class="row ">
                    <div class="col" style="font-size: 18px;">
                        <label for="noquitation">No. Purchase Order</label>
                        <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status" style="background: #E2EFFC;color:black;">
                            <option value="">-</option>
                            <?php foreach ($po as $q) : ?>
                                <option value="<?php echo $q->no_Po; ?>"> <?php echo $q->no_Po; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="ps">Cabang Bank</label>
                        <input type="" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="" value="<?php echo $r->cabang_bank; ?>" style="background: #E2EFFC;color:black;">
                    </div>
                    <div class="col">
                        <label for="Duedate">Down Payment </label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control form-control-user" id="dp" name="dp" style="background: #E2EFFC;color:black;">
                        </div>
                    </div>
                    <div class="col">
                        <label for="Duedate">Email</label>
                        <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?php echo $userdata->email_Address; ?>" style="background: #E2EFFC;color:black;">
                    </div>
                </div>
            </div>

            <div class=" justify-content-start" style="font-size: 18px;">
                <div class="row">
                    <div class="col">
                        <label for="cn">No. Invoice</label>
                        <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" readonly style="background: #E2EFFC;color:black;">
                        <input class="form-control form-control-user" id="company" name="company" aria-describedby="" placeholder="" type="hidden">
                    </div>
                    <div class="col">
                        <label for="Pm">Mitra Name</label>
                        <input type="" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="" value="<?php echo $userdata->full_Name; ?>" style="background: #E2EFFC;color:black;">
                        <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="item">
                    </div>
                    <div class="col">
                        <label for="Duedate">Invoice Date </label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <!-- <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div> -->
                            </div>
                            <input type="date" class="form-control form-control-user datepicker" id="id" name="invoicedate" style="background: #E2EFFC;color:black;" value="<?php $this->load->helper('date');
                                                                                                                                                                            $format = "%Y-%m-%d";
                                                                                                                                                                            echo @mdate($format); ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="dd">No. NPWP</label>
                        <input type="" class="form-control form-control-user" id="ce" name="ce" aria-describedby="" placeholder="" value="<?php echo $r->no_npwp; ?>" style="background: #E2EFFC;color:black;">
                    </div>


                </div>
            </div>

            <div class=" justify-content-start" style="font-size: 18px;margin-bottom: 15px;">
                <div class="row">
                    <div class="col">
                        <label for="cn">No. Rekening </label>
                        <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?php echo $r->no_rekening; ?>" style="background: #E2EFFC;color:black;">
                    </div>
                    <div class="col">
                        <label for="Pm">Address</label>
                        <input type="" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?php echo $r->address; ?>" style="background: #E2EFFC;color:black;">
                    </div>
                    <div class="col">
                        <label for="Duedate">Due Date </label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <!-- <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div> -->
                            </div>
                            <input type="date" class="form-control form-control-user datepicker" id="dd" name="duedate" style="background: #E2EFFC;color:black;" value="<?php $this->load->helper('date');
                                                                                                                                                                        $format = "%Y-%m-%d";
                                                                                                                                                                        echo @mdate($format); ?>">
                        </div>
                    </div>
                    <div class="col">
                    </div>


                </div>
            </div>

            <div class="" style="border-radius: 10px; color:#000000;font: size 20px;">
                <div>
                    <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;">

                        <thead>
                            <tr style="color: #000000; ">
                                <th>Job Description</th>
                                <th><select id="v_form" name="v_form" class="form-control font-weight-bold" style="color: #000000; ">
                                        <option value="0" selected="selected">
                                            Volume
                                        </option>
                                        <option value="1">
                                            Item
                                        </option>
                                    </select></th>
                                <th>Unit</th>
                                <th>Rate</th>
                                <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="IDR">
                        <th style="" id="curr">Amount IDR</th>
                            </tr>
                        </thead>
                        <tbody id="dinamisRow">
                            <div class="control-group after-add-more">
                            </div>
                    </table>
                </div>

            </div>

            <div class=" justify-content-start" style="border-radius: 10px;">
                <div class="row">

                    <div class="col-lg-7" style="margin-right: 80px">
                        <table class="table table-bordered shadow" width="547px" height="146px" style="border-radius: 10px;background-color: #FFFFFF;font-size: 18px; color:#222B45;font-weight: normal;">
                            <thead>
                                <tr>
                                    <th>Public Notes</th>
                                    <th>Trems</th>
                                    <th>Signature</th>
                                    <th>Footer</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <td colspan="4"></td> -->
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="public_notes"></textarea></td>
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="regards"></textarea></td>
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="footer"></textarea></td>
                                    <td><textarea class="form-control form-control-user" style="border-color: #FFFFFF;color:black;" name="address_resource"></textarea></td>
                                </tr>
                        </table>
                    </div>
                    <!-- <div class="col-lg-4" style="width: 464px;">
               <div class="text-left font-weight-bold" style="width: 464px;">
                  Total Cost <span>1000</span><input type="text" id="total" name="total" value="" readonly hidden>

                  <hr>
                  <script>
                     var jenis = '';
                  </script>
                  <?php if ($userdata->id_Status == '1') {
                        if ($r->jenis == 'biasa') {
                            if ($r->no_npwp <> NULL) {
                                echo 'PPh 21 (- 5%) <script>jenis=`fdn`</script>';
                            } else {
                                echo 'PPh 21 (- 6%) <script>jenis=`ftn`</script>';
                            }
                        } else if ($r->jenis == 'tenaga ahli') {
                            if ($r->no_npwp <> NULL) {
                                echo 'PPh 21 (- 50% x 5%) <script>jenis=`tadn`</script>';
                            } else {
                                echo 'PPh 21 (- 50% x 5% x 120%) <script>jenis=`tatn`</script>';
                            }
                        }
                    } else {
                        echo 'PPh 23 (- 2%) <script>jenis=`vendor`</script>';
                    }; ?>
                  <span id="pajak"></span>
                  <hr>
                  Grand Total <span style="text-align: right;">1000</span>
                  <hr>
               </div>
            </div> -->
                    <div class="col-lg-4" style="color:#222B45;font: size 18px;">
                        <div class=" row text-left font-weight-normal" style="">
                        <input type="hidden" id="total" name="total" value="0" readonly class="form-control font-weight-bold">
                     <div class="col">Total Cost</div>
                     <div class="col" style="text-align: end;" id="total-text">0</div>
                        </div>
                        <hr>
                        <div class=" row text-left font-weight-normal" style="">
                            <div class="col">
                                <script>
                                    var jenis = '';
                                </script>
                                <?php if ($userdata->id_Status == '1') {
                                    if ($r->jenis == 'biasa') {
                                        if ($r->no_npwp <> NULL) {
                                            echo 'PPh 21 (- 5%) <script>jenis=`fdn`</script>';
                                        } else {
                                            echo 'PPh 21 (- 6%) <script>jenis=`ftn`</script>';
                                        }
                                    } else if ($r->jenis == 'tenaga ahli') {
                                        if ($r->no_npwp <> NULL) {
                                            echo 'PPh 21 (- 50% x 5%) <script>jenis=`tadn`</script>';
                                        } else {
                                            echo 'PPh 21 (- 50% x 5% x 120%) <script>jenis=`tatn`</script>';
                                        }
                                    }
                                } else {
                                    echo 'PPh 23 (- 2%) <script>jenis=`vendor`</script>';
                                }; ?>

                            </div>
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
<?php endforeach; ?>
<script>
        var countries = [];
        // <?php
        // foreach ($res as $q) {
        //     echo "countries.push('" . $q->full_Name . "');";
        // }
        // ?>

function kirim_email(){
   form.attr('action','<?php echo base_url('freelance/add_inv_item/email'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function submit_data(){
   form.attr('action','<?php echo base_url('freelance/add_inv_item'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function preview_pdf(){
   form.attr('action','<?php echo base_url('freelance/preview_inv_word'); ?>');
   form.attr('target','_blank');
   console.log(form.attr('action'));
}
        
    </script>