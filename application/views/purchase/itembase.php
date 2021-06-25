<?php $userdata = $this->session->userdata('user_logged'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Purchase Order</a></li>
        <li class="breadcrumb-item active" aria-current="page">ItemBase</li>
    </ol>
</nav>
<form method="POST" autocomplete="off" action="<?php echo base_url('purchase/add_po_item'); ?>">
    <div class="container justify-content-start">
        <div class="row ">
            <div class="col">
                <label for="noquitation">No Purchase Order</label>
                <input type="" class="form-control form-control-user" id="noquitation" name="nopo" aria-describedby="" placeholder="" value="<?= $kode_po ?>" readonly>
            </div>
            <div class="col">
                <label for="ps">Resource Name</label>
                <input type="" class="form-control form-control-user" id="rn" name="rn" aria-describedby="" placeholder="">
            </div>
            <div class="col">
                <label for="ps">Mobile Phone</label>
                <input type="" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="">
            </div>
            <div class="col">
                <label for="pn">Project Name</label>
                <input class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" type="text">
                <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="item">
            </div>

        </div>
    </div>
    <br>
    <div class="container justify-content-start">
        <div class="row">
            <div class="col">
                <label for="cn">PM Name</label>
                <input type="" class="form-control form-control-user" id="pmn" name="pmn" aria-describedby="" placeholder="" value="<?php echo $userdata->full_Name; ?>">
            </div>
            <div class="col">
                <label for="Pm">Resource Email</label>
                <input type="" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="">
            </div>
            <div class="col">
                <label for="dd">Date </label>
                <input type="date" class="form-control form-control-user" name="tgl" value="<?php $this->load->helper('date');

                                                                                            $format = "%Y-%m-%d";
                                                                                            echo @mdate($format); ?>">
            </div>
            <div class="col">
                <label for="dd">No. Quotation</label>
                <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
                    <option value="">-</option>
                    <?php foreach ($q as $q) : ?>
                        <option value="<?php echo $q->no_Quotation; ?>"> <?php echo $q->no_Quotation; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>
    </div>
    <br>
    <div class="container justify-content-start">
        <div class="row">
            <div class="col">
                <label for="cn">PM Email</label>
                <input type="" class="form-control form-control-user" id="cn" name="pme" aria-describedby="" placeholder="" value="<?php echo $userdata->email_Address; ?>">
            </div>
            <div class="col">
                <label for="Pm">Resource Status</label>
                <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="rs" name="rs">
                    <?php foreach ($position as $p) : ?>
                        <option value="<?php echo $p->status_Name; ?>"> <?php echo $p->status_Name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>


        </div>
    </div>
    <hr>
    <div class="col-lg-12" style="margin-left:auto;margin-right:auto">
        <div>
            <table class="table table-bordered shadow-lg" id="dynamicAddRemove">
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
                    <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="IDR">
                     <select id="curr" name="curr" class="form-control font-weight-bold">
                     <option value="IDR" selected="selected">
                           Cost in IDR
                        </option>
                        <option value="USD">
                        Cost in USD
                        </option>
                        <option value="EUR">
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
    <hr>
    <div class="col-lg-12" style="margin-left:auto;margin-right:auto">
        <div class="row">
            <div class="col-lg-8" style="margin-left:auto;margin-right:auto">
                <div>
                    <table class="table table-bordered shadow" style="">
                        <thead>
                            <tr>
                                <th>Public Notes</th>
                                <th>Regards</th>
                                <th>Footer</th>
                                <th>Address Resource</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><textarea name="public_notes"></textarea></td>
                                <td><textarea name="regards"></textarea></td>
                                <td><textarea name="footer"></textarea></td>
                                <td><textarea name="address_resource"></textarea></td>
                            </tr>


                    </table>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="<?php echo base_url('purchase/add_po_item'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
            <a>&emsp;&emsp;</a>
            <a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
                </div>
            </div>
            <div class="col-lg-4">
                <hr>
                <div class="text-left font-weight-bold">
                    Grand Total <input type="text" id="grand" name="grand" value="" readonly>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>

<script>
  var countries = [];
  <?php
    foreach($res as $q) {
      echo "countries.push('".$q->full_Name."');";
    }
  ?>
  </script>