
  <div class="content-wrapper">
               
              <section class="content-header">
          <h1>Event Listing</h1>
         
        </section>
        <section class="content">
        <a class="btn btn-primary" href="<?= site_url('admin/events/create_service') ?>">Add Event</a>
<div class="box box-primary">
<div class="box-body" >
                    

						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
<!--                                            <tDate</th>-->
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Category</th>                                       
                                           <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="event">
          <?php foreach ($events as $gall):
		  ?>
		<tr class="odd gradeX" id="events_<?php echo $gall->id; ?>">

<!--			<td><?php echo $gall->date ; ?></td>-->
			<td><?php echo $gall->title ; ?></td>
			<td ><img style="width: 100px;" src="<?php echo base_url()?>upload/events/min_events/<?php echo $gall->cover_pic; ?>"></td>
		<td><?php echo $gall->prdct_type; ?></td>
			
			
			

			<td>
<?php 
         if($gall->status == 0){ $anc = 'Active'; }else{ $anc = 'Deactive'; }
    
                          ///  echo anchor('admin/slider/actdeact/'.$gall->id, $anc,array('class' => 'act-deact','title'=>$gall->status));    ?>
                    <a href="<?php echo site_url('admin/events/actdeactive/'.$gall->id); ?>"  class="act-deactive" title="<?php echo $gall->status; ?>" ><?php echo $anc; ?></a>
                    
</td>
            <td align="left"><?php echo anchor("admin/events/edit_service/".$gall->id, 'Edit') ;?> | <a onclick="return confirm('Are You Sure')" href="<?php echo site_url("admin/events/delete_service/".$gall->id) ?>" >Delete</a></td>
		</tr>
		<?php endforeach;?>
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
   
     <script>

         $(document).ready(function () {

             

         });

    </script>
    
    
    
            
<script src="<?php echo base_url()?>assets/plugins/jQueryUI/jquery-ui.js"></script>
<script>
$(document).ready(
function() {
$("#event").sortable({
update : function () {
serial = $('#event').sortable('serialize');
    
    
 
$.ajax({
url: "<?php echo site_url('admin/events/event_order'); ?>",
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


 $('.act-deactive').click(function(ev){
            ev.preventDefault();
            
             var  dis = this;
             
             $.post($(this).attr('href'),{'sts':$(this).attr('title')},function(resp){
                 
                 if(resp == 0){
                    $(dis).html("Active");
                    $(dis).attr("title",resp);
                 }else if(resp == 1){
                    $(dis).html("Deactive");
                    $(dis).attr("title",resp);
                 }
                 
             });  
         });
         

</script>      

        
