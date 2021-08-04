<div class="container-fluid">
    <div class="row align-items-start" style="margin-bottom: 25px;">
        <div class="col">
            <ol class=" breadcrumb breadcrumb-dot justify-content-start" style="font-size: 14px;background:transparent">
                <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Home</li>
                <li class="breadcrumb-item active justify-content-start" aria-current="page" style="color:black;">SEND</li>
            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col"></div>
        <div class="col">

            <div class="card o-hidden border-0 shadow-lg my-5" style="background: #FFFFFF;width: 682px;">
                <div class="card-body shadow p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div>
                                <form style="margin: 20px;">
                                    <?php echo form_open_multipart('finance/kirimemail'); ?>
                                    <div class="row mb-3" style="margin-top: 50px;">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">To</label>
                                        <div class="col-sm-10">
                                            <input style="height: 56px;color:black;" type="text" class="form-control form-control-user" name="to">
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Cc</label>
                                        <div class="col-sm-10">
                                            <input style="height: 56px;color:black;" type="text" class="form-control form-control-user" name="cc">
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Subject</label>
                                        <div class="col-sm-10">
                                            <input style="height: 56px;color:black;" type="text" class="form-control form-control-user" name="subject">
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <input style="height: 137px;color:black;" type="text" class="form-control form-control-user" name="desc">
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="">
                                        <label style="color:black;" for="inputPassword3" class="col-sm-2 col-form-label">Upload File</label>
                                        <div class="col-sm-10">
                                            <input style="width: 179px;color:black;" type="file" class="form-control form-control-user" id="gambar" name="gambar" aria-describedby="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center" style="margin-bottom: 50px;">
                                        <a href=""><button type="submit button" class="btn btn-success" style="background: #169122;border-radius: 5px;"><i class="fa fa-print" aria-hidden="true"></i> Send</button></a>
                                    </div>

                                </form>
                            </div>
                            <!-- <div class="p-5">
                                <?php echo form_open_multipart('finance/kirimemail'); ?>

                                <div class="col">
                                    <label for="username" class="col-lg-4 col-form-label">To</label>
                                    <input type="text" class="form-control form-control-user" name="to">
                                </div>
                                <label for="password" class="col-lg-4 col-form-label">Cc</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="cc">
                                </div>
                                <label for="fullname" class="col-lg-4 col-form-label">Subject</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="subject">
                                </div>
                                <label for="email_address" class="col-lg-4 col-form-label">Description</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="desc">
                                </div>

                                <label for="gambar" class="col-lg-4 col-form-label">Upload File</label>
                                <div class="form-group">
                                    <input type="file" class="form-control form-control-user" id="gambar" name="gambar" aria-describedby="" placeholder="">
                                </div>
                                <br>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href=""><button type="submit button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Send</button></a>
                                </div>
                                </form>


                            </div> -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col"></div>
    </div>
</div>

</div>