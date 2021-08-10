<div class="container-fluid">
    <nav aria-label="breadcrumb" style="width:fit-content">
      <ol class="breadcrumb breadcrumb-dot" style="font-size: 14px;background:transparent;">
         <li class="breadcrumb-item" style="color: #9598A3;">Home</li>
         <li class="breadcrumb-item active" style="color:#9598A3;">User</li>
         <li class="breadcrumb-item active" aria-current="page" style="color:black;">Edit User</li>
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
                                <?php echo form_open_multipart('user/edit_user', 'class="form-horizontal"'); ?>
                                <?php foreach($user as $item) {?>
                                <input type="text" class="form-control form-control-user" id="id" name="id" aria-describedby="" placeholder="" value="<?= $item->id_User ?>" hidden>
                                <div class="form-group form-inline">
                                    <label for="username" class="col-sm-4 control-label">Username</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="" placeholder="" value="<?= $item->user_Name ?>">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="password" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" aria-describedby="" placeholder="" value="">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="fullname" class="col-sm-4 control-label">Full Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="fullname" name="fullname" aria-describedby="" placeholder="" value="<?= $item->full_Name ?>">
                                        <?php echo form_error('fullname'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="email_address" class="col-sm-4 control-label">Email Address</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="email_address" name="email_address" aria-describedby="" placeholder="" value="<?= $item->email_Address?>">
                                        <?php echo form_error('email_address'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="position" class="col-sm-4 control-label">Position</label>
                                    <div class="col-sm-7">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="position" name="position">
                                            <?php foreach ($position as $p) {
                                                $selected = ($p->id == $item->id_Position) ? "selected" : "";
                                                echo '<option ' . $selected . ' value="' . $p->id . '">' . $p->position_Name . '</option>';
                                            } ?>
                                    </select>
                                    <?php echo form_error('position'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="status" class="col-sm-4 control-label">Status</label>
                                    <div class="col-sm-7">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
                                            <?php foreach ($status as $s) {
                                                $selected = ($s->id == $item->id_Status) ? "selected" : "";
                                                echo '<option ' . $selected . ' value="' . $s->id . '">' . $s->status_Name . '</option>';
                                            } ?>
                                    </select>
                                    <?php echo form_error('status'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline" id="space-fl" style="display:none">
                                    <label for="status" class="col-sm-4 control-label" class="label-fl">ID Freelance</label>
                                    <div class="col-sm-7">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="id_fl" name="id_fl">
                                        <option value="" selected disabled>- Pilih ID Freelance -</option> 
                                        <?php foreach ($fl as $fl) :
                                             $selected = ($fl->id == $item->id_resource) ? "selected" : "";
                                             echo '<option ' . $selected . ' value="' . $fl->id . '">' .$fl->id.' - '.$fl->firstname.' '.$fl->lastname . '</option>';
                                        endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline" id="space-vendor" style="display:none">
                                    <label for="status" class="col-sm-4 control-label" class="label-vendor">ID Vendor</label>
                                    <div class="col-sm-7">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="id_vendor" name="id_vendor">
                                        <option value="" selected disabled>- Pilih ID Vendor -</option> 
                                        <?php foreach ($vendor as $vendor) :
                                             $selected = ($vendor->id == $item->id_resource) ? "selected" : "";
                                             echo '<option ' . $selected . ' value="' . $vendor->id . '">' . $vendor->id.' - '.$vendor->pic_name . '</option>';
                                        endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="gambar" class="col-sm-4 control-label">Profile Photo</label>
                                    <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-user" id="old_pp" name="old_pp" aria-describedby="" placeholder="" value="<?= $item->profile_Photo ?>" hidden>
                                    <input type="file" class="form-control form-control-user" id="gambar" name="gambar" aria-describedby="" placeholder="">
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <div class="d-grid gap-2 d-flex justify-content-center">
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-save">Edit</button>
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
        Apakah Anda Yakin Ingin Mengubah Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit button" class="btn btn-success btn-save">Edit</button>
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
