    

 <link href="<?= base_url();?>/assets/css/jquery-ui.css" rel="stylesheet" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/uniform/themes/default/css/uniform.default.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/chosen/chosen.min.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/colorpicker/css/colorpicker.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/tagsinput/jquery.tagsinput.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/daterangepicker/daterangepicker-bs3.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/datepicker/css/datepicker.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />

<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />

<link rel="stylesheet" href="<?php echo base_url()?>assets/validate/css/screen.css" />

<script src="<?php echo base_url()?>assets/validate/dist/jquery.validate.js"></script>

<script>


$().ready(function() {
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			file:{
				required:true
			},
			'name': {
				required: true
			}
			
		
		},
		messages: {
			file:{
				required:"<br>Please Upload A Slide"
			},
			'name': {
				required: "<br>This Field is Required!"
			}
				
		
		}
	});
	
});
</script>



    <!-- END PAGE LEVEL  STYLES -->

     <!--PAGE CONTENT --> 

    <div id="content">

                <div class="inner">

               <div class="row">

               <div class="col-lg-12">

                    <h2 class="page-header"><?php echo "Add A Slide";?></h2>

                </div>

            </div>

                     

<div class="row">

<div class="col-lg-8" align="center">





<div id="infoMessage" style="color:#F00"><?php echo $message;?></div>



<form  id="signupForm" method="post" action="<?= site_url('admin/gallery/create_album');?>" enctype="multipart/form-data">



				    <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Album Name</label>
                    <div class="col-lg-8">
							<input type="text" name="name" class="form-control" >
                     </div>
                	</div>

 			

                 <div class="form-group">
				    <label for="text2" class="control-label col-lg-4"><br>Cover Pic</label>
                    <div class="col-lg-8">
                    <br>
					            <input type="file" name="file" class="form-control">
                   	<br/> 
                    </div>
                	</div>


	     <div class="form-group">
                    <div class="col-lg-8">
					<br />

                        <input type="submit" id="tags" value="Submit" class="btn btn-primary pull-right" />

                    </div>

                </div>

	</form>

	   </div>



</div>

   

    </div>



           </div>

              </div>

                    <!-- END PAGE CONTENT -->