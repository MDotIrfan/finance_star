<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Purchase Order</a></li>
        <li class="breadcrumb-item active" aria-current="page">WordBase</li>
    </ol>
</nav>
<?php foreach ($pi as $pi) { ?>
<form method="POST" autocomplete=off action="<?php echo base_url('purchase/edit_po_word');?>">
<div class="container justify-content-start">
    <div class="row ">
    <div class="col">
            <label for="noquitation">No Purchase Order</label>
            <input type="" class="form-control form-control-user" id="nopo" name="nopo" aria-describedby="" placeholder="" value="<?= $pi->no_Po ?>" readonly>
        </div>
        <div class="col">
            <label for="ps">Resource Name</label>
            <input type="" class="form-control form-control-user" id="rn" name="rn" aria-describedby="" placeholder="" value="<?= $pi->resource_Name ?>">
        </div>
        <div class="col">
            <label for="ps">Mobile Phone</label>
            <input type="" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="" value="<?= $pi->mobile_Phone ?>">
        </div>
        <div class="col">
            <label for="dd">Project Name</label>
            <input class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" type="text" value="<?= $pi->project_Name?>">
            <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="word">
        </div>

    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
    <div class="col">
                    <label for="cn">PM Name</label>
                    <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $pi->nama_Pm ?>">
                </div>
                <div class="col">
                    <label for="Pm">Resource Email</label>
                    <input type="" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="" value="<?= $pi->resource_Email ?>">
                </div>
        <div class="col">
            <label for="Duedate">Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="date" name="date" value="<?= $pi->date ?>">
            </div>
        </div>
        <div class="col">
            <label for="dd">Type PO</label>
            <input type="text" class="form-control form-control-user" id="tipe_Po" name="tipe_Po" aria-describedby="" placeholder="" list="typepo" value="<?php 
            if($pi->tipe_Po==1){
                echo 'Trados';
            } else if($pi->tipe_Po==2){
                echo 'Transit, XTM, etc.';
            } else if($pi->tipe_Po==3){
                echo 'Patent';
            } else if($pi->tipe_Po==4){
                echo 'Google MT';
            } 
            ?>">
        </div>

    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
    <div class="col">
            <label for="cn">PM Email</label>
            <input type="" class="form-control form-control-user" id="pme" name="pme" aria-describedby="" placeholder="" value="<?= $pi->email_pm?>">
        </div>
        <div class="col">
            <label for="Pm">Resource Status</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="rs" name="rs">
            <?php foreach ($position as $p) {
                                                $selected = ($p->status_Name == $pi->resource_Status) ? "selected" : "";
                                                echo '<option ' . $selected . ' value="' . $p->status_Name . '">' . $p->status_Name . '</option>';
                                            } ?>
                                    </select>
        </div>
        <div class="col">
            <label for="dd">Rate</label>
            <input type="" class="form-control form-control-user" id="rate" name="rate" aria-describedby="" placeholder="" value="<?= $pi->rate ?>">
        </div>
        <div class="col">
            <label for="dd">No. Quotation</label>
            <input type="" class="form-control form-control-user" id="ce" name="status" aria-describedby="" placeholder="" value="<?= $pi->id_quotation ?>" readonly>
        </div>

    </div>
</div>
<hr>
<div class="col-lg-8" style="margin-left:auto;margin-right:auto">
    <div>
        <table class="table table-bordered shadow-lg">
            <!-- <table id=" example" class="display" style="width:100%"> -->
            <thead>
                <tr>
                    <th>Match Word</th>
                    <th>Word Count</th>
                    <th>Weight</th>
                    <th><input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="<?= $pi->currency ?>">
                     <select id="curr" name="curr" class="form-control font-weight-bold">
                     <option value="IDR" <?php if($pi->currency=='IDR') {echo 'selected';}?>>
                           Cost In IDR
                        </option>
                        <option value="USD" <?php if($pi->currency=='USD') {echo 'selected';}?>>
                           Cost In US
                        </option>
                        <option value="EUR" <?php if($pi->currency=='EUR') {echo 'selected';}?>>
                           Cost In EURO
                        </option>
                                </select>
                    </th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <td><input type="text" style="width:180px;" id="mw1" name="mw1" value="<?php 
            if($pi->tipe_Po==4){
                echo '-';
            } else {
                echo 'Locked';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc1" name="wc1" class="form-control" oninput="hitung()" value="<?= $pi->locked ?>"></td>
                    <td><input type="text" style="width:150px;" id="w1" name="w1" value="<?php 
            if($pi->tipe_Po==1){
                echo '0';
            } else if($pi->tipe_Po==2){
                echo '0';
            } else if($pi->tipe_Po==3){
                echo '0';
            } else if($pi->tipe_Po==4){
                echo '0';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc1" name="wwc1" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw2" name="mw2" value="<?php 
            if($pi->tipe_Po==4){
                echo '-';
            } else {
                echo 'Repetitions';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc2" name="wc2" value="<?= $pi->repetitions ?>" class="form-control" oninput="hitung()" ></td>
                    <td><input type="text" style="width:150px;" id="w2" name="w2" value="<?php 
            if($pi->tipe_Po==1){
                echo '0';
            } else if($pi->tipe_Po==2){
                echo '15';
            } else if($pi->tipe_Po==3){
                echo '0';
            } else if($pi->tipe_Po==4){
                echo '0';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc2" name="wwc2" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw3" name="mw3" value="<?php 
            if($pi->tipe_Po==4){
                echo 'ICE Match';
            } else {
                echo 'Fuzzy 100% / CM';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc3" name="wc3" value="<?= $pi->fuzzy100 ?>" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w3" name="w3" value="<?php 
            if($pi->tipe_Po==1){
                echo '0';
            } else if($pi->tipe_Po==2){
                echo '0';
            } else if($pi->tipe_Po==3){
                echo '0';
            } else if($pi->tipe_Po==4){
                echo '0';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc3" name="wwc3" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw4" name="mw4" value="<?php 
            if($pi->tipe_Po==4){
                echo 'Repetitions';
            } else {
                echo 'Fuzzy 95% - 99%';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc4" name="wc4" value="<?= $pi->fuzzy95 ?>" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w4" name="w4" value="<?php 
            if($pi->tipe_Po==1){
                echo '30';
            } else if($pi->tipe_Po==2){
                echo '30';
            } else if($pi->tipe_Po==3){
                echo '30';
            } else if($pi->tipe_Po==4){
                echo '10';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc4" name="wwc4" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw5" name="mw5" value="<?php 
            if($pi->tipe_Po==4){
                echo 'Fuzzy 100%';
            } else {
                echo 'Fuzzy 85% - 94%';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc5" name="wc5" value="<?= $pi->fuzzy85 ?>" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w5" name="w5" value="<?php 
            if($pi->tipe_Po==1){
                echo '50';
            } else if($pi->tipe_Po==2){
                echo '50';
            } else if($pi->tipe_Po==3){
                echo '50';
            } else if($pi->tipe_Po==4){
                echo '10';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc5" name="wwc5" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw6" name="mw6" value="<?php 
            if($pi->tipe_Po==4){
                echo '99% - 76% (High Fuzzy)';
            } else {
                echo 'Fuzzy 75% - 84';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc6" name="wc6" value="<?= $pi->fuzzy75 ?>" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w6" name="w6" value="<?php 
            if($pi->tipe_Po==1){
                echo '70';
            } else if($pi->tipe_Po==2){
                echo '70';
            } else if($pi->tipe_Po==3){
                echo '70';
            } else if($pi->tipe_Po==4){
                echo '25';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc6" name="wwc6" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw7" name="mw7" value="<?php 
            if($pi->tipe_Po==4){
                echo '75% - 0% (New Words)';
            } else {
                echo 'Fuzzy 50% - 74%';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc7" name="wc7" value="<?= $pi->fuzzy50 ?>" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w7" name="w7" value="<?php 
            if($pi->tipe_Po==1){
                echo '100';
            } else if($pi->tipe_Po==2){
                echo '100';
            } else if($pi->tipe_Po==3){
                echo '100';
            } else if($pi->tipe_Po==4){
                echo '100';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc7" name="wwc7" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw8" name="mw8" value="<?php 
            if($pi->tipe_Po==4){
                echo 'MT';
            } else {
                echo 'New';
            }
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc8" name="wc8" value="<?= $pi->new ?>" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w8" name="w8" value="<?php 
            if($pi->tipe_Po==1){
                echo '100';
            } else if($pi->tipe_Po==2){
                echo '100';
            } else if($pi->tipe_Po==3){
                echo '80';
            } else if($pi->tipe_Po==4){
                echo '70';
            } 
            ?>" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc8" name="wwc8" value="" class="form-control"></td>

                </tr>

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
                                    <td><textarea name="public_notes" class="form-control"><?= $pi->public_Notes ?></textarea></td>
                                    <td><textarea name="regards" class="form-control"><?= $pi->regards ?></textarea></td>
                                    <td><textarea name="footer" class="form-control"><?= $pi->footer ?></textarea></td>
                                    <td><textarea name="address_resource" class="form-control"><?= $pi->address_Resource ?></textarea></td>
                                </tr>


            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">

            <a href="<?php echo base_url('purchase/edit_po_word'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
            <a>&emsp;&emsp;</a>
            <a href="<?php echo base_url('wordbase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
        </div>
    </div>
    <div class="col-lg-6">
        <hr>
        <div class="text-left font-weight-bold">
        Grand Total <input type="text" id="grand" name="grand" value="<?= $pi->grand_Total ?>" readonly class="form-control">
            <hr>
        </div>
    </div>
</div>
</div>
<?php } ?>
<script>
  var countries = [];
  <?php
    foreach($res as $q) {
      echo "countries.push('".$q->full_Name."');";
    }
  ?>
  </script>