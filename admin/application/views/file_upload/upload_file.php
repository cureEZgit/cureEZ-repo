<!-- END PAGE LEVEL  STYLES -->
     <!--PAGE CONTENT --> 
    <div class="content-wrapper">
              <section class="content-header">
          <h1>File Upload</h1>
         
        </section>
        <section class="content">
<div class="box box-primary">
<div class="box-body" >
<span style="color:red;"><?php echo $this->session->flashdata('mssage'); ?></span>
<form action="<?php echo site_url('admin/file_upload/filetoupload') ?>" enctype="multipart/form-data" method="post" id="pagecreate"/>





                     <div class="form-group col-md-6">
                    <label for="text1" class="control-label">PDF<br></label>
                            <input type="hidden" name="valfld" value="1">
                 <input  type="file" class="form-control" name="pdf_file" ><br>
                 
                  <input type="submit" value="submit" class="btn btn-success">
            
                	</div>	
              </form>
              </div>
                	
           </div>     	
     </div>
