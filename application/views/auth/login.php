<div class="container">

    <!-- Outer Row -->
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg">

                <div class="card shadow-lg border-0 rounded-lg mt-5 c0l-lg">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <div class="col"><img src="<?= base_url('assets'); ?>/img/login.jpg" class="img-fluid" alt="Responsive image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-left">
                                        <h1 class="text-gray-900 mb-4 font-weight-bold">Log In to continue</h1>
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        Please Log in using that account registered on the website.
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" action="<?= site_url('auth/index') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="email" class="col-lg-4 col-form-label font-weight-bold">Email</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                                </div>
                                                <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email">
                                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-lg-4 col-form-label font-weight-bold">Password</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-key"></i></i></div>
                                                </div>
                                                <input type="password" class="form-control form-control-user" id="password" placeholder="password" name="password">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mx-auto" style="width: 200px;">
                                            <input type="submit" value="Login In My Account" class="btn btn-dark btn-user justify-center">
                                        </div>
                                        <hr>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>