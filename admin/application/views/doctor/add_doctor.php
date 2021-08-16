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
.card{
    margin-bottom:1rem;
}
</style>
<div class="page-wrapper" style="min-height: 511px;">
                <div class="content container-fluid">
					<div class="row">
					    	<div class="col-xl-12 d-flex">
							<div class="card flex-fill" style="margin-bottom:0;">
								<div class="card-header bg-grey">
									<h4 class="card-title" id="card-title"><i class="fa fa-user-md"></i><?php echo $title;?></h4>
								</div>
								<div class="card-body">
								    <?php if(!empty($this->session->flashdata('message'))){ ?>
								    <div class="alert alert-success">
								       <?php echo $this->session->flashdata('message');?>
								    </div>
								    <?php } ?>
								    <form id="" method="post" action="<?php echo site_url('admin/doctor/create_doctor');?>" enctype="multipart/form-data">
								    	<div class="row">
								    	    <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Registration No. <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="slider[regd_no]" id="regd_no" class="form-control" placeholder="Enter Registration No." maxlength="30" autocomplete="off" required value="<?php if(isset($edit_data->regd_no))echo $edit_data->regd_no;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Speciality <span class="text-red">*</span></label>
        											<div class="col-lg-9">
        											    <div id="clic_spec">
        											    <select name="slider[speciality]" id="speciality" class="form-control" required>
        											        <option value=""> -- Select -- </option>
            											    <?php if(!empty($category)) { foreach($category as $cl) 
            											    {
            											        $speciality_selected = '';
            											        if(isset($edit_data->speciality) && $edit_data->speciality == $cl['id'])$speciality_selected = 'Selected';?>
            											        <option value="<?php echo $cl['id'];?>" <?php echo $speciality_selected;?>><?php echo $cl['name'];?></option>
            											    <?php } } ?>
            											</select>
        											    </div>
        											 </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Name <span class="text-red">*</span></label>
        											<div class="col-lg-9">
        												<input type="text" name="slider[name]" id="name" class="form-control" maxlength="100" placeholder="Enter Doctor Name" autocomplete="off" required value="<?php if(isset($edit_data->name))echo $edit_data->name;?>">
        											</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Clinic Name </label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="slider[clinic_name]" id="clinic_name" maxlength="50" class="form-control" placeholder="Enter Clinic Name" autocomplete="off" value="<?php if(isset($edit_data->clinic_name))echo $edit_data->clinic_name;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Email <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="email" name="slider[email]" id="email" maxlength="100" class="form-control" placeholder="Enter Email" autocomplete="off" required value="<?php if(isset($edit_data->email))echo $edit_data->email;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Mobile <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="tel" name="slider[mobile]" pattern="[1-9]{1}[0-9]{9}" class="form-control" min="1" placeholder="Enter Mobile" autocomplete="off" title="Please enter valid mobile no." 
                                                        required value="<?php if(isset($edit_data->mobile))echo $edit_data->mobile;?>" minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                    <!--                        <div class="col-md-6">-->
								    	       <!-- <div class="form-group row">-->
                    <!--                                <label class="col-lg-3 col-form-label">Age</label>-->
                    <!--                                <div class="col-lg-9">-->
                    <!--                                    <input type="number" name="slider[age]" id="age" class="form-control" placeholder="Enter Age" min="18" max="100" autocomplete="off" value="<?php if(isset($edit_data->age))echo $edit_data->age;?>">-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="col-md-6">-->
								    	       <!-- <div class="form-group row">-->
                    <!--                                <label class="col-lg-3 col-form-label">Gender</label>-->
                    <!--                                <div class="col-lg-9">-->
                    <!--                                    <select class="form-control" name="slider[gender]" id="gender">-->
        												<!--    <option value="male" <?php if(isset($edit_data->gender) && $edit_data->gender == 'male')echo 'Selected';?>>Male</option>-->
        												<!--     <option value="female" <?php if(isset($edit_data->gender) && $edit_data->gender == 'female')echo 'Selected';?>>Female</option>-->
        												<!--</select>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Qualification <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="slider[education]" id="education" class="form-control" placeholder="Enter Education" maxlength="100" autocomplete="off" required value="<?php if(isset($edit_data->education))echo $edit_data->education;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">About me <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <textarea name="slider[description]" id="description" class="form-control" rows="2"><?php if(isset($edit_data->description))echo $edit_data->description;?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Password <?php if(!isset($edit_data->id)){?><span class="text-red">*</span><?php }?></label>
                                                    <div class="col-lg-9">
                                                        <input type="password" name="slider[password]" id="password" class="form-control" autocomplete="off" <?php if(!isset($edit_data->id)){?>required<?php }?> maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Practicing since year <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="slider[practice_starts]" id="practice_starts" class="form-control" autocomplete="off" required max="<?php echo date('Y-m-d');?>" 
                                                        value="<?php if(isset($edit_data->practice_starts) && $edit_data->practice_starts != '0000-00-00')echo date('d-m-Y',strtotime($edit_data->practice_starts));?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
								    	        <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Profile Pic <span class="text-red">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="file" name="file" class="form-control" <?php if(isset($edit_data->cover_pic)){}else{echo 'required';}?>>
                                                        <?php if(isset($edit_data->cover_pic))
                                                        {
                                                            echo '<img src="'.base_url().'upload/doctor/'.$edit_data->cover_pic.'" id="b_img" width="100px;" style="margin-top:10px;">';
												        }?>
                                                    </div>
                                                </div>
                                            </div>
                     <!--                       <div class="col-md-6">-->
								    	        <!--<div class="form-group row">-->
                     <!--                               <label class="col-lg-3 col-form-label">Experience <span class="text-red">*</span></label>-->
                     <!--                               <div class="col-lg-9">-->
                     <!--                                   <textarea name="slider[experience]" id="experience" class="form-control" rows="2" required><?php if(isset($edit_data->experience))echo $edit_data->experience;?></textarea>-->
                     <!--                               </div>-->
                     <!--                           </div>-->
                     <!--                       </div>-->
                                            
                                            <div class="col-md-12" style="margin-top: 0px;">
    								    	    <div class="card" syle="margin-bottom:0px;">
        								    	    <div class="card-header bg-grey" style="padding:10px;">
                    									<h6 class="card-title" id="card-title"><i class="fe fe-location"></i> Address</h6>
                    								</div>
                    								<div class="card-body row">
            								    	    <div class="col-md-6">
            								    	        <div class="form-group row">
                    											<label class="col-lg-3 col-form-label">City <span class="text-red">*</span></label>
                    											<div class="col-lg-9">
                    												<input type="text" name="slider[city]" id="city" class="form-control" placeholder="Enter City" maxlength="100" autocomplete="off" required value="<?php if(isset($edit_data->city))echo $edit_data->city;?>">
                    											</div>
                    										</div>
                    										<div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Latitude</label>
                    											<div class="col-lg-9">
                    											<input type="float" name="slider[latitude]" id="latitude" class="form-control" placeholder="Enter Latitude" maxlength="50" autocomplete="off" value="<?php if(isset($edit_data->latitude))echo $edit_data->latitude;?>">
                    											</div>
                    										</div>
            								    	    </div>
            								    	    <div class="col-md-6">
            								    	        <div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Address <span class="text-red">*</span></label>
                    											<div class="col-lg-9">
                    												<input type="text" name="slider[address]" id="address" class="form-control" placeholder="Enter Address" maxlength="100" autocomplete="off" required value="<?php if(isset($edit_data->address))echo $edit_data->address;?>">
                    											</div>
                    										</div>
                    										<div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Longitude</label>
                    											<div class="col-lg-9">
                    												<input type="float" name="slider[longitude]" id="longitude" class="form-control" placeholder="Enter Longitude" maxlength="50" autocomplete="off" value="<?php if(isset($edit_data->longitude))echo $edit_data->longitude;?>">
                    											</div>
                    										</div>
            								    	    </div>
        								    	    </div>
        								    	</div>
        								    </div>
        								    <div class="col-md-12" style="margin-top: 0px;">
    								    	    <div class="card" syle="margin-bottom:0px;">
        								    	    <div class="card-header bg-grey" style="padding:10px;">
                    									<h6 class="card-title" id="card-title"><i class="fa fa-money"></i> Consultation Fee</h6>
                    								</div>
                    								<div class="card-body row">
            								    	    <div class="col-md-4">
            								    	        <div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Audio <span class="text-red">*</span></label>
                    											<div class="col-lg-9">
                    												<input type="number" name="slider[audio_price]" class="form-control" placeholder="Enter Audio Fee" autocomplete="off" required value="<?php if(isset($edit_data->audio_price))echo $edit_data->audio_price;?>">
                    											</div>
                    										</div>
            								    	    </div>
            								    	    <div class="col-md-4">
            								    	        <div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Video <span class="text-red">*</span></label>
                    											<div class="col-lg-9">
                    												<input type="number" name="slider[video_price]" class="form-control" placeholder="Enter Video Fee" autocomplete="off" required value="<?php if(isset($edit_data->video_price))echo $edit_data->video_price;?>">
                    											</div>
                    										</div>
            								    	    </div>
            								    	    <div class="col-md-4">
            								    	        <div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Physical <span class="text-red">*</span></label>
                    											<div class="col-lg-9">
                    												<input type="number" name="slider[physical_price]" class="form-control" placeholder="Enter Physical Fee" autocomplete="off" required value="<?php if(isset($edit_data->physical_price))echo $edit_data->physical_price;?>">
                    											</div>
                    										</div>
            								    	    </div>
        								    	    </div>
        								    	</div>
        								    </div>
                                            <div class="col-md-12" style="margin-top: 0px;">
    								    	    <div class="card">
        								    	    <div class="card-header bg-grey" style="padding:10px;">
                    									<h6 class="card-title" id="card-title"><i class="fe fe-clock"></i> Available Time</h6>
                    								</div>
                    								<div class="card-body row">
            								    	    <div class="col-md-6">
            								    	        <div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Available Time</label>
                    											<div class="col-lg-9">
                    											    <div class="row">
                        											    <div class="col-md-6">
                        											        <label>Opening Time <span class="text-red">*</span></label>
                        											        <input type="text" name="slider[open_time]" id="timepicker" required class="form-control" placeholder="Enter Opening Time" autocomplete="off" value="<?php if(isset($edit_data->open_time))echo $edit_data->open_time;?>">
                        											    </div>
                        											     <div class="col-md-6">
                                                                            <label>Closing Time <span class="text-red">*</span></label>
                                                                            <input type="text" name="slider[close_time]"  id="closing_time" required  class="form-control" placeholder="Enter Closing Time"  autocomplete="off" value="<?php if(isset($edit_data->close_time))echo $edit_data->close_time;?>">
                        											    </div>
                        											</div>
                    											</div>
                    										</div>
            								    	    </div>
            								    	    <div class="col-md-6">
                    										<div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Break Time</label>
                    											<div class="col-lg-9">
                    											    	<div class="row">
                    											    <div class="col-md-6">
                    											        <label>From <span class="text-red">*</span></label>
                    											 <input type="text" name="slider[break_from]" id="break_from" required class="form-control" placeholder="00:00" autocomplete="off" value="<?php if(isset($edit_data->break_from))echo $edit_data->break_from;?>">
                    											    </div>
                    											     <div class="col-md-6">
                    											           <label>To <span class="text-red">*</span></label>
                    											 <input type="text" name="slider[break_to]" id="break_to" required class="form-control" placeholder="00:00" autocomplete="off" value="<?php if(isset($edit_data->break_to))echo $edit_data->break_to;?>">
                    											    </div>
                    											</div>
                    											</div>
                    										</div>
            								    	    </div>
            								    	    <div class="col-md-6">
                    										<div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Slot Booking <span class="text-red">*</span></label>
                    											<div class="col-lg-9">
                    												<select class="form-control" id="slot_booking" name="slider[slot_booking]">
                    												    <option value="15" <?php if(isset($edit_data->slot_booking) && $edit_data->slot_booking == '15')echo 'Selected';?>>15 Min.</option>
                    												    <option value="30" <?php if(isset($edit_data->slot_booking) && $edit_data->slot_booking == '30')echo 'Selected';?>>30 Min.</option>
                    												    <option value="45" <?php if(isset($edit_data->slot_booking) && $edit_data->slot_booking == '45')echo 'Selected';?>>45 Min.</option>
                    												    <option value="60" <?php if(isset($edit_data->slot_booking) && $edit_data->slot_booking == '60')echo 'Selected';?>>60 Min.</option>
                    												</select>
                    											</div>
                    										</div>
        								    	        </div>
            								    	    <div class="col-md-6">
                    										<div class="form-group row">
                    											<label class="col-lg-3 col-form-label">Off Day <span class="text-red">*</span></label>
                    											<div class="col-lg-9">
                    												<select class="form-control" name="slider[off_day]" id="off_day">
                    												    <option value="Sun" <?php if(isset($edit_data->off_day) && $edit_data->off_day == 'Sun')echo 'Selected';?>>Sunday</option>
                    												    <option value="Mon" <?php if(isset($edit_data->off_day) && $edit_data->off_day == 'Mon')echo 'Selected';?>>Monday</option>
                    												    <option value="Thu" <?php if(isset($edit_data->off_day) && $edit_data->off_day == 'Thu')echo 'Selected';?>>Tuesday</option>
                    												    <option value="Wed" <?php if(isset($edit_data->off_day) && $edit_data->off_day == 'Wed')echo 'Selected';?>>Wednesday</option>
                    												    <option value="Thu" <?php if(isset($edit_data->off_day) && $edit_data->off_day == 'Thu')echo 'Selected';?>>Thursday</option>
                    												    <option value="Fri" <?php if(isset($edit_data->off_day) && $edit_data->off_day == 'Fri')echo 'Selected';?>>Friday</option>
                    												    <option value="Sat" <?php if(isset($edit_data->off_day) && $edit_data->off_day == 'Sat')echo 'Selected';?>>Saturday</option>
                    												</select>
                    											</div>
                    										</div>
        								    	        </div>
        								    	</div>
        								    </div>
								        
        								    <div class="col-md-12">
                                                <div class="text-right">
                                                    <input type="hidden" name="id" id="did" value="<?php if(isset($edit_data->id))echo $edit_data->id;?>">
                                                    <input type="hidden" name="slider[state]" vlaue="Odisha"> 
                                                    <button type="submit" id="submit" class="btn btn-primary"><?php echo $button_title;?></button>
                                                </div>
                                            </div>
								        </div>
									</form>
								</div>
							</div>
						</div>
					
					</div>
				
				
				
				</div>			
			</div>
			
<script src="https://themesbrand.com/skote/layouts/horizontal/assets/libs/select2/js/select2.min.js"></script>
<!-- dropzone plugin -->
<script src="https://themesbrand.com/skote/layouts/horizontal/assets/libs/dropzone/min/dropzone.min.js"></script>
<!-- init js -->
<script src="https://themesbrand.com/skote/layouts/horizontal/assets/js/pages/ecommerce-select2.init.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jQueryUI/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"-->
         rel = "stylesheet">
<script src="https://www.jqueryscript.net/demo/Material-Time-Picker-Plugin-jQuery-MDTimePicker/mdtimepicker.js"></script>
<script>
  $(document).ready(function(){
     $('#timepicker').mdtimepicker();
     $('#closing_time').mdtimepicker(); 
     $('#break_from').mdtimepicker();
     $('#break_to').mdtimepicker();
  });
  
    $("#practice_starts").datepicker({ dateFormat: 'dd-mm-yy',maxDate: '0',  changeYear: true });

</script>
