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
          <h1>Edit Events</h1>
<br>
                  <a href="<?php  echo site_url('admin/events/event_calender'); ?>"  class="btn btn-info" >Events Calendar</a>
                  <a href="<?php  echo site_url('admin/events/add_event'); ?>"  class="btn btn-info" >New Events</a>
         
        </section>
        <section class="content col-sm-12">
      <div class="box box-primary">
<div class="box-body" >

	  
                <form   method="post" id="editevent" action="<?= site_url('admin/events/edit_event').'/'.$event->id ;?>"  enctype="multipart/form-data" >                   
				   <div class="form-group">
                   	<label for="text1" class="control-label">Date</label>
                
                            <input type="text" name="date" value="<?php echo date('d-m-Y',strtotime($event->date)); ?>" class="form-control" id="datepicker" readonly required />
                        
                	</div>	
                    <div class="form-group">
                   	<label for="text1" class="control-label">Title</label>
                     
                            <input type="text" name="title" class="form-control" value="<?php echo $event->title ?>"   required/>
                        
                	</div>
                    <!-- <div class="form-group">
                   	<label for="text1" class="control-label">Category</label>
                     
                        <select name="category" class="form-control" required>
                            <option value="">-Select Category-</option>
                            <option <?php  if($event->category == 'testimonial'){ ?> selected ="Selected"  <?php } ?> value="testimonial">Testimonial</option>
                            <option <?php  if($event->category == 'news'){ ?> selected ="Selected"  <?php } ?> value="news">News</option>
                            
                        </select>
                        
                	</div>-->
                    
                    <input type="hidden" name="category" value="events">
                    
                    
<!--  <div class="form-group">
                   	<label for="text1" class="control-label">Cover Pic</label><br>
                     <img src="<?php echo base_url()?>upload/events/min_events/<?php echo $event->cover_pic; ?>">
                        
                        
                            <input type="file" name="file" class="form-control" />
                        
                	</div>
-->
<!--
                    <div class="form-group">
                   	<label for="text1" class="control-label">Short Description</label>
                     
                        <textarea class="form-control" name="sht_desc" style="resize:none;"><?php echo $event->sht_desc ?></textarea>
                        
                	</div>
-->
				    <div class="form-group">
                    <label for="text1" class="control-label">Cover pic</label>
                      <img src="<?php echo base_url()?>upload/events/<?php echo $event->cover_pic; ?>"  width="100px" height="90px" />
                        
                            <input type="file" name="file" class="form-control" />
                        
                  </div>
                     <div class="form-group">
                    <label for="text1" class="control-label">Short Description</label>
                     
                        <textarea class="form-control" name="sht_desc" style="resize:none;"><?php echo $event->short_desc; ?></textarea>
                        
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
        $oFCKeditor->Value = $event->description;
        $oFCKeditor->name = 'description' ;
        $oFCKeditor->Create() ;
    ?>
                      </div>
                           
                     
                    </div>

                                	
                					    
    <!--       Progress Bar-->
<!--
       <div id="p_bar" style="display:none;" class="hide">
           <div  class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" id="progressbar" style="width:0%">
                    <span id="statustxt"></span>
                </div>
           </div>
       </div>
-->
       <!--       Progress Bar-->
					
					
                    
                        <input type="submit"  value="Update" class="btn btn-primary" />
                    
                </form>
				
</div>
</div>
</section>
</div>
