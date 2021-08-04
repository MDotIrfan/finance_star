 <div class="container-fluid">
     <div class="row align-items-start" style="margin-bottom: 25px;">
         <div class="col">
             <ol class=" breadcrumb breadcrumb-dot justify-content-start" style="font-size: 14px;background:transparent">
                 <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Home</li>
                 <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">BAST</li>
                 <li class="breadcrumb-item active justify-content-start" aria-current="page" style="color:black;">Edit BAST</li>
             </ol>
         </div>
     </div>
     <?php $userdata = $this->session->userdata('user_logged'); ?>
     <?php foreach ($bast as $b) { ?>
         <form method="POST" action="<?php echo base_url('finance/edit_bast_data'); ?>">
             <div class=" justify-content-start" style="font-size: 18px;">
                 <div class="row ">
                     <div class="col">
                         <label for="noquitation">No. BAST</label>
                         <input type="" style="background: #E2EFFC;color:#000000;" class="form-control form-control-user" id="nobast" name="nobast" aria-describedby="" placeholder="" value="<?= $b->id_bast ?>" readonly>
                     </div>
                     <div class="col">
                         <label for="ps">Type Of Work</label>
                         <input type="" style="color: #000000;" class="form-control form-control-user" id="swift" name="swift" aria-describedby="" placeholder="" value="<?= $b->type_of_work ?>">
                     </div>
                     <div class="col">
                         <label for="Duedate">Due Date</label>
                         <div class="input-group mb-2">
                             <div class="input-group-prepend">
                                 <!-- <div style="color: #000000;" class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div> -->
                             </div>
                             <input style="color: #000000;" type="date" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?= $b->due_date ?>">
                         </div>
                     </div>
                 </div>
             </div>

             <div class=" justify-content-start" style="font-size: 18px;">
                 <div class="row">
                     <div class="col">
                         <label for="noquitation">No. Invoice</label>
                         <input type="" style="color: #000000;background: #FFFFFF;" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $b->no_invoice ?>" readonly>
                     </div>
                     <div class="col">
                         <label for="Pm">Project Name</label>
                         <input type="" style="color: #000000;" class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" value="<?= $b->project_name ?>">
                     </div>
                     <div class="col">
                         <label for="dd">PIC Client</label>
                         <input type="" style="color: #000000;" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $b->pic_client ?>">
                     </div>


                 </div>
             </div>

             <div class=" justify-content-start" style="margin-bottom: 10px;font-size: 18px;">
                 <div class="row">
                     <div class="col">
                         <label for="cn">Perihal</label>
                         <input type="" style="color: #000000;" class="form-control form-control-user" id="perihal" name="perihal" aria-describedby="" placeholder="" value="<?= $b->perihal ?>">
                     </div>
                     <div class="col">
                         <label for="Pm">Company Name</label>
                         <input type="" style="color: #000000;" class="form-control form-control-user" id="company" name="company" aria-describedby="" placeholder="" value="<?= $b->company_name ?>">
                     </div>
                     <div class="col">
                         <label for="dd">Email</label>
                         <input type="" style="color: #000000;" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?= $b->email ?>">
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
                                     <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="first_party" id="first_party"><?= $b->first_party ?></textarea></td>
                                     <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="second_party" id="second_party"><?= $b->second_party ?></textarea></td>
                                 </tr>


                         </table>
                     </div>
                 </div>
                 <div class=" justify-content-center col-lg-8" style="margin-bottom: 50px;">
                     <div class="row row-cols-3">
                         <div class="col"></div>
                         <div class="col">
                             <a href="<?php echo base_url('finance/add_inv_out'); ?>">
                                 <button type="submit button" class="btn btn-success">
                                     <i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;
                                 </button>
                             </a>

                             <div class="col"></div>
                         </div>


                     </div>


                 </div>
             </div>
 </div>
 </form>
 <?php } ?>
 <script>
     var item_list = [];

     <?php
        foreach ($bi as $q) {
            echo "item_list.push('" . base64_encode(json_encode($q)) . "');" . PHP_EOL;
        }
        ?>
 </script>