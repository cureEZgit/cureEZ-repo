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
									<h4 class="card-title" id="card-title"><i class="fe fe-user"></i> Add Doctor</h4>
								</div>
								<div class="card-body">
								    <?php if(!empty($this->session->flashdata('message'))){ ?>
								    <div class="alert alert-success">
								       <?php echo $this->session->flashdata('message');?>
								    </div>
								    <?php } ?>
								    	<form id="" method="post" action="<?php echo site_url('admin/doctor/create_doctor');?>" enctype="multipart/form-data">
								    	<div class="row">
								    	    <div class="col-md-4">
								    	              	<div class="form-group row">
											<label class="col-lg-3 col-form-label">Clinic Name <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<!--<select class="form-control" name="slider[clinic_id]">-->
												<!--    <?php if(!empty($clinic)) { foreach($clinic as $cl){?>-->
												<!--    <option value="<?php echo $cl->id;?>"><?php echo $cl->name;?></option>-->
												<!--    <?php } } ?>-->
												<!--</select>-->
											<input type="text" name="slider[clinic_name]" id="clinic_name" class="form-control" placeholder="Enter Clinic Name" autocomplete="off" required>

											</div>
										</div>
								    	        	<div class="form-group row">
											<label class="col-lg-3 col-form-label">Name <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="text" name="slider[name]" id="name" class="form-control" placeholder="Enter Doctor Name" autocomplete="off" required>
											</div>
										</div>
										     	<div class="form-group row">
											<label class="col-lg-3 col-form-label">Age <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="number" name="slider[age]" id="age" class="form-control" placeholder="Enter Age" min="1" autocomplete="off" required>
											</div>
										</div>
										    	<div class="form-group row">
											<label class="col-lg-3 col-form-label">Gender <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<select class="form-control" name="slider[gender]" id="gender">
												    <option value="male">Male</option>
												     <option value="female">Female</option>
												</select>
											</div>
										</div>
											<div class="form-group row">
											<label class="col-lg-3 col-form-label">Email <span class="text-red">*</span></label>
											<div class="col-lg-9">
										   <input type="email" name="slider[email]" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" required>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Mobile <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="number" name="slider[mobile]" id="mobile" class="form-control" min="1" placeholder="Enter Mobile" autocomplete="off" required>
											</div>
										</div>
										
									
										                	<div class="form-group row">
											<label class="col-lg-3 col-form-label">Cover Pic <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="file" name="file" class="form-control">
												<img src="" id="b_img" width="100px;">
											</div>
										</div>
											<div class="form-group row">
											<label class="col-lg-3 col-form-label">Education <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="text" name="slider[education]" id="education" class="form-control" placeholder="Enter Education" autocomplete="off" required>
											</div>
										</div>
									
										
								    	    </div>
								    	      <div class="col-md-4">
								    	 <div class="form-group row" style="margin-top: -10px;">
											<label class="col-lg-3 col-form-label">Experience <span class="text-red">*</span></label>
											<div class="col-lg-9">
											    <textarea name="slider[experience]" id="experience" class="form-control" rows="2"> </textarea>
											
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Description <span class="text-red">*</span></label>
											<div class="col-lg-9">
											    <textarea name="slider[description]" id="description" class="form-control" rows="4"> </textarea>
											
											</div>
										</div>
										  <div class="form-group row">
											<label class="col-lg-3 col-form-label">Speciality <span class="text-red">*</span></label>
											<div class="col-lg-9">
											    <div id="clic_spec">
											    <select name="slider[speciality]" id="speciality" class="form-control">
											    <?php if(!empty($category)) { foreach($category as $cl) { ?>
											    <option value="<?php echo $cl['id'];?>"><?php echo $cl['name'];?></option>
											    <?php } } ?>
											</select>
											    </div>
											</div>
										</div>
												<div class="form-group row">
											<label class="col-lg-3 col-form-label">Book Type <span class="text-red">*</span></label>
											<div class="col-lg-9">
											<div class="row">
										<div class="col-md-4">
											 <label>Audio</label>
											 <input type="number" name="slider[audio_price]" id="audio_price" class="form-control" placeholder="00" autocomplete="off" required>
										</div>
									    <div class="col-md-4">
											 <label>Video</label>
											 <input type="number" name="slider[video_price]" id="video_price" class="form-control" placeholder="00" autocomplete="off" required>
										</div>
										<div class="col-md-4">
											 <label>Physical</label>
											 <input type="number" name="slider[physical_price]" id="physical_price" class="form-control" placeholder="00" autocomplete="off" required>
										</div>
											</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Language <span class="text-red">*</span></label>
											<div class="col-lg-9" id="lang_sec">
											         <select name="language[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
												    <option value="odia">Odia</option>
												     <option value="hindi">Hindi</option>
												     <option value="english">English</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Address <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="text" name="slider[address]" id="address" class="form-control" placeholder="Enter Address" autocomplete="off" required>
											</div>
										</div>
								    </div>
								    <div class="col-md-4">
								    	<div class="form-group row">
											<label class="col-lg-3 col-form-label">City <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="text" name="slider[city]" id="city" class="form-control" placeholder="Enter City" autocomplete="off" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Latitude <span class="text-red">*</span></label>
											<div class="col-lg-9">
											<input type="text" name="slider[latitude]" id="latitude" class="form-control" placeholder="Enter Latitude" autocomplete="off" required>
											</div>
										</div>
								    	<div class="form-group row">
											<label class="col-lg-3 col-form-label">Longitude <span class="text-red">*</span></label>
											<div class="col-lg-9">
												<input type="text" name="slider[longitude]" id="longitude" class="form-control" placeholder="Enter Longitude" autocomplete="off" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Start Time</label>
											<div class="col-lg-9">
												<input type="text" name="slider[open_time]" id="timepicker" class="form-control" placeholder="Enter Opening Time" autocomplete="off" required>
											</div>
										</div>
								    	<div class="form-group row">
											<label class="col-lg-3 col-form-label">End Time</label>
											<div class="col-lg-9">
												<input type="text" name="slider[close_time]"  id="closing_time"  class="form-control" placeholder="Enter Closing Time"  autocomplete="off">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Off Day</label>
											<div class="col-lg-9">
												<select class="form-control" name="slider[off_day]" id="off_day">
												    <option value="Sun">Sunday</option>
												    <option value="Mon">Monday</option>
												    <option value="Thu">Tuesday</option>
												    <option value="Wed">Wednesday</option>
												    <option value="Thu">Thursday</option>
												    <option value="Fri">Friday</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Break Time</label>
											<div class="col-lg-9">
											    	<div class="row">
											    <div class="col-md-6">
											        <label>From</label>
											 <input type="text" name="slider[break_from]" id="break_from" class="form-control" placeholder="00:00" autocomplete="off" required>
											    </div>
											     <div class="col-md-6">
											           <label>To</label>
											 <input type="text" name="slider[break_to]" id="break_to" class="form-control" placeholder="00:00" autocomplete="off" required>
											    </div>
											</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Slot Booking</label>
											<div class="col-lg-9">
												<select class="form-control" id="slot_booking" name="slider[slot_booking]">
												    <option value="15">15 Min.</option>
												    <option value="30">30 Min.</option>
												    <option value="45">45 Min.</option>
												    <option value="60">60 Min.</option>
												</select>
											</div>
										</div>
<div class="text-right">
<input type="hidden" name="id" id="did">
<input type="hidden" name="slider[state]" vlaue="Odisha"> 
<button type="submit" id="submit" class="btn btn-primary">Submit</button>
</div>
</div>
								    	    
								
								  </div>
							
									
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header bg-grey">
									<h4 class="card-title"><i class="fe fe-users"></i> Doctor Listing</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
									  <table class="table mb-0">
                                    <thead>
                                        <tr>
<!--                                        <th>Type</th>-->
                                            <th>Cover Pic</th>
                                            <th>Doctor Name</th>
                                            <th>Clinic Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Rating</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sort_slider">
          <?php if(!empty($doctor)) { foreach ($doctor as $gall){
		  ?>
		<tr class="odd gradeX" id="slider_<?php echo $gall->id; ?>">
		<td><img src="<?php echo base_url();?>/upload/doctor/<?php echo $gall->cover_pic;?>"   width="100px"  /></td>
		<td><?php echo $gall->name; ?></td>
			<td><?php echo $gall->clinic_name; ?></td>
		<td><?php echo $gall->email; ?></td>
		<td><?php echo $gall->mobile; ?></td>
			<td>
			    
			    <?php if($gall->rating==1){ ?>
  <span class="fe fe-star checked"></span>
   <span class="fe fe-star"></span>
    <span class="fe fe-star"></span>
     <span class="fe fe-star"></span>
      <span class="fe fe-star"></span>
  <?php }else if($gall->rating==2) { ?>
  <span class="fe fe-star checked"></span>
  <span class="fe fe-star checked"></span>
   <span class="fe fe-star"></span>
    <span class="fe fe-star"></span>
     <span class="fe fe-star"></span>
  <?php }else if($gall->rating==3){ ?>
  <span class="fe fe-star checked"></span>
    <span class="fe fe-star checked"></span>
      <span class="fe fe-star checked"></span>
        <span class="fe fe-star"></span>
          <span class="fe fe-star"></span>
  <?php }else if($gall->rating==4){ ?>
  <span class="fe fe-star checked"></span>
    <span class="fe fe-star checked"></span>
      <span class="fe fe-star checked"></span>
        <span class="fe fe-star checked"></span>
          <span class="fe fe-star"></span>
          <?php }else if($gall->rating==5){ ?>
           <span class="fe fe-star checked"></span>
    <span class="fe fe-star checked"></span>
      <span class="fe fe-star checked"></span>
        <span class="fe fe-star checked"></span>
          <span class="fe fe-star checked"></span>
          <?php } ?>

			    </td>
				<td>
<?php 
         if($gall->status == 0){ $anc = 'Active'; }else{ $anc = 'Deactive'; }
    
                          ///  echo anchor('admin/slider/actdeact/'.$gall->id, $anc,array('class' => 'act-deact','title'=>$gall->status));    ?>
                    <a href="<?php echo site_url('admin/doctor/actdeact/'.$gall->id); ?>"  class="act-deact" title="<?php echo $gall->status; ?>" ><?php echo $anc; ?></a>
                    
</td>
            
            <td class="text-left">
                	<a class="btn btn-sm bg-success-light" onClick="edit_doctor(<?php echo $gall->id;?>);" href="#">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  href="<?php echo site_url("admin/doctor/delete_doctor/".$gall->id); ?>" class="btn btn-sm bg-danger-light dlt">
																<i class="fe fe-trash"></i> Delete
															</a>
													
															<!--<a class="btn btn-sm bg-success-light" onClick="edit_clinic(<?php echo $gall->id;?>);" href="#">-->
															<!--	<i class="fe fe-pencil"></i> Edit-->
															<!--</a>-->
															<!--<a  href="<?php echo site_url("admin/clinic/delete_clinic/".$gall->id); ?>" class="btn btn-sm bg-danger-light dlt">-->
															<!--	<i class="fe fe-trash"></i> Delete-->
															<!--</a>-->
														
													</td>
		</tr>
		<?php }}?>
                                    </tbody>
                                </table>
									</div>
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
<script>
$(document).ready(
function() {
$("#sort_slider").sortable({
update : function () {
serial = $('#sort_slider').sortable('serialize');
$.ajax({
url: "<?php echo site_url('admin/slider/save_order'); ?>",
type: "post",
data: serial,
error: function(){
alert("theres an error with AJAX");
}
});
    
}
});
});

 $('.act-deact').click(function(ev){
             ev.preventDefault();
             var dis = this;
             $.post($(this).attr('href'),{'sts':$(this).attr('title')},function(resp){
                 if(resp == 0){
                    $(dis).html('Active');
                    $(dis).attr("title",resp);
                 }else if(resp == 1){
                    $(dis).html('Deactive');
                    $(dis).attr("title",resp);
                 }
                 
             });  
    });
    </script>      
    <script>
    $('a.dlt').click(function(evt){
           evt.preventDefault();
          if(confirm("Are You Sure ?")){       
               var dis = this;
                $.post($(dis).attr('href'),{'delete':'dlt'},function(resp){
                    if(resp){
                        $(dis).parent().parent().remove();
                    }else{
                       alert(resp);
                    }
                });
            }
        });
        function edit_doctor(id)
        {
              $.post("<?php echo site_url('admin/doctor/get_doctor');?>",{id:id},function(resp){
              var parsedJson = $.parseJSON(resp);
              $('#clinic_name').val(parsedJson.clinic_name);
              $('#name').val(parsedJson.name);
              $('#age').val(parsedJson.age);
              $('#email').val(parsedJson.email);
              $('#mobile').val(parsedJson.mobile);
              $('#experience').val(parsedJson.experience);
              $('#audio_price').val(parsedJson.audio_price);
              $('#video_price').val(parsedJson.video_price);
              $('#physical_price').val(parsedJson.physical_price);
              $('#address').val(parsedJson.address);
              $('#city').val(parsedJson.city);
              $('#latitude').val(parsedJson.latitude);
              $('#longitude').val(parsedJson.longitude);
              $('#timepicker').val(parsedJson.open_time);
              $('#closing_time').val(parsedJson.close_time);
              
              $('#break_from').val(parsedJson.break_from);
              $('#break_to').val(parsedJson.break_to);
              $('#slot_booking').val(parsedJson.slot_booking);
              $('#speciality').val(parsedJson.speciality);
              $('#speciality').val(parsedJson.speciality);
              $('#off_day').val(parsedJson.off_day);
              $('#gender').val(parsedJson.gender);
              $('#speciality').val(parsedJson.speciality);
                
              $('#education').val(parsedJson.education);
              $('#description').val(parsedJson.description);
              var img = "<?php echo base_url();?>/upload/doctor/"+parsedJson.cover_pic;
              $('#b_img').prop('src', img);
              $('#did').val(parsedJson.id);
              $('#card-title').html('Edit Doctor');
              $('#submit').html('Update');
             });
              $.post("<?php echo site_url('admin/doctor/get_doctor_speciality');?>",{id:id},function(resp){
                  $('#lang_sec').html(resp);
              });
        }
</script>
<script src="https://www.jqueryscript.net/demo/Material-Time-Picker-Plugin-jQuery-MDTimePicker/mdtimepicker.js"></script>
<script>
  $(document).ready(function(){
    $('#timepicker').mdtimepicker();
    $('#closing_time').mdtimepicker(); 
    $('#break_from').mdtimepicker();
    $('#break_to').mdtimepicker();
  });
</script>