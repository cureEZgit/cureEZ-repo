<div class="page-wrapper" style="min-height: 511px;">
                <div class="content container-fluid">
	
					
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header bg-grey">
									<h4 class="card-title">Banner Listing</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
									  <table class="table mb-0" id="dataTables-example">
                                    <thead>
                                        <tr>
<!--                                            <th>Type</th>-->
                                            <th>Title</th>
                                            
                                            <th>Image</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sort_slider">
          <?php foreach ($banner as $gall):
		  ?>
		<tr class="odd gradeX" id="slider_<?php echo $gall->id; ?>">

<!--			<td><?php echo $gall->type; ?></td>-->
			<td><?php echo $gall->title; ?></td>
			
			<td><img src="<?php echo base_url();?>/upload/gallery/slider/min_slider/<?php echo $gall->image;?>"   width="150px"  /></td>
				<td>
<?php 
         if($gall->status == 0){ $anc = 'Active'; }else{ $anc = 'Deactive'; }
    
                          ///  echo anchor('admin/slider/actdeact/'.$gall->id, $anc,array('class' => 'act-deact','title'=>$gall->status));    ?>
                    <a href="<?php echo site_url('admin/slider/actdeact/'.$gall->id); ?>"  class="act-deact" title="<?php echo $gall->status; ?>" ><?php echo $anc; ?></a>
                    
</td>
            
            <td class="text-right actions">
														
															<a class="btn btn-sm bg-success-light" onClick="edit_banner(<?php echo $gall->id;?>);" href="#">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  href="<?php echo site_url("admin/slider/delete_slider/".$gall->id); ?>" class="btn btn-sm bg-danger-light dlt">
																<i class="fe fe-trash"></i> Delete
															</a>
													
													</td>
		</tr>
		<?php endforeach;?>
                                    </tbody>
                                </table>
									</div>
								</div>
							</div>
						</div>
			<div class="col-xl-6 d-flex">
							<div class="card flex-fill">
								<div class="card-header bg-grey">
									<h4 class="card-title" id="card-title">Add Banner</h4>
								</div>
								<div class="card-body">
									<form id="" method="post" action="<?php echo site_url('admin/slider/create_banner');?>" enctype="multipart/form-data">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Title</label>
											<div class="col-lg-9">
												<input type="text" name="slider[title]" id="title" class="form-control" placeholder="Enter title" autocomplete="off" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Caption</label>
											<div class="col-lg-9">
												<input type="text" name="slider[caption]" id="caption" class="form-control" placeholder="Enter caption" autocomplete="off" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Link</label>
											<div class="col-lg-9">
												<input type="text" name="slider[link]" id="link" class="form-control" placeholder="Enter link" autocomplete="off" required>
											</div>
										</div>
									<div class="form-group row">
											<label class="col-lg-3 col-form-label">Image</label>
											<div class="col-lg-9">
												<input type="file" name="file" class="form-control"  autocomplete="off">
												<br>
												<img src="" id="b_img" width="200px">
											</div>
										</div>
										<div class="text-right">
										    <input type="hidden" name="id" id="bid">
										 <input type="hidden" name="slider[parent_id]" value="1">

											<button type="submit" id="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				
				
				
				</div>			
			</div>



        

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
}
);


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
        
        function edit_banner(id)
        {
                $.post("<?php echo site_url('admin/slider/get_banner');?>",{id:id},function(resp){
                 
               var parsedJson = $.parseJSON(resp);
               $('#title').val(parsedJson.title);
                 $('#caption').val(parsedJson.caption);
                   $('#link').val(parsedJson.link);
               var img = "<?php echo base_url();?>/upload/gallery/slider/min_slider/"+parsedJson.image;
                   $('#b_img').prop('src', img);
                   $('#bid').val(parsedJson.id);
                   $('#card-title').html('Edit Banner');
                   $('#submit').html('Update');
                 
             });
        }
    </script>
    


            
