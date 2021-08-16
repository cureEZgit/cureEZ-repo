
      
                        
  
  <div class="content-wrapper">
               
              <section class="content-header">
          <h1>Uploaded File</h1>
         
        </section>
        <section class="content">
        <a class="btn btn-primary" href="<?php echo site_url('admin/file_upload/filetoupload') ?>">New File</a>
<div class="box box-primary">
<div class="box-body" >
                    
<!--<?php   echo $msg; ?>-->
						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="event">
                                    
                                    
                                    
                                    
          <?php 
          
         // print("<pre>");
          //print_r($filedata);
          
          foreach ($filedata as $key =>$value){
		  ?>
		<tr>

			<td>
			
			<a target="_blank" href="<?php echo base_url('file_upload/'. $value);?>"><?php echo base_url('file_upload/'.$value);?></a>
			
			</td>
			
			
			
            <td align="center"><a onclick="return confirm('Are You Sure')" href="<?php echo site_url("admin/file_upload/delete_file/".$value); ?>" >Delete</a></td>
		</tr>
		<?php }?>
                                    </tbody>
                                </table>
                            </div>
                       
                </div>
            </div>
</div>
</section>
</div>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
   
    