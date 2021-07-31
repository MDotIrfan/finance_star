<div class="container-fluid">
    <nav aria-label="breadcrumb" style="width:fit-content">
      <ol class="breadcrumb breadcrumb-dot" style="font-size: 14px;background:transparent;">
         <li class="breadcrumb-item" style="color: #9598A3;">Home</li>
         <li class="breadcrumb-item active" style="color:#9598A3;">User</li>
         <li class="breadcrumb-item active" aria-current="page" style="color:black;">Create User</li>
      </ol>
   </nav>

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body shadow p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="pl-4 pt-5 pb-5">
                                <?php echo form_open_multipart('user/add_user', 'class="form-horizontal"'); ?>
                                <input type="text" class="form-control form-control-user" id="id" name="id" aria-describedby="" placeholder="" value="<?= $kode_user ?>" hidden>
                                <div class="form-group form-inline">
                                    <label for="username" class="col-sm-4 control-label">Username</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="" placeholder="" value="<?php echo set_value('username')?>">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="password" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" aria-describedby="" placeholder="" value="<?php echo set_value('password')?>">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="fullname" class="col-sm-4 control-label">Full Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="fullname" name="fullname" aria-describedby="" placeholder="" value="<?php echo set_value('fullname')?>">
                                        <?php echo form_error('fullname'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="email_address" class="col-sm-4 control-label">Email Address</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="email_address" name="email_address" aria-describedby="" placeholder="" value="<?php echo set_value('email_address')?>">
                                        <?php echo form_error('email_address'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="position" class="col-sm-4 control-label">Position</label>
                                    <div class="col-sm-7">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="position" name="position">
                                        <option value="" selected disabled>- Pilih Posisi -</option> 
                                        <?php foreach ($position as $p) : ?>
                                            <option value="<?php echo $p->id; ?>"> <?php echo $p->position_Name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('position'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="status" class="col-sm-4 control-label">Status</label>
                                    <div class="col-sm-7">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
                                        <option value="" selected disabled>- Pilih Status -</option> 
                                        <?php foreach ($status as $s) : ?>
                                            <option value="<?php echo $s->id; ?>"> <?php echo $s->status_Name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('status'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="gambar" class="col-sm-4 control-label">Profile Photo</label>
                                    <div class="col-sm-7">
                                    <input type="file" class="form-control form-control-user" id="gambar" name="gambar" aria-describedby="" placeholder="">
                                    </div>
                                </div>
                                <br>
                                <div class="d-grid gap-2 d-flex justify-content-center">
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-save">Save</button>
                                </div>
                                <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Menambah Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit button" class="btn btn-success btn-save">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL -->
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</div>
