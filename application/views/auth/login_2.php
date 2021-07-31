<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
            <img src="<?= base_url('assets'); ?>/img/login2.jpg" class="img-fluid login-image" alt="Responsive image">
            
         </div>
      </div>
      <div class="main">
         <div class="col-md-8 col-sm-12">
            <div class="login-form">
            <h2>Log In To Continue</h2>
            <p class="text-left">Please log in using account that has registered on the website.</p>
            <?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>
               <form class="user" autocomplete="off" action="<?= site_url('auth/index') ?>" method="POST">
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email Address</label>
                        <div class="input-icons">
                            <i class="fas fa-envelope icon"></i>
                            <input class="input-field" id="email" name="email" style="background: #FFFFFF;" placeholder="Your Email Address">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <div class="input-icons">
                            <i class="fas fa-key icon"></i>
                            <input class="input-field" type="password" id="password" name="password" style="background: #FFFFFF;" placeholder="Your Password">
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <input type="submit" value="Log In My Account" class="btn-black justify-center">
                    </div>
               </form>
            </div>
         </div>
      </div>