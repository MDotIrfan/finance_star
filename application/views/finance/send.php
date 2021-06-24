<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SEND</h1>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body shadow p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                            <?php echo form_open_multipart('finance/kirimemail');?>
                                <label for="username" class="col-lg-4 col-form-label">To</label>
                                <div class="form-group">
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


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>