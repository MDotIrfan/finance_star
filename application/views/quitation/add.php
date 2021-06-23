<?php $userdata = $this->session->userdata('user_logged'); ?>
<form autocomplete="off" method="POST" action="<?php echo base_url('quitation/add_quitation'); ?>">
   <div class="container justify-content-start">
      <div class="row ">
         <div class="col">
            <label for="noquitation">No Quitation</label>
            <input type="" class="form-control form-control-user" id="noquitation" name="noquitation" aria-describedby="" placeholder="" value="<?= $kode_quotation ?>" readonly>
         </div>
         <div class="col">
            <label for="ps">Project name</label>
            <input type="" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="">
         </div>
         <div class="col">
            <label for="dd">Due Date</label>
            <!-- <input type="" class="form-control form-control-user" id="dd" name="dd" aria-describedby="" placeholder=""> -->
            <input type="date" class="form-control form-control-user" name="dd" value="<?php $this->load->helper('date');
                                                                                       $format = "%Y-%m-%d";
                                                                                       echo @mdate($format); ?>">
         </div>
      </div>
   </div>
   <div class="container justify-content-start">
      <div class="row">
         <div class="col">
            <label for="cn">Client Name</label>
            <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="">
            <input type="hidden" class="form-control form-control-user" id="sn" name="sn" aria-describedby="" placeholder="" value="<?php echo $userdata->full_Name; ?>">
         </div>
         <div class="col">
            <label for="Pm">Project Start</label>
            <input type="date" class="form-control form-control-user" name="ps" value="<?php $this->load->helper('date');

                                                                                       $format = "%Y-%m-%d";
                                                                                       echo @mdate($format); ?>">
         </div>
         <div class="col">
            <label for="dd">Client's Email</label>
            <input type="" class="form-control form-control-user" id="ce" name="ce" aria-describedby="" placeholder="">
         </div>
      </div>
   </div>
   <hr>
   <div class="col-lg-12">
      <div>
         <table class="table table-bordered shadow-lg" id="dynamicAddRemove">
            <!-- <table id=" example" class="display" style="width:100%"> -->
            <thead>
               <tr>
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

                     <select id="cost" name="cost" class="form-control font-weight-bold">
                        <option value="IDR" selected="selected">
                           Cost In IDR
                        </option>
                        <option value="US">
                           Cost In US
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
      <hr>
      <div class="row">
         <div class="col-lg-6">
            <div>
               <table class="table table-bordered shadow">
                  <thead>
                     <tr>
                        <th>Public Notes</th>
                        <th>Header</th>
                        <th>Footer</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><textarea name="public_notes" class="form-control"></textarea></td>
                        <td><textarea name="header" class="form-control"></textarea></td>
                        <td><textarea name="footer" class="form-control"></textarea></td>
                     </tr>
               </table>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="text-left">
               Total Cost &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" id="total" name="total" value="0" readonly class="form-control font-weight-bold">
            </div>
            <hr>
            <div class="text-left font-weight-bold">
               Grand Total &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" id="grand" name="grand" value="0" readonly class="form-control font-weight-bold">
               <hr>
            </div>
         </div>
      </div>
   </div>
   <div class="d-grid gap-2 d-md-flex justify-content-md-center">

               <a href=""><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
               <a>&emsp;&emsp;</a>
               <a href=""><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
            </div>
</form>
<script>
dinamisRow = $('#dinamisRow')
            </script>
            <script>
  var countries = [];

  <?php
    foreach($client as $q) {
      echo "countries.push('".$q->client_name."');";
    }
  ?>
  </script>
