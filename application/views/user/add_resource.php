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
                                    <h1 class="h4 text-gray-900 mb-4">Add Resource Data !</h1>
                                </div>
                                <?php echo form_open_multipart('user/add_resource_data'); ?>
                                <input type="hidden" class="form-control form-control-user" id="id_resource" name="id_resource" aria-describedby="" placeholder="" value="<?= $kode_resource ?>">
                                <label for="username" class="col-lg-4 col-form-label">Nama Resource</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="resource_name" name="resource_name" aria-describedby="" placeholder="">
                                </div>
                                <label for="username" class="col-lg-4 col-form-label">Mobile Phone</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="mobile_phone" name="mobile_phone" aria-describedby="" placeholder="">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Cabang Bank</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="cabang_bank" name="cabang_bank" aria-describedby="" placeholder="">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">NO Rekening</label>
                                <div class="form-group">
                                    <input class="form-control form-control-user" id="no_rekening" name="no_rekening" aria-describedby="" placeholder=""></input>
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Alamat</label>
                                <div class="form-group">
                                    <textarea class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder=""></textarea>
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">NO NPWP</label>
                                <div class="form-group">
                                    <input class="form-control form-control-user" id="no_npwp" name="no_npwp" aria-describedby="" placeholder=""></input>
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Jenis</label>
                                <div class="form-group">
                                    <!-- <input class="form-control form-control-user" id="jenis" name="jenis" aria-describedby="" placeholder=""></input> -->
                                    <select class="form-control form-control-user" aria-label=".form-select-lg example" id="jenis" name="jenis">
                                        <option selected>- Pilih Jenis -</option>
                                        <option value="1">biasa</option>
                                        <option value="2">tenaga ahli</option>
                                        <option value="3">vendor</option>
                                    </select>
                                </div>
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