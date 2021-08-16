<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Online Users</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master panel</a></li>
                                            <li class="breadcrumb-item active">Online Users</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
<div class="row">
        
                                        
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                    
                                             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Slno</th>
                                            <th>Profile Pic</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sort_slider">
          <?php $i=1;foreach ($online_users as $gall):
		  ?>
		<tr class="odd gradeX" id="slider_<?php echo $gall['id']; ?>">
		    	<td><?php echo $i++; ?></td>
		    	<td>
		    	    <?php if(!empty($gall['profile_pic'])) { ?>
		    	    <img src="<?php echo base_url();?>../upload/profile_img/<?php echo $gall['profile_pic']; ?>" width="50px">
		    	    
		    	    <?php }else{ ?>
		    	    <img src="<?php echo base_url();?>assets/img/default-profile-pic.png" width="50px">
		    	    <?php } ?>
		    	    
		    	    </td>
		<td><?php echo $gall['name']; ?></td>
	    <td><?php echo $gall['email']; ?></td>
        <td><?php echo $gall['mobile']; ?></td>
        <td><a  class="btn btn-sm btn-outline-success waves-effect waves-light mr-2" href="#">booking details</a></td>
		</tr>
		<?php endforeach;?>
                                    </tbody>
                                </table>
                                    
                                  
                                   
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
     </div>
                            </div> <!-- end col -->
                        </div>

        

<script src="<?php echo base_url()?>assets/plugins/jQueryUI/jquery-ui.js"></script>
<script>
// $(document).ready(
// function() {
// $("#sort_slider").sortable({
// update : function () {
// serial = $('#sort_slider').sortable('serialize');
    
    
 
// $.ajax({
// url: "<?php echo site_url('admin/slider/save_order'); ?>",
// type: "post",
// data: serial,
// error: function(){
// alert("theres an error with AJAX");
// }
// });
    
// }
// });
// }
// );


 $('.act-deact').click(function(ev){
             ev.preventDefault();
            
             var dis = this;
             
             $.post($(this).attr('href'),{'sts':$(this).attr('title')},function(resp){
                 
                 if(resp == 0){
                    $(dis).html('<span class="badge badge-danger">Active</span>');
                    $(dis).attr("title",resp);
                 }else if(resp == 1){
                    $(dis).html('<span class="badge badge-success">Deactive</span>');
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
    </script>
    


            
