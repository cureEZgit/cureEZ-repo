
  
   <script>
  $(function() {
    $( "#start_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
	
    $( "#end_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
	   $( "#publish_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });

  });
  </script>


<link rel="stylesheet" href="<?php echo base_url()?>assets/validate/css/screen.css" />

<script src="<?php echo base_url()?>assets/validate/dist/jquery.validate.js"></script>

<script>


$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();

	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			file:{
				required:true
			},
			'banner[start_date]': {
				required: true
			},
			'banner[end_date]': {
				required: true
			},
			'banner[publish_date]': {
				required: true
			},'banner[party_address]': {
				required: true
			},'banner[contact_person]': {
				required: true
			},'banner[ad_url]': {
				required: true
			}
			
		
		},
		messages: {
			file:{
				required:"<br>Please Upload A News banner"
			},
			'banner[start_date]': {
				required: "<br>Start Date is Required!"
			},
			'banner[end_date]': {
				required: "<br>End Date is Required!"
			},
			'banner[publish_date]': {
				required: "<br>Publish Date is Required!"
			},'banner[party_address]': {
					required: "<br>This Field  is Required!"
			},'banner[contact_person]': {
				required: "<br>This Field Required!"
			},'banner[ad_url]': {
				required: "<br>This Field Required!"
			}
				
		
		}
	});
	
});
</script>

<style type="text/css">
#commentForm { width: 500px; }
#commentForm label { width: 250px; }
#commentForm label.error, #commentForm input.submit { margin-left: 253px; }
#signupForm { width: 670px; }
#signupForm label.error {
	margin-left: 10px;
	width: auto;
	display: inline;
}
#newsletter_topics label.error {
	display: none;
	margin-left: 103px;
}
</style>

<div class="content">
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="number">53</span>JOINEE</p>
    <p class="stat"><span class="number">27</span>MEMBERS</p>
    <p class="stat"><span class="number">15</span>DOCTORS</p>
</div>

        <h1 class="page-title">Banner Ad</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?= site_url('admin');?>">Dashboard</a> <span class="divider">/</span></li>
			<li><a href="#">Banner Ad</a> <span class="divider">/</span></li>
        </ul>		

	<div class="container-fluid">
     <div class="row-fluid">
<h1>Banner Ad</h1>
<div class="span3">
&nbsp;
</div>
<div class="span6">
<form class="cmxform" id="signupForm" method="post" action="<?= site_url('admin/gallery/create_slide');?>" enctype="multipart/form-data">
<fieldset>
		<legend>Add Banner Ad</legend>
		<p>
			<label for="firstname">Slide Image</label>
			<input type="file" name="file">
		</p>
		<p>
			<label for="firstname">Caption</label>
			<input type="text" id="start_date" name="caption">
		</p>
		<p>
			<input class="submit" type="submit" value="Submit"/>
		</p>

</form>	
</div>
</div>
</div>
</div>
</div>