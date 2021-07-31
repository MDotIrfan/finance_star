<div class="container" style="margin-top: 20px;margin-bottom: 20px;">
    <h1 style="font-family: 'Franklin Gothic Medium'; font-size:22px; color:black;">INVOICE</h1>
</div>
<nav aria-label="breadcrumb" class="container">
    <ol class="breadcrumb" style="font-size: 14px;background: #FFFFFF;">
        <li class="breadcrumb-item" style="color: #9598A3;">Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page" style="color:black;">Invoice</li>
    </ol>
</nav>
<?php $userdata = $this->session->userdata('user_logged'); ?>
<form method="POST" action="<?php echo base_url('freelance/add_inv_item'); ?>">
    <?php foreach ($res as $r) : ?>
        <div class="container justify-content-start" style="font-size: 18px;">
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

        <div class="container justify-content-start" style="font-size: 18px;">
            <div class="row">
                <div class="col">
                    <label for="cn">No. Invoice</label>
                    <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" readonly style="background: #E2EFFC;color:black;">
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
                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                        </div>
                        <input type="text" class="form-control form-control-user datepicker" id="id" name="invoicedate" style="background: #E2EFFC;color:black;">
                    </div>
                </div>
                <div class="col">
                    <label for="dd">No. NPWP</label>
                    <input type="" class="form-control form-control-user" id="ce" name="ce" aria-describedby="" placeholder="" value="<?php echo $r->no_npwp; ?>" style="background: #E2EFFC;color:black;">
                </div>


            </div>
        </div>

        <div class="container justify-content-start" style="font-size: 18px;margin-bottom: 15px;">
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
                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                        </div>
                        <input type="text" class="form-control form-control-user datepicker" id="dd" name="duedate" style="background: #E2EFFC;color:black;">
                    </div>
                </div>
                <div class="col">
                </div>


            </div>
        </div>

        <div class="container" style="border-radius: 10px; color:#000000;font: size 20px;">
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
                            <th>Amount IDR</th>
                        </tr>
                    </thead>
                    <tbody id="dinamisRow">
                        <div class="control-group after-add-more">
                        </div>
                </table>
            </div>

        </div>

        <div class="container justify-content-start" style="border-radius: 10px;">
            <div class="row">

                <div class="col-lg-7" style="width: 547px; height: 146px; margin-right: 80px">
                    <table class="table table-bordered shadow" width="547px" height="146px" style="border-radius: 10px;background-color: #FFFFFF;">
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
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="public_notes"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="regards"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="footer"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="address_resource"></textarea></td>
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
                <div class="col-lg-4" style="width: 464px;color:#222B45;font: size 18px;">
                    <div class=" row text-left font-weight-normal" style="width: 464px;">
                        <div class="col">Total Cost</div>
                        <div class="col">1000</div>
                    </div>
                    <hr>
                    <div class=" row text-left font-weight-normal" style="width: 464px;">
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
                        <div class="col"><span id="pajak"></span></div>
                    </div>
                    <hr>
                    <div class=" row text-left font-weight-bold" style="width: 464px;">
                        <div class="col">Grand Total</div>
                        <div class="col">1000</div>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"> <a href="<?php echo base_url('freelance/add_inv_item'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a></div>
                        <div class="col"><a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a></div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</form>
<?php endforeach; ?>