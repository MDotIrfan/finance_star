<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Invoice Out</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Invoice Out</li>
    </ol>
</nav>
<?php $userdata = $this->session->userdata('user_logged'); ?>
<form method="POST" action="<?php echo base_url('finance/add_inv_out');?>">
<div class="container justify-content-start">
    <div class="row ">
        <div class="col">
            <label for="noquitation">No. Invoice</label>
            <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $kode_inv ?>" readonly>
        </div>
        <div class="col">
            <label for="ps">Swift Code</label>
            <input type="" class="form-control form-control-user" id="swift" name="swift" aria-describedby="" placeholder="">
        </div>
        <div class="col">
            <label for="Duedate">Due Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="dd" name="duedate">
            </div>
        </div>
    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
        <label for="noquitation">No. Purchase Order</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
            <option value="">-</option>
                                        <!-- <?php foreach ($po as $q) : ?>
                                            <option value="<?php echo $q->no_Po; ?>"> <?php echo $q->no_Po; ?></option>
                                        <?php endforeach; ?> -->
                                    </select>
        </div>
        <div class="col">
            <label for="Pm">Address</label>
            <input type="" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="">
        </div>
        <div class="col">
            <label for="dd">Email</label>
            <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="">
        </div>


    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">Client Name</label>
            <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="">
        </div>
        <div class="col">
            <label for="cn">Account</label>
            <input type="" class="form-control form-control-user" id="acc" name="acc" aria-describedby="" placeholder="">
        </div>
        <div class="col">
       
        </div>



    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
        <label for="Duedate">Invoice Date</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="ivd" name="invoicedate">
            </div>
        </div>
        <div class="col">
        <label for="dd">No. Rekening</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="no_rek" name="no_rek">
            <option value="">-</option>
            <option value="1">Permata Bank IDR</option>
            <option value="2">Permata Bank Dollar</option>
            <option value="3">Permata Bank Euro</option>
            <option value="4">Bank Danamon</option>
            <option value="5">Paypal</option>
                                    </select>
        </div>
        <div class="col">
        <label for="dd">Tipe Invoice</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="tipe" name="tipe">
            <option value="1">Invoice Luar</option>
            <option value="2">Invoice Local</option>
            <option value="3">Invoice SPQ</option>
            <option value="4">Invoice Luar 2</option>
            <option value="5">Invoice SPQ 2</option>
                                    </select>
        </div>



    </div>
</div>
<hr>
<div class="col-lg-10 " style="">
    <div>
        <table class="table table-bordered shadow-lg" id="dinamisTable">
            
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

            <a href="<?php echo base_url('finance/add_inv_out'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
            <a>&emsp;&emsp;</a>
            <a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a>
        </div>
    </div>
    <div class="col-lg-4">
        <hr>
        <div class="text-left font-weight-bold">
            Total Cost <input type="text" id="total" name="total" value="" readonly>
            <hr>
            Grand Total <input type="text" id="grand" name="grand" value="" readonly>
            <hr>
        </div>
    </div>
    </div>
</div>
</div>
</form>