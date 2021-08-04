 <div class="container-fluid">
     <div class="row align-items-start" style="margin-bottom: 25px;">
         <div class="col">
             <ol class=" breadcrumb breadcrumb-dot justify-content-start" style="font-size: 14px;background:transparent">
                 <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Home</li>
                 <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">BAST</li>
                 <li class="breadcrumb-item active justify-content-start" aria-current="page" style="color:black;">Create BAST</li>
             </ol>
         </div>
     </div>
     <?php $userdata = $this->session->userdata('user_logged'); ?>
     <form method="POST" action="<?php echo base_url('finance/add_bast_data'); ?>">
         <div class=" justify-content-start" style="font-size: 18px;">
             <div class="row ">
                 <div class="col">
                     <label for="noquitation">No. BAST</label>
                     <input type="" style="background: #E2EFFC;color:#000000;" class="form-control form-control-user" id="nobast" name="nobast" aria-describedby="" placeholder="" value="<?= $kode_bast ?>" readonly>
                 </div>
                 <div class="col">
                     <label for="ps">Type Of Work</label>
                     <input type="" style="color: #000000;" class="form-control form-control-user" id="swift" name="swift" aria-describedby="" placeholder="">
                 </div>
                 <div class="col">
                     <label for="Duedate">Due Date</label>
                     <div class="input-group mb-2">
                         <div class="input-group-prepend">
                             <!-- <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div> -->
                         </div>
                         <input type="date" style="color: #000000;" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?php $this->load->helper('date');
                                                                                                                                                    $format = "%Y-%m-%d";
                                                                                                                                                    echo @mdate($format); ?>">
                     </div>
                 </div>
             </div>
         </div>

         <div class=" justify-content-start" style="font-size: 18px;">
             <div class="row">
                 <div class="col">
                     <label for="noquitation">No. Invoice</label>
                     <select style="color: #000000;" class="form-control form-control-user" aria-label=".form-select-lg example" id="noinv" name="noinv">
                         <option value="">-</option>
                         <?php foreach ($inv as $q) : ?>
                             <option value="<?php echo $q->no_invoice; ?>"> <?php echo $q->no_invoice; ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col">
                     <label for="Pm">Project Name</label>
                     <input type="" style="color: #000000;" class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="">
                 </div>
                 <div class="col">
                     <label for="dd">PIC Client</label>
                     <input type="" style="color: #000000;" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="">
                 </div>


             </div>
         </div>

         <div class=" justify-content-start" style="margin-bottom: 10px;font-size: 18px;">
             <div class="row">
                 <div class="col">
                     <label for="cn">Perihal</label>
                     <input type="" style="color: #000000;" class="form-control form-control-user" id="perihal" name="perihal" aria-describedby="" placeholder="">
                 </div>
                 <div class="col">
                     <label for="Pm">Company Name</label>
                     <input type="" style="color: #000000;" class="form-control form-control-user" id="company" name="company" aria-describedby="" placeholder="">
                 </div>
                 <div class="col">
                     <label for="dd">Email</label>
                     <input type="" style="color: #000000;" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="">
                 </div>
             </div>
         </div>

         <div class="" style="border-radius: 10px; color:#000000;font: size 20px;">
             <div>
                 <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;">
                     <thead>
                         <tr style="border-radius: 10px;background-color: #FFFFFF;font-size: 18px; color:#222B45;font-weight: normal;">
                             <th>Item</th>
                             <th>Quantity</th>
                             <th>Unit</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                     <tbody id="dinamisRow">

                 </table>
             </div>

         </div>


         <div class=" " style="border-radius: 10px;color:#222B45;">
             <div class="row">
                 <div class="col-lg-8">
                     <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;font-size: 18px; color:#222B45;font-weight: normal;">
                         <thead>
                             <tr>
                                 <th>The first party</th>
                                 <th>The second party</th>

                         </thead>
                         <tbody>
                             <tr>
                                 <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="first_party" id="first_party"></textarea></td>
                                 <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="second_party" id="second_party"></textarea></td>
                             </tr>


                     </table>
                 </div>


             </div>
             <div class=" justify-content-center col-lg-8" style="margin-bottom: 50px;">
                 <div class="row row-cols-3">
                     <div class="col"></div>
                     <div class="col"><a href="<?php echo base_url('finance/add_inv_out'); ?>">
                             <button type="submit button" class="btn btn-success">
                                 <i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;
                             </button>
                         </a></div>
                     <div class="col"></div>
                 </div>


             </div>
         </div>
 </div>
 </div>

 </form>