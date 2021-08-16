


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CureEZ | Reset Password</title>
    		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/doctor/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
  <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="<?php echo base_url();?>assets/doctor/img/logo.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Reset Password</h1>
								<p class="account-subtitle">Reset your Password</p>
								  <div class="col-12">
                                    <?php if ($message){?>    
                                    <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                    
                                    <?php echo $message;?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                    </div>
                                    <?php }?>
								<!-- Form -->
								<form action="<?php echo site_url("admin/auth/reset_password/".$code)?>" method="post">
                                  <div class="form-group">
                                      <input type="password" name="new" placeholder="Password" class="form-control" value="" id="new" pattern="^.{8}.*$"  />
                                      
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" placeholder="Confirm Password" name="new_confirm" class="form-control" value="" id="new_confirm" pattern="^.{8}.*$"  />
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                               <?php echo form_input($user_id);?>
                        	<?php echo form_hidden($csrf); ?>
                                  
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                                    </div><!-- /.col -->
                                  
                                </form>
								<!-- /Form -->
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url();?>assets/doctor/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url();?>assets/doctor/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/doctor/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url();?>assets/doctor/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>