<div class="container-fluid">
   <nav aria-label="breadcrumb" style="width:fit-content">
      <ol class="breadcrumb breadcrumb-dot" style="font-size: 14px;background:transparent;">
         <li class="breadcrumb-item" style="color: #9598A3;">Home</li>
         <li class="breadcrumb-item active" style="color:#9598A3;">Quotation</li>
         <li class="breadcrumb-item active" aria-current="page" style="color:black;">Create Quotation</li>
      </ol>
   </nav>
   <?php $userdata = $this->session->userdata('user_logged'); ?>
   <form autocomplete="off" action="" method="POST" id="myform" target="">
      <div class=" justify-content-start" style="font-size: 18px;">
         <div class="row ">
            <div class="col">
               <label for="noquitation">No Quitation</label>
               <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-init" id="noquitation" name="noquitation" aria-describedby="" placeholder="" value="<?= $kode_quotation ?>" readonly>
            </div>
            <div class="col">
               <label for="ps">Project name</label>
               <input type="" style="color:black;" class="form-control form-control-init" id="pm" name="pm" aria-describedby="" placeholder="" value="<?php echo set_value('pm')?>">
               <?php echo form_error('pm'); ?>
            </div>
            <div class="col">
               <label for="dd">Due Date</label>
               <!-- <input type="" class="form-control form-control-user" id="dd" name="dd" aria-describedby="" placeholder=""> -->
               <input type="date" style="color:black;" class="form-control form-control-init" name="dd" value="<?php $this->load->helper('date');
                                                                                                               $format = "%Y-%m-%d";
                                                                                                               echo @mdate($format); ?>">
            </div>
            <div class="col"></div>
         </div>
      </div>
      <div class=" justify-content-start" style="font-size: 18px;margin-bottom: 15px;">
         <div class="row">
            <div class="col">
               <label for="cn">Client Name</label>
               <input type="" style="color:black;" class="form-control form-control-init" id="cn" name="cn" aria-describedby="" placeholder="" value="<?php echo set_value('cn')?>">
               <?php echo form_error('cn'); ?>
               <input type="hidden" style="color:black;" class="form-control form-control-init" id="sn" name="sn" aria-describedby="" placeholder="" value="<?php echo $userdata->full_Name; ?>">
            </div>
            <div class="col">
               <label for="Pm">Project Start</label>
               <input type="date" style="color:black;" class="form-control form-control-init" name="ps" value="<?php $this->load->helper('date');

                                                                                                               $format = "%Y-%m-%d";
                                                                                                               echo @mdate($format); ?>">
            </div>
            <div class="col">
               <label for="dd">Client's Email</label>
               <input type="" style="color:black;" class="form-control form-control-init" id="ce" name="ce" aria-describedby="" placeholder="" value="<?php echo set_value('ce')?>">
               <?php echo form_error('ce'); ?>
            </div>
            <div class="col"></div>
         </div>
      </div>
      <div style="border-radius: 10px; color:#000000;font: size 20px;color:#222B45;">
         <div class="overflow-auto" style="border-radius: 10px; m-width:400px;">
            <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;">
               <thead>
                  <tr style="color:#000000; ">
                     <th>Job Description</th>
                     <th>
                        <select id="v_form" name="v_form" class="form-control font-weight-bold form-trans">
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
                        <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="IDR">
                        <select id="curr" name="curr" class="form-control font-weight-bold form-trans">
                           <option value="IDR" selected="selected">
                              Cost In IDR
                           </option>
                           <option value="USD">
                              Cost In US
                           </option>
                           <option value="EUR">
                              Cost In EURO
                           </option>
                        </select>
                     </th>
                     <th></th>
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
            <div class="col-lg-7" style="margin-right: 80px; min-width:500px;">
               <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;font-size: 18px; color:#222B45;font-weight: normal;">
                  <thead>
                     <tr>
                        <th>Public Notes</th>
                        <th>Header</th>
                        <th>Footer</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><textarea name="public_notes" class="form-control" style="border-color: #FFFFFF;color:black;"></textarea></td>
                        <td><textarea name="header" class="form-control" style="border-color: #FFFFFF;color:black;"></textarea></td>
                        <td><textarea name="footer" class="form-control" style="border-color: #FFFFFF;color:black;"></textarea></td>
                     </tr>
               </table>
            </div>

            <div class="col-lg-4">
               <!-- <div class="text-left">
                  Total Cost &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               </div>
               <hr> -->
               <div class="row text-left font-weight-normal" style="margin-top: 30px;">
                  <input type="hidden" id="total" name="total" value="0" readonly class="form-control font-weight-bold">
                  <div class=" col">Total Cost</div>
                  <div class="col" style="text-align: end;" id="total-text">0</div>
               </div>
               <hr>
               <div class="row text-left font-weight-bold" style="margin-top: 30px;">
                  <input type="hidden" id="grand" name="grand" value="0" readonly class="form-control font-weight-bold">
                  <div class=" col">Grand Total</div>
                  <div class="col" style="text-align: end;" id="grand-text">0</div>
               </div>
               <hr>
               <!-- <div class="text-left font-weight-bold">
                  Grand Total &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" id="grand" name="grand" value="0" readonly class="form-control font-weight-bold">
                  <hr>
               </div> -->
               <script>
                  var form = $('#myform');
               </script>
            </div>
            <div class="col-lg-9">
               <div class="row">
                  <div class="col"></div>
                  <div class="col"><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-save" onclick="submit_data()">Save</button></div>
                  <div class="col"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#emailModal" style="font-family: Poppins;font-style: normal;font-weight: normal;background: #F80909;background: #F80909;" id="email-send" onclick="kirim_email()">Send Email</button></div>
                  <div class="col"><button type="submit button" class="btn btn-primary" id="preview" onclick="preview_pdf()">Print</button></div>
                  <div class="col"></div>
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

         </div>
      </div>
</div>
</div>

</form>
<script>
   dinamisRow = $('#dinamisRow')
</script>
<script>
   var countries = [];

   <?php
   foreach ($client as $q) {
      echo "countries.push('" . $q->client_name . "');";
   }
   ?>
</script>
<script>
var bdn = document.querySelector('#email-send');
bdn.addEventListener(onclick, function() {
   form.attr('action','<?php echo base_url('quitation/add_quitation/email'); ?>');
   console.log(form.attr('action'));
});

function kirim_email(){
   form.attr('action','<?php echo base_url('quitation/add_quitation/email'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function submit_data(){
   form.attr('action','<?php echo base_url('quitation/add_quitation'); ?>');
   form.attr('target','');
   console.log(form.attr('action'));
}

function preview_pdf(){
   form.attr('action','<?php echo base_url('quitation/preview'); ?>');
   form.attr('target','_blank');
   console.log(form.attr('action'));
}
</script>