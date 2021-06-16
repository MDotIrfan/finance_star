<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EDIT USER</h1>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body shadow p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit User !</h1>
                                </div>
                                <?php foreach ($user as $u) { ?>
                                    <?php echo form_open_multipart('user/edit_user'); ?>
                                    <input type="text" class="form-control form-control-user" id="id" name="id" aria-describedby="" placeholder="" value="<?= $u->id_User ?>" hidden>
                                    <label for="username" class="col-lg-4 col-form-label">Username</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="" value="<?= $u->user_Name ?>" placeholder="">
                                    </div>
                                    <label for="password" class="col-lg-4 col-form-label">Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" aria-describedby="" value="<?= $u->pass_Word ?>" placeholder="">
                                    </div>
                                    <label for="fullname" class="col-lg-4 col-form-label">Full Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="fullname" name="fullname" aria-describedby="" value="<?= $u->full_Name ?>" placeholder="">
                                    </div>
                                    <label for="email_address" class="col-lg-4 col-form-label">Email Address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email_address" name="email_address" aria-describedby="" value="<?= $u->email_Address ?>" placeholder="">
                                    </div>
                                    <label for="position" class="col-lg-4 col-form-label">Position</label>
                                    <div class="form-group">
                                        <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="position" name="position">
                                            <?php foreach ($position as $p) {
                                                $selected = ($p->id == $u->id_Position) ? "selected" : "";
                                                echo '<option ' . $selected . ' value="' . $p->id . '">' . $p->position_Name . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <label for="status" class="col-lg-4 col-form-label">Status</label>
                                    <div class="form-group">
                                        <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
                                            <?php foreach ($status as $s) {
                                                $selected = ($s->id == $u->id_Status) ? "selected" : "";
                                                echo '<option ' . $selected . ' value="' . $s->id . '">' . $s->status_Name . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <label for="fullname" class="col-lg-4 col-form-label" id="labelmp" style="display : none;">Mobile Phone</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="mp" name="mp" aria-describedby="" placeholder="" style="display : none;" value="<?= $u->mobile_phone ?>">
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label" id="labelcb" style="display : none;">Cabang Bank</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="cb" name="cb" aria-describedby="" placeholder="" style="display : none;" value="<?= $u->cabang_bank ?>">
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label" id="labelnorek" style="display : none;">No. Rekening</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="norek" name="norek" aria-describedby="" placeholder="" style="display : none;" value="<?= $u->no_rekening ?>">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label" id="labeladdress" style="display : none;">User Address</label>
                                <div class="form-group">
                                    <textarea class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" style="display : none;"><?= $u->address ?></textarea>
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label" id="labelnpwp" style="display : none;">No. NPWP</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="npwp" name="npwp" aria-describedby="" placeholder="" style="display : none;" value="<?= $u->no_npwp ?>">
                                </div>
                                    <input type="hidden" class="form-control form-control-user" id="old_image" name="old_image" aria-describedby="" value="<?= $u->profile_Photo ?>" placeholder="">
                                    <label for="gambar" class="col-lg-4 col-form-label">Profile Photo</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control form-control-user" id="gambar" name="gambar" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <a href=""><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Save</button></a>
                                    </div>
                                    </form>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</div>