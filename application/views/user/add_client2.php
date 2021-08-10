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
                                    <h1 class="h4 text-gray-900 mb-4">Add Client Data !</h1>
                                </div>
                                <?php echo form_open_multipart('user/add_client_data2'); ?>
                                <input type="hidden" class="form-control form-control-user" id="id" name="id" aria-describedby="" placeholder="" value="<?= $kode_client ?>">
                                <label for="username" class="col-lg-4 col-form-label">Client Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="" placeholder="">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Client Email</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email_address" name="email_address" aria-describedby="" placeholder="">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Company Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="company" name="company" aria-describedby="" placeholder="">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Client Address</label>
                                <div class="form-group">
                                    <textarea class="form-control form-control-user" id="address" name="address" aria-describedby="" placeholder=""></textarea>
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