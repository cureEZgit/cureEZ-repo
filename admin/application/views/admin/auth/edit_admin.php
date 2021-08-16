 <link href="https://themesbrand.com/skote/layouts/horizontal/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
 
 <link href="https://themesbrand.com/skote/layouts/horizontal/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" /> 
 <link href="https://www.jqueryscript.net/demo/Material-Time-Picker-Plugin-jQuery-MDTimePicker/mdtimepicker.css" rel="stylesheet" type="text/css">
<style>
    span.text-red {
    color: red;
}
#center {
  text-align: center;
}
.fa-star {
  font-size: 50px;
}
.checked {
  color: orange;
}
</style>
<div class="page-wrapper" style="min-height: 511px;">
                <div class="content container-fluid">
					<div class="row">
					    	<div class="col-xl-12 d-flex">
							<div class="card flex-fill" style="margin-bottom:0;">
								<div class="card-header bg-grey">
									<h4 class="card-title" id="card-title"><i class="fe fe-user"></i> Profile</h4>
								</div>
								<div class="card-body">
								    <?php if(!empty($this->session->flashdata('message'))){ ?>
								    <div class="alert alert-success">
								       <?php echo $this->session->flashdata('message');?>
								    </div>
								    <?php } ?>
								    <?php echo form_open(uri_string());?>
								    	<div class="row">
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">First Name <span class="text-red">*</span></label>
        											<div class="col-lg-9">
        												<?php echo form_input($first_name);?>
        											</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Last Name </label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($last_name);?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Email <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($email);?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Mobile </label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($phone);?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Password </label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($password);?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Confirm Password </label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($password_confirm);?>
                                                    </div>
                                                </div>
                                            </div>
								        
        								    <div class="col-md-12">
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
								        </div>
								        <?php echo form_hidden('id', $user->id);?>
                                        <?php echo form_hidden($csrf); ?>
									<?php echo form_close();?>
								</div>
							</div>
						</div>
					</div>
					
					
					<!--change password-->
					<div class="row" style="display:none;">
					    	<div class="col-xl-12 d-flex">
							<div class="card flex-fill" style="margin-bottom:0;">
								<div class="card-header bg-grey">
									<h4 class="card-title" id="card-title"><i class="fe fe-user"></i> Change Password</h4>
								</div>
								<div class="card-body">
								    <?php if(!empty($this->session->flashdata('message'))){ ?>
								    <div class="alert alert-success">
								       <?php echo $this->session->flashdata('message');?>
								    </div>
								    <?php } ?>
								    <?php echo form_open(uri_string());?>
								    	<div class="row">
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Old Password <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($password);?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">New Password <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($password);?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Confirm Password <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <?php echo form_input($password_confirm);?>
                                                    </div>
                                                </div>
                                            </div>
								        
        								    <div class="col-md-12">
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
								        </div>
								        <?php echo form_hidden('id', $user->id);?>
                                        <?php echo form_hidden($csrf); ?>
									<?php echo form_close();?>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>