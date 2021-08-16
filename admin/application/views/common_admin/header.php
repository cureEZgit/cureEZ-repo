<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>CureEZ - Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/doctor/img/logo.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/css/feathericon.min.css">
		
		<link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/plugins/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/doctor/css/style.css?ver=1.2">
        <script src="<?php echo base_url();?>assets/doctor/js/jquery-3.2.1.min.js"></script>
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
		    textarea {
                resize: none;
            }
		</style>
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="<?php echo base_url('admin/dashboard');?>" class="logo">
						<img src="<?php echo base_url();?>assets/doctor/img/logo.png" alt="Logo">
					</a>
					<div class="main-text">Re-imazining Cure</div>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<!--<div class="top-nav-search">-->
				<!--	<form>-->
				<!--		<input type="text" class="form-control" placeholder="Search here">-->
				<!--		<button class="btn" type="submit"><i class="fa fa-search"></i></button>-->
				<!--	</form>-->
				<!--</div>-->
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu" style="margin-right: 2rem;">
					<!-- /Notifications -->
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="<?php echo base_url();?>assets/img/user.jpeg" width="31" alt="Ryan Taylor"></span><?php  $user = $this->session->userdata;echo $user['email']; ?>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="<?php echo base_url();?>assets/img/user.jpeg" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php  $user = $this->session->userdata;echo $user['email']; ?></h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="<?php echo site_url('admin/auth/edit_user/1')?>">My Profile</a>
							<a class="dropdown-item" href="<?php echo site_url('admin/auth/logout')?>">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul >
							<li class="<?php if($menu=='dashboard') echo "active";?>"> 
								<a href="<?php echo base_url('admin/dashboard');?>"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li class="<?php if($menu=='banner') echo "active";?>"> 
								<a href="<?php echo site_url('banners');?>"><i class="fe fe-layout"></i> <span>Banners</span></a>
							</li>
							<li class="<?php if($menu=='category') echo "active";?>"> 
								<a href="<?php echo site_url('admin/category');?>"><i class="fe fe-document"></i>  <span>Category</span></a>
							</li>
							<!--<li class="<?php if($menu=='clinic') echo "active";?>"> -->
							<!--	<a href="<?php echo site_url('admin/clinic');?>"><i class="fe fe-vector"></i> <span>Clinic</span></a>-->
							<!--</li>-->
							<li class="<?php if($menu=='doctor') echo "active";?>"> 
								<a href="<?php echo site_url('admin/doctor');?>"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
							</li>
							<li class="<?php if($menu=='patients') echo "active";?>"> 
								<a href="<?php echo site_url('admin/patients');?>"><i class="fe fe-users"></i> <span>Patients</span></a>
							</li>
							<li class="<?php if($menu=='bookings') echo "active";?>"> 
								<a href="<?php echo site_url('bookings/list');?>"><i class="fa fa-medkit custom"></i> <span>Bookings</span></a>
							</li>
							<li class="<?php if($menu=='report') echo "active";?>"> 
								<a href="<?php echo site_url('report');?>"><i class="fe fe-document"></i> <span>Report</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->

