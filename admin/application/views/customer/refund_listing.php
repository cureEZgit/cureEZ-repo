<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18"> Payment Refund</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           
                                            <li class="breadcrumb-item active">Payment Refund</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
<div class="row">
        
                                        
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
        
                    
                                             <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Slno</th>
                                            <th>Booking ID</th>
                                            <th>Transaction ID</th>
                                           
                                            <th>Washpoint</th>
                                            <th>User</th>
                                              <th>Booking Price</th>
                                              <th>Refund Amount</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sort_slider">
          <?php if(!empty($refund)){ $i=1;foreach ($refund as $gall):
		  ?>
		<tr class="odd gradeX" id="slider_<?php echo $gall['id']; ?>">
		    	<td><?php echo $i++; ?></td>
		<td><?php echo "TJC".$gall['booking_id']; ?></td>
	    <td><?php echo $gall['transaction_id']; ?></td>
        <td><?php echo $gall['cname']; ?></td>
           <td><?php echo $gall['uname']; ?></td>
         <td>&#8377; <?php echo $gall['final_price']; ?></td>
          <td><?php echo $gall['refund_amount']; ?></td>
          
          <td>
<?php 
         if($gall['complete_status'] == 1){ $anc = 'Completed'; }else{ $anc = 'Pending'; }
    
                          ///  echo anchor('admin/slider/actdeact/'.$gall->id, $anc,array('class' => 'act-deact','title'=>$gall->status));    ?>
                    <a  <?php if($gall['complete_status'] == 0) { ?> href="<?php echo site_url('admin/online_user/refund_status/'.$gall['id']); ?>" <?php } ?>  class="btn btn-sm <?php if($gall['complete_status']==1) echo "btn-outline-success";else echo "btn-outline-danger";?> waves-effect waves-light mr-2 <?php if($gall['complete_status'] == 0) { ?> act-deact <?php } ?>" title="<?php echo $gall['complete_status']; ?>" ><?php echo $anc; ?></a>
                    
</td>

		</tr>
		<?php endforeach;}?>
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
             if(confirm("Are you sure ?")) {
             $.post($(this).attr('href'),{'sts':$(this).attr('title')},function(resp){
                 
                 if(resp == 1){
                    $(dis).html('Completed');
                    $(dis).attr("title",resp);
                     $(dis).attr("href",'');
                     $(dis).removeClass('act-deact','act-deact');
                 }else if(resp == 0){
                    $(dis).html('Pending');
                    $(dis).attr("title",'');
                      $(dis).removeClass('act-deact','act-deact');
                 }
                 
             });  
             
             }
         });
         

</script>      
        

<script>
                $('a.refund').click(function(evt){
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
    


            
