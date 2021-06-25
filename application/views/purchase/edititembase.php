<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Purchase Order</a></li>
        <li class="breadcrumb-item active" aria-current="page">ItemBase</li>
    </ol>
</nav>
<?php foreach ($po as $po) { ?>
<form method="POST" autocomplete=off action="<?php echo base_url('purchase/edit_po_item');?>">
<div class="container justify-content-start">
    <div class="row ">
        <div class="col">
            <label for="noquitation">No Purchase Order</label>
            <input type="" class="form-control form-control-user" id="nopo" name="nopo" aria-describedby="" placeholder="" value="<?= $po->no_Po?>" readonly>
        </div>
        <div class="col">
            <label for="ps">Resource Name</label>
            <input type="" class="form-control form-control-user" id="rn" name="rn" aria-describedby="" placeholder="" value="<?= $po->resource_Name?>">
        </div>
        <div class="col">
            <label for="ps">Mobile Phone</label>
            <input type="" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="" value="<?= $po->mobile_Phone?>">
        </div>
        <div class="col">
            <label for="dd">Project Name</label>
            <input class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" type="text" value="<?= $po->project_Name?>">
            <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="item">
        </div>

            </div>
        </div>
        <br>
        <div class="container justify-content-start">
            <div class="row">
                <div class="col">
                    <label for="cn">PM Name</label>
                    <input type="" class="form-control form-control-user" id="pmn" name="pmn" aria-describedby="" placeholder="" value="<?= $po->nama_Pm ?>">
                </div>
                <div class="col">
                    <label for="Pm">Resource Email</label>
                    <input type="" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="" value="<?= $po->resource_Email ?>">
                </div>
                <div class="col">
            <label for="dd">Date </label>
            <input type="date"  class="form-control form-control-user" name="tgl" value="<?= $po->date?>">
        </div>
        <div class="col">
            <label for="dd">No. Quotation</label>
            <input type="" class="form-control form-control-user" id="ce" name="status" aria-describedby="" placeholder="" value="<?= $po->id_quotation?>" readonly>
        </div>

    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">PM Email</label>
            <input type="" class="form-control form-control-user" id="pme" name="pme" aria-describedby="" placeholder="" value="<?= $po->email_pm?>">
        </div>
        <div class="col">
            <label for="Pm">Resource Status</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="rs" name="rs">
            <?php foreach ($position as $p) {
                                                $selected = ($p->status_Name == $po->resource_Status) ? "selected" : "";
                                                echo '<option ' . $selected . ' value="' . $p->status_Name . '">' . $p->status_Name . '</option>';
                                            } ?>
                                    </select>
        </div>
        <div class="col">
        </div>
        <div class="col">
        </div>
        <br>
        <hr>
        <div class="col-lg-12" style="margin-left:auto;margin-right:auto">
            <div>
                <table class="table table-bordered shadow-lg" id="dynamicAddRemove">
                    <thead>
                        <tr>
                            <th>Job Description</th>
                            <th>
                            <select id="v_form" name="v_form" class="form-control font-weight-bold">
                                    <option value="0" <?php if($po->v_form==0) {echo 'selected';} ?>>
                                        Volume
                                    </option>
                                    <option value="1" <?php if($po->v_form==1) {echo 'selected';} ?>>
                                        Item
                                    </option>

                                </select>
                            </th>
                            <th>Unit</th>
                            <th>Price/Unit</th>
                            <th><input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="<?= $po->currency ?>">
                     <select id="curr" name="curr" class="form-control font-weight-bold">
                     <option value="IDR" <?php if($po->currency=='IDR') {echo 'selected';}?>>
                           Cost In IDR
                        </option>
                        <option value="USD" <?php if($po->currency=='USD') {echo 'selected';}?>>
                           Cost In US
                        </option>
                        <option value="EUR" <?php if($po->currency=='EUR') {echo 'selected';}?>>
                           Cost In EURO
                        </option>
                                </select>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dinamisRow">
                </table>
            </div>

        </div>
        <hr>
        <div class="col-lg-12" style="margin-left:auto;margin-right:auto">
            <div class="row">
                <div class="col-lg-8" style="margin-left:auto;margin-right:auto">
                    <div>
                        <table class="table table-bordered shadow">
                            <thead>
                                <tr>
                                    <th>Public Notes</th>
                                    <th>Regards</th>
                                    <th>Footer</th>
                                    <th>Address Resource</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><textarea name="public_notes" class="form-control"><?= $po->public_Notes ?></textarea></td>
                                    <td><textarea name="regards" class="form-control"><?= $po->regards ?></textarea></td>
                                    <td><textarea name="footer" class="form-control"><?= $po->footer ?></textarea></td>
                                    <td><textarea name="address_resource" class="form-control"><?= $po->address_Resource ?></textarea></td>
                                </tr>


                        </table>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="<?php echo base_url('itembase/save'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
                        <a>&emsp;&emsp;</a>
                        <a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <hr>
                    <div class="text-left font-weight-bold">
                        Grand Total <input type="text" id="grand" name="grand" value="<?= $po->grand_Total ?>" readonly class="form-control">
                        <hr>
                    </div>
                </div>
            </div>
</div>
</div>
</div>
<?php } ?>
<script>
  var item_list = [];

  <?php
    foreach($pi as $q) {
      echo "item_list.push('".base64_encode(json_encode($q))."');".PHP_EOL;
    }
  ?>
</script>
<script>
  var countries = [];
  <?php
    foreach($res as $q) {
      echo "countries.push('".$q->full_Name."');";
    }
  ?>
  </script>
