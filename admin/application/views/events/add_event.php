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
          <h1>Create Events</h1><br>
                                    <a href="<?php  echo site_url('admin/events'); ?>"  class="btn btn-info" >Events</a>

         
        </section>
        <section class="content">
      <div class="box box-primary">
<div class="box-body" >

	  <p style="color:red"><?php echo $message; ?></p>
                <form id="signupForm" method="post" action="<?= site_url('admin/events/add_event') ;?>" enctype="multipart/form-data" >                   
				   <div class="form-group">
                   	<label for="text1" class="control-label">Date</label>
                     
                            <input type="text" name="date" class="form-control" value="<?php echo date('m/d/Y') ?>"  id="datepicker" required readonly />
                        
                	</div>	
                    <div class="form-group">
                   	<label for="text1" class="control-label">Title</label>
                     
                            <input type="text" name="title" class="form-control" value=""   required/>
                        
                	</div>
                    <!--<div class="form-group">
                   	<label for="text1" class="control-label">Category</label>
                     
                        <select name="category" class="form-control" required>
                            <option value="">-Select Category-</option>
                            <option value="testimonial">Testimonial</option>
                            <option value="news">News</option>
                            
                        </select>
                        
                	</div>-->
                    <input type="hidden" name="category" value="events">
<!--
                    <div class="form-group">
                   	<label for="text1" class="control-label">Cover Pic</label>
                     
                            <input type="file" name="file" class="form-control" />
                        
                	</div>
-->
<!--
                    <div class="form-group">
                   	<label for="text1" class="control-label">Short Description</label>
                     
                        <textarea class="form-control" name="sht_desc" style="resize:none;"></textarea>
                        
                	</div>
-->
		  <div class="form-group">
                    <label for="text1" class="control-label">Cover pic</label>
                     
                            <input type="file" name="file" class="form-control" />
                        
                  </div>

                     <div class="form-group">
                    <label for="text1" class="control-label">Short Description</label>
                     
                        <textarea class="form-control" name="sht_desc" style="resize:none;"></textarea>
                        
                  </div>

                   <div class="form-group">
                        <label for="cp1" class="control-label">Description</label>

                        <div class="">
                              <?php
        $this->load->view('editor/fckeditor.php');
        $oFCKeditor = new FCKeditor('description') ;
        $oFCKeditor->BasePath = base_url().'editor/' ;
        $oFCKeditor->Height = 390;
        $oFCKeditor->Config['EnterMode'] = 'br';
        $oFCKeditor->Value = '' ;
        $oFCKeditor->name = 'description' ;
        $oFCKeditor->Create() ;
    ?>
                      </div>
                           
                     
                    </div>

                 
                        <input type="submit"  value="Submit" class="btn btn-success" />
                    
                </form>
						
</div>
</div>
</section>
</div>
	