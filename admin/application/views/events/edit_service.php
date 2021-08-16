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
          <h1>Edit Product</h1>
<br>
                  <a href="<?php  echo site_url('admin/events/service'); ?>"  class="btn btn-info" >Service</a>
                  <a href="<?php  echo site_url('admin/events/create_service'); ?>"  class="btn btn-info" >New</a>
         
        </section>
        <section class="content col-sm-12">
      <div class="box box-primary">
<div class="box-body" >

	  
                <form   method="post" id="editservicee" action="<?php  echo current_url(); ?>"  enctype="multipart/form-data" >                   
<!--
				   <div class="form-group">
                   	<label for="text1" class="control-label">Date</label>
                
                            <input type="text" name="date" value="<?php echo date('d-m-Y',strtotime($event->date)); ?>" class="form-control" id="datepicker" readonly required />
                        
                	</div>	
-->
                     <div class="form-group">											
		<label class="control-label" for="username">Product Type</label>
		
		<select class="form-control"  name="prdct_type"  required="">

				<option value="">Select a Product Type</option>
				
          <option <?php if($event->prdct_type == "How We Teach"){ echo "selected";}?> value="How We Teach">How We Teach</option>

         
         
		</select>										
						
		</div> 
                   <div class="form-group">
                   	<label for="text1" class="control-label">Title</label>
                     
                            <input type="text" name="title" class="form-control" value="<?php echo $event->title ?>"   required/>
                        
                	</div>
                
                    <div class="form-group">
                    <label for="text1" class="control-label">URL</label>
                     
                            <input type="url" name="url" class="form-control" value="<?php echo $event->url ?>"   required/>
                        
                  </div>
                    
                    <input type="hidden" name="category" value="service" > 
                    
                    
                    <div class="form-group">
                   	<label for="text1" class="control-label">Cover Pic</label><br>
                     <img src="<?php echo base_url()?>upload/events/min_events/<?php echo $event->cover_pic; ?>">
                        
                        
                            <input type="file" name="file" class="form-control" />
                        
                	</div>
                    
				    <div class="form-group">
                        <label for="cp1" class="control-label">Description</label>

                      <div class=""> 
                           <textarea name="contentarea" id="contentarea" ><?php echo $event->description;?></textarea>
                              <?php
//        $this->load->view('editor/fckeditor.php');
//        $oFCKeditor = new FCKeditor('description') ;
//        $oFCKeditor->BasePath = base_url().'editor/' ;
//        $oFCKeditor->Height = 390;
//        $oFCKeditor->Config['EnterMode'] = 'br';
//        $oFCKeditor->Value =  $event->description;
//        $oFCKeditor->name = 'description' ;
//        $oFCKeditor->Create() ;
    ?>
                      </div>
                      
                    </div>
                                    				    
  
                    
                        <input type="submit"  value="Update" class="btn btn-primary" />
                    
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
