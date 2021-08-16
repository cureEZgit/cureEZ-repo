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
#datalist {
    font-size: 15px;
}
</style>
<div class="page-wrapper" style="min-height: 511px;">
                <div class="content container-fluid">
					<div class="row">
					    	<div class="col-lg-12" id="doctor_msg">
							    <?php if(!empty($this->session->flashdata('message'))){ ?>
    							    <div class="alert alert-success">
    							       <?php echo $this->session->flashdata('message');?>
    							    </div>
							    <?php } ?>
							</div>
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header bg-grey">
									<h4 class="card-title"><i class="fe fe-users"></i> Doctor Listing 
									    <a href="<?php echo site_url('admin/doctor/form');?>" style="float:right;font-size: 18px;text-decoration: underline;">+ Add Doctor</a>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
									  <table class="table mb-0" id="datalist">
                                    <thead>
                                        <tr>
<!--                                        <th>Type</th>-->
                                            <th>Profile Pic</th>
                                            <th>Name/ Regd No.</th>
                                            <th>Doctor ID</th>
                                            <th>Clinic Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <!--<th>Rating</th>-->
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sort_slider">
          <?php if(!empty($doctor)) { foreach ($doctor as $gall){
		  ?>
                                    <tr class="odd gradeX" id="slider_<?php echo $gall->id; ?>">
                                        <td><img src="<?php echo base_url();?>/upload/doctor/<?php echo $gall->cover_pic;?>"   width="100px"  /></td>
                                        <td>
                                            <?php echo $gall->name.'<br>'.$gall->regd_no; ?>
                                        </td>
                                        <td><?php echo $gall->uniq_id; ?></td>
                                        <td><?php echo $gall->clinic_name; ?></td>
                                        <td><?php echo $gall->email; ?></td>
                                        <td><?php echo $gall->mobile; ?></td>
  <!--                                      <td>-->
			    
		<!--	    <?php if($gall->rating==1){ ?>-->
  <!--<span class="fe fe-star checked"></span>-->
  <!-- <span class="fe fe-star"></span>-->
  <!--  <span class="fe fe-star"></span>-->
  <!--   <span class="fe fe-star"></span>-->
  <!--    <span class="fe fe-star"></span>-->
  <!--<?php }else if($gall->rating==2) { ?>-->
  <!--<span class="fe fe-star checked"></span>-->
  <!--<span class="fe fe-star checked"></span>-->
  <!-- <span class="fe fe-star"></span>-->
  <!--  <span class="fe fe-star"></span>-->
  <!--   <span class="fe fe-star"></span>-->
  <!--<?php }else if($gall->rating==3){ ?>-->
  <!--<span class="fe fe-star checked"></span>-->
  <!--  <span class="fe fe-star checked"></span>-->
  <!--    <span class="fe fe-star checked"></span>-->
  <!--      <span class="fe fe-star"></span>-->
  <!--        <span class="fe fe-star"></span>-->
  <!--<?php }else if($gall->rating==4){ ?>-->
  <!--<span class="fe fe-star checked"></span>-->
  <!--  <span class="fe fe-star checked"></span>-->
  <!--    <span class="fe fe-star checked"></span>-->
  <!--      <span class="fe fe-star checked"></span>-->
  <!--        <span class="fe fe-star"></span>-->
  <!--        <?php }else if($gall->rating==5){ ?>-->
  <!--         <span class="fe fe-star checked"></span>-->
  <!--  <span class="fe fe-star checked"></span>-->
  <!--    <span class="fe fe-star checked"></span>-->
  <!--      <span class="fe fe-star checked"></span>-->
  <!--        <span class="fe fe-star checked"></span>-->
  <!--        <?php } ?>-->

		<!--	    </td>-->
				<td>
<?php 
         if($gall->status == 0){ $anc = 'Active'; }else{ $anc = 'Deactive'; }
    
                          ///  echo anchor('admin/slider/actdeact/'.$gall->id, $anc,array('class' => 'act-deact','title'=>$gall->status));    ?>
                    <a href="<?php echo site_url('admin/doctor/actdeact/'.$gall->id); ?>"  class="act-deact" title="<?php echo $gall->status; ?>" ><?php echo $anc; ?></a>
                    
</td>
            
            <td class="text-left">
															<a  href="<?php echo site_url("admin/patients/list/".$gall->id); ?>" class="btn btn-sm bg-default-light">
																<i class="fe fe-user"></i> Patients
															</a>
															<a  href="<?php echo site_url("admin/doctor/form/".$gall->id); ?>" class="btn btn-sm bg-success-light">
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
      
        setTimeout(function(){$('#doctor_msg').html('');}, 3000);
        $('#timepicker').mdtimepicker();
        $('#closing_time').mdtimepicker(); 
        $('#break_from').mdtimepicker();
        $('#break_to').mdtimepicker();
  });
</script>