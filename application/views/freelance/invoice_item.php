<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Invoice</li>
    </ol>
</nav>
<?php $userdata = $this->session->userdata('user_logged'); ?>
<form method="POST" action="<?php echo base_url('freelance/add_inv_item');?>">
<?php foreach ($res as $r) : ?>
<div class="container justify-content-start">
    <div class="row ">
        <div class="col">
            <label for="noquitation">No. Purchase Order</label>
            <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
            <option value="">-</option>
                                        <?php foreach ($po as $q) : ?>
                                            <option value="<?php echo $q->no_Po; ?>"> <?php echo $q->no_Po; ?></option>
                                        <?php endforeach; ?>
                                    </select>
        </div>
        <div class="col">
            <label for="ps">Cabang Bank</label>
            <input type="" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="" value="<?php echo $r->cabang_bank; ?>">
        </div>
        <div class="col">
            <label for="Duedate">Down Payment </label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control form-control-user" id="dp" name="dp">
            </div>
        </div>
        <div class="col">
            <label for="Duedate">Email</label>
            <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?php echo $userdata->email_Address; ?>">
        </div>
    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">No. Invoice</label>
            <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" readonly>
        </div>
        <div class="col">
            <label for="Pm">Mitra Name</label>
            <input type="" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="" value="<?php echo $userdata->full_Name; ?>">
            <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="item">
        </div>
        <div class="col">
            <label for="Duedate">Invoice Date </label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="id" name="invoicedate">
            </div>
        </div>
        <div class="col">
            <label for="dd">No. NPWP</label>
            <input type="" class="form-control form-control-user" id="ce" name="ce" aria-describedby="" placeholder="" value="<?php echo $r->no_npwp; ?>">
        </div>


    </div>
</div>
<br>
<div class="container justify-content-start">
    <div class="row">
        <div class="col">
            <label for="cn">No. Rekening </label>
            <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?php echo $r->no_rekening; ?>">
        </div>
        <div class="col">
            <label for="Pm">Address</label>
            <input type="" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?php echo $r->address; ?>">
        </div>
        <div class="col">
            <label for="Duedate">Due Date </label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                </div>
                <input type="text" class="form-control form-control-user datepicker" id="dd" name="duedate">
            </div>
        </div>
        <div class="col">
        </div>


    </div>
</div>
<br>

<hr>
<div class="col-lg-10 " style="margin-left:auto;margin-right:auto">
    <div>
        <table class="table table-bordered shadow-lg">
            <!-- <table id=" example" class="display" style="width:100%"> -->
            <thead>
                <tr>
                    <th>Job Description</th>
                    <th><select id="v_form" name="v_form" class="form-control font-weight-bold">
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

            <a href="<?php echo base_url('freelance/add_inv_item'); ?>"><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a>
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
<?php endforeach; ?>