<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">BAST</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add BAST</li>
    </ol>
</nav>
<?php $userdata = $this->session->userdata('user_logged'); ?>
<?php foreach ($bast as $b) { ?>
<form method="POST" action="<?php echo base_url('finance/edit_bast_data'); ?>">
    <div class="container justify-content-start">
        <div class="row ">
            <div class="col">
                <label for="noquitation">No. BAST</label>
                <input type="" class="form-control form-control-user" id="nobast" name="nobast" aria-describedby="" placeholder="" value="<?= $b->id_bast ?>" readonly>
            </div>
            <div class="col">
                <label for="ps">Type Of Work</label>
                <input type="" class="form-control form-control-user" id="swift" name="swift" aria-describedby="" placeholder="" value="<?= $b->type_of_work ?>">
            </div>
            <div class="col">
                <label for="Duedate">Due Date</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                    </div>
                    <input type="text" class="form-control form-control-user datepicker" id="dd" name="duedate" value="<?= $b->due_date ?>">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container justify-content-start">
        <div class="row">
            <div class="col">
                <label for="noquitation">No. Invoice</label>
                <input type="" class="form-control form-control-user" id="noinv" name="noinv" aria-describedby="" placeholder="" value="<?= $b->no_invoice ?>" readonly>
            </div>
            <div class="col">
                <label for="Pm">Project Name</label>
                <input type="" class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" value="<?= $b->project_name ?>">
            </div>
            <div class="col">
                <label for="dd">PIC Client</label>
                <input type="" class="form-control form-control-user" id="cn" name="cn" aria-describedby="" placeholder="" value="<?= $b->pic_client ?>">
            </div>


        </div>
    </div>
    <br>
    <div class="container justify-content-start">
        <div class="row">
            <div class="col">
                <label for="cn">Perihal</label>
                <input type="" class="form-control form-control-user" id="perihal" name="perihal" aria-describedby="" placeholder="" value="<?= $b->perihal ?>">
            </div>
            <div class="col">
                <label for="Pm">Company Name</label>
                <input type="" class="form-control form-control-user" id="company" name="company" aria-describedby="" placeholder="" value="<?= $b->company_name ?>">
            </div>
            <div class="col">
                <label for="dd">Email</label>
                <input type="" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?= $b->email ?>">
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
                                <td><textarea name="first_party" id="first_party"><?= $b->first_party ?></textarea></td>
                                <td><textarea name="second_party" id="second_party"><?= $b->second_party ?></textarea></td>
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
<?php } ?>
<script>
  var item_list = [];

  <?php
    foreach($bi as $q) {
      echo "item_list.push('".base64_encode(json_encode($q))."');".PHP_EOL;
    }
  ?>
</script>