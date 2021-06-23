<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">BAST</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add BAST</li>
    </ol>
</nav>
<?php $userdata = $this->session->userdata('user_logged'); ?>
<form method="POST" action="<?php echo base_url('finance/add_inv_out'); ?>">
    <div class="container justify-content-start">
        <div class="row ">
            <div class="col">
                <label for="noquitation">No. BAST</label>
                <input type="" class="form-control form-control-user" id="nobast" name="nobast" aria-describedby="" placeholder="" value="<?= $kode_bast ?>">
            </div>
            <div class="col">
                <label for="ps">Type Of Work</label>
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
                <label for="noquitation">No. Invoice</label>
                <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
                    <option value="">-</option>
                    <?php foreach ($po as $q) : ?>
                        <option value="<?php echo $q->no_Po; ?>"> <?php echo $q->no_Po; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="Pm">Project Name</label>
                <input type="" class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="">
            </div>
            <div class="col">
                <label for="dd">PIC Client</label>
                <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="">
            </div>


        </div>
    </div>
    <br>
    <div class="container justify-content-start">
        <div class="row">
            <div class="col">
                <label for="cn">Perihal</label>
                <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="">
            </div>
            <div class="col">
                <label for="Pm">Company Name</label>
                <input type="" class="form-control form-control-user" id="dp" name="dp" aria-describedby="" placeholder="">
            </div>
            <div class="col">
                <label for="dd">Email</label>
                <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="">
            </div>





        </div>
    </div>
    <br>

    <hr>
    <div class=" container justify-content-start col-lg-14 " style="margin-left:auto;margin-right:auto">
        <div>
            <table class="table table-bordered shadow">
                <!-- <table id=" example" class="display" style="width:100%"> -->
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <tbody id="dinamisRow">
                    <div class="control-group after-add-more">
                    </div>
            </table>
        </div>

    </div>
    <hr>
    <div class="container justify-content-start col-lg-14">
        <div class="row">
            <div class="col-lg" align="left">
                <div>
                    <table class="table table-bordered shadow-lg" style="width: 50%">
                        <thead>
                            <tr>
                                <th>The first party</th>
                                <th>The second party</th>

                        </thead>
                        <tbody>
                            <tr>
                                <td><textarea name="public_notes"></textarea></td>
                                <td><textarea name="regards"></textarea></td>
                            </tr>


                    </table>
                </div>
                <div class="container justify-content-center col-lg-14" style="width:70%">


                    <a href="<?php echo base_url('finance/add_inv_out'); ?>">
                        <button type="submit button" class="btn btn-success">
                            <i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
    </div>
</form>