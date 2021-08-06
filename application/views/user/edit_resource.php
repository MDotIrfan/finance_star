<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body shadow p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Resource Data !</h1>
                                </div>
                                <?php echo form_open_multipart('user/edit_resource_data'); ?>
                                <?php foreach ($resource as $r) { ?>
                                    <input type="hidden" class="form-control form-control-user" id="id_resource" name="id_resource" aria-describedby="" placeholder="" value="<?= $r->id_resource ?>">
                                    <label for="username" class="col-lg-4 col-form-label">Nama Resource</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="resource_name" name="resource_name" aria-describedby="" placeholder="" value="<?= $r->resource_name ?>">
                                    </div>
                                    <label for="username" class="col-lg-4 col-form-label">Mobile Phone</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="mobile_phone" name="mobile_phone" aria-describedby="" placeholder="" value="<?= $r->mobile_phone ?>">
                                    </div>
                                    <label for="email_address" class="col-lg-4 col-form-label">Cabang Bank</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="cabang_bank" name="cabang_bank" aria-describedby="" placeholder="" value="<?= $r->cabang_bank ?>">
                                    </div>
                                    <label for="email_address" class="col-lg-4 col-form-label">NO Rekening</label>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" id="no_rekening" name="no_rekening" aria-describedby="" placeholder="" value="<?= $r->no_rekening ?>"></input>
                                    </div>
                                    <label for=" email_address" class="col-lg-4 col-form-label">Alamat</label>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder="" value="<?= $r->address ?>"></input>
                                    </div>
                                    <label for=" email_address" class="col-lg-4 col-form-label">NO NPWP</label>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" id="no_npwp" name="no_npwp" aria-describedby="" placeholder="" value="<?= $r->no_npwp ?>"></input>
                                    </div>
                                    <label for="email_address" class="col-lg-4 col-form-label">Jenis</label>
                                    <div class="form-group">
                                        <!-- <input class="form-control form-control-user" id="jenis" name="jenis" aria-describedby="" placeholder=""></input> -->
                                        <select class="form-control form-control-user" aria-label=".form-select-lg example" id="jenis" name="jenis" >
                                            <option selected>- Pilih Jenis -</option>
                                            <option value="1" <?php if($r->jenis=='biasa'){echo 'selected';}?>>biasa</option>
                                            <option value="2" <?php if($r->jenis=='tenaga ahli'){echo 'selected';}?>>tenaga ahli</option>
                                            <option value="3" <?php if($r->jenis=='vendor'){echo 'selected';}?>>vendor</option>
                                        </select>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <a href=""><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Save</button></a>
                                    </div>
                                <?php } ?>
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