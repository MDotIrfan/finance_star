<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Purchase Order</a></li>
        <li class="breadcrumb-item active" aria-current="page">WordBase</li>
    </ol>
</nav>
<?php $userdata = $this->session->userdata('user_logged'); ?>
<form method="POST" action="<?php echo base_url('purchase/add_po_word');?>">
<div class="container justify-content-start">
    <div class="row ">
        <div class="col">
            <label for="noquitation">No Purchase Order</label>
            <input type="" class="form-control form-control-user" id="nopo" name="nopo" aria-describedby="" placeholder="" value="<?= $kode_po ?>" readonly>
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
            <label for="dd">Project Name</label>
            <input class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" type="text">
            <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="word">
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
            <label for="Duedate">Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="date" name="date">
            </div>
        </div>
        <div class="col">
            <label for="dd">Type PO</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="tipe_Po" name="tipe_Po">
            <option value="1">Trados</option>
            <option value="2">Transit, XTM, etc.</option>
            <option value="3">Patent</option>
            <option value="4">Google MT</option>
                                    </select>

        </div>

    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">PM Email</label>
            <input type="" class="form-control form-control-user" id="pme" name="pme" aria-describedby="" placeholder="" value="<?php echo $userdata->email_Address; ?>">
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
            <label for="dd">Rate</label>
            <input type="" class="form-control form-control-user" id="rate" name="rate" aria-describedby="" placeholder="" value="0" oninput="hitung()">
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
<hr>
<div class="col-lg-8" style="margin-left:auto;margin-right:auto">
    <div>
        <table class="table table-bordered shadow-lg">
            <thead>
                <tr>
                    <th>Match Word</th>
                    <th>Word Count</th>
                    <th>Weight</th>
                    <th>
                        <data-title="wwc">
                            <select name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
                                <option selected="selected">Weight Word Count IDR</option>
                                <option>Weight Word Count US</option>

                            </select>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw1" name="mw1" value="Locked" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc1" name="wc1" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w1" name="w1" value="0" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc1" name="wwc1" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw2" name="mw2" value="Repetitions" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc2" name="wc2" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w2" name="w2" value="0" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc2" name="wwc2" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw3" name="mw3" value="Fuzzy 100% / CM" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc3" name="wc3" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w3" name="w3" value="0" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc3" name="wwc3" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw4" name="mw4" value="Fuzzy 95% - 99%" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc4" name="wc4" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w4" name="w4" value="30" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc4" name="wwc4" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw5" name="mw5" value="Fuzzy 85% - 94%" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc5" name="wc5" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w5" name="w5" value="50" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc5" name="wwc5" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw6" name="mw6" value="Fuzzy 75% - 84%" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc6" name="wc6" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w6" name="w6" value="70" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc6" name="wwc6" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw7" name="mw7" value="Fuzzy 50% - 74%" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc7" name="wc7" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w7" name="w7" value="100" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc7" name="wwc7" value="" class="form-control"></td>

                </tr>
                <tr>
                    <td><input type="text" style="width:180px;" id="mw8" name="mw8" value="new" class="form-control"></td>
                    <td><input type="text" style="width:120px;" id="wc8" name="wc8" value="" class="form-control" oninput="hitung()"></td>
                    <td><input type="text" style="width:150px;" id="w8" name="w8" value="100" class="form-control"></td>
                    <td><input type="text" style="width:230px;" id="wwc8" name="wwc8" value="" class="form-control"></td>

                </tr>

        </table>
    </div>


</div>
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

            <a href="<?php echo base_url('purchase/add_po_word'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
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