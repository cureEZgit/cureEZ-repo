<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ajxupload/upload.css"  />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ajxupload/jquery.form.js" ></script>

 <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css">
 <script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
 <script>
 $(function () {
 $('#datepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    });
});
 </script>

<div class="content-wrapper">
               
              <section class="content-header">
          <h1>Add Event</h1><br>
        <a href="<?php  echo site_url('admin/events/service'); ?>"  class="btn btn-info" >Event List</a>

         
        </section>
        <section class="content">
      <div class="box box-primary">
<div class="box-body" >

	  <p style="color:red"><?php echo $message; ?></p>
                <form id="serviceformp" method="post" action="<?php  echo current_url(); ?>" enctype="multipart/form-data" >                   
<!--
				   <div class="form-group">
                   	<label for="text1" class="control-label">Date</label>
                     
                            <input type="text" name="date" class="form-control" value="<?php echo date('m/d/Y') ?>"  id="datepicker" required readonly />
                        
                	</div>	
-->
                     <div class="form-group">											
		<label class="control-label" for="username">Event Type</label>
		
		<select class="form-control"  name="prdct_type"  required="">

				<option value="">Select a Event Type</option>
          <option value="How We Teach">How We Teach</option>
         

         
		</select>										
						
		</div> 
                    
                    
                    
                    
                    
                    
                    
                    <div class="form-group">
                   	<label for="text1" class="control-label">Title</label>
                     
                            <input type="text" name="title" class="form-control" value=""   required/>
                        
                	</div>

                    <div class="form-group">
                    <label for="text1" class="control-label">URL</label>
                     
                            <input type="url" name="url" class="form-control" value=""   required/>
                        
                  </div>
                    
                    
                   
                    
                    <input type="hidden" name="category" value="service" > 
                    
                    
                    <div class="form-group">
                   	<label for="text1" class="control-label">Cover Pic</label>
                     
                            <input type="file" name="file" class="form-control" />
                        
                	</div>
                    <p style="color:red;">Please upload image 1000 X 750px.</p>
                    
				    <div class="form-group">
                        <label for="cp1" class="control-label">Description</label>
                         <textarea name="contentarea" id="contentarea" ></textarea>

                        <div class="">
                              <?php
//        $this->load->view('editor/fckeditor.php');
//        $oFCKeditor = new FCKeditor('description') ;
//        $oFCKeditor->BasePath = base_url().'editor/' ;
//        $oFCKeditor->Height = 390;
//        $oFCKeditor->Config['EnterMode'] = 'br';
//        $oFCKeditor->Value = '' ;
//        $oFCKeditor->name = 'description' ;
//        $oFCKeditor->Create() ;
    ?>
                      </div>
                           
                     
                    </div>
                    				    
    <!--       Progress Bar-->
    
       <!--       Progress Bar-->
					
                 
                        <input type="submit"  value="Submit" class="btn btn-success" />
                    
                </form>
						
</div>
</div>
</section>
</div>
	<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script>


    CKEDITOR.replace( 'contentarea', {
    height:400,        
    filebrowserBrowseUrl: '<?php echo base_url(); ?>ckeditor/samples/assets/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '<?php echo base_url(); ?>ckeditor/samples/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
});
    
    
</script>	
