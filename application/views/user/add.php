<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CREATE USER</h1>
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
                                    <h1 class="h4 text-gray-900 mb-4">Create User !</h1>
                                </div>
                                <?php echo form_open_multipart('user/add_user'); ?>
                                <input type="text" class="form-control form-control-user" id="id" name="id" aria-describedby="" placeholder="" value="<?= $kode_user ?>" hidden>
                                <label for="username" class="col-lg-4 col-form-label">Username</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="" placeholder="">
                                </div>
                                <label for="password" class="col-lg-4 col-form-label">Password</label>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" aria-describedby="" placeholder="">
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label">Full Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="fullname" name="fullname" aria-describedby="" placeholder="">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Email Address</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email_address" name="email_address" aria-describedby="" placeholder="">
                                </div>
                                <label for="position" class="col-lg-4 col-form-label">Position</label>
                                <div class="form-group">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="position" name="position">
                                        <?php foreach ($position as $p) : ?>
                                            <option value="<?php echo $p->id; ?>"> <?php echo $p->position_Name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="status" class="col-lg-4 col-form-label">Status</label>
                                <div class="form-group">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
                                        <?php foreach ($status as $s) : ?>
                                            <option value="<?php echo $s->id; ?>"> <?php echo $s->status_Name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label" id="labelmp" style="display : none;">Mobile Phone</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="mp" name="mp" aria-describedby="" placeholder="" style="display : none;">
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label" id="labelcb" style="display : none;">Cabang Bank</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="cb" name="cb" aria-describedby="" placeholder="" style="display : none;">
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label" id="labelnorek" style="display : none;">No. Rekening</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="norek" name="norek" aria-describedby="" placeholder="" style="display : none;">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label" id="labeladdress" style="display : none;">Client Address</label>
                                <div class="form-group">
                                    <textarea class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" style="display : none;"></textarea>
                                </div>
                                <label for="status" class="col-lg-4 col-form-label" id="labeljenis">Jenis Freelance</label>
                                <div class="form-group">
                                    <select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="jenis" name="jenis" style="display : none;">
                                            <option value="biasa">Freelancer Biasa</option>
                                            <option value="tenaga ahli">Tenaga Ahli</option>
                                            <option value="vendor">Vendor</option>
                                    </select>
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label" id="labelnpwp" style="display : none;">No. NPWP</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="npwp" name="npwp" aria-describedby="" placeholder="" style="display : none;">
                                </div>
                                <label for="gambar" class="col-lg-4 col-form-label" style="visibility">Profile Photo</label>
                                <div class="form-group">
                                    <input type="file" class="form-control form-control-user" id="gambar" name="gambar" aria-describedby="" placeholder="">
                                </div>
                                <br>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href=""><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Save</button></a>
                                </div>
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