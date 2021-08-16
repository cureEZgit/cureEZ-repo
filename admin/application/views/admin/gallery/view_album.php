<!--    <link href="<?= base_url();?>/assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" />-->


<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><?php echo $heading; ?></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            <div class="col-md-9">
        <?php if($this->session->flashdata('message')){?>

					<div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Message!</h4>
                    <?php echo $this->session->flashdata('message');?>
                  </div>
          <?php } ?>
          <!-- Default box -->

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title text-blue"><?php echo $subHeading; ?></h3>

                <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/gallery/create_album/')?>" ><i class="fa fa-plus"></i></a>
            </div>
						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Album Name</th>
                                            <th>Cover Pic</th>
                                            <th>Action</th>
                                           
                                        </tr>

                                    </thead>

                                    <tbody id="sort_slider">

          <?php foreach ($galleries as $gall):
		  
		
		  ?>

		<tr class="odd gradeX" id="slider_<?php echo $gall->id; ?>">

			<td><?php echo $gall->name;?></td>


			<td><img src="<?= base_url();?>/images/gallery/thumb/<?php echo $gall->cover_pic;?>" width="80px" /></td>
                <td>
                <a class="btn btn-info btn-flat btn-xs"  href="<?php echo site_url("admin/gallery/photo_gallery/".$gall->id) ;?>"   ><i class="fa fa-image"></i></a>
                |
                <a class="btn btn-warning btn-flat btn-xs"  href="<?php echo site_url("admin/gallery/edit_album/".$gall->id) ;?>"   ><i class="fa fa-pencil"></i></a>
                | 
                <a class="btn btn-danger btn-flat btn-xs dlt"  href="<?php echo site_url("admin/gallery/delete_album/".$gall->id) ;?>"   ><i class="fa fa-trash"></i></a></td>
		</tr>
		<?php endforeach;?>
                                    </tbody>

                                </table>

                            </div>

                           

                        </div>

                  </div><!-- /.box -->
          </div><!-- /.box -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <!-- END GLOBAL SCRIPTS -->

        <!-- PAGE LEVEL SCRIPTS -->

<!--
    <script src="<?= base_url();?>/assets/plugins/datatables/jquery.dataTables.js"></script>

    <script src="<?= base_url();?>/assets/plugins/datatables/dataTables.bootstrap.js"></script>
-->

     <script>

         

      $('a.dlt').click(function(evt){
           evt.preventDefault();
          if(confirm("Are You Sure ?")){       
               var dis = this;
                $.post($(dis).attr('href'),{'delete':'dlt'},function(resp){
                    if(resp == 1){
                        $(dis).parent().parent().remove();
                    }else{
                       alert(resp);
                    }
                });
            }
        });
    </script>
 

<script>
$(document).ready(
function() {
$("#sort_slider").sortable({
update : function () {
serial = $('#sort_slider').sortable('serialize');
    
    
 
$.ajax({
url: "<?php echo site_url('admin/gallery/save_order'); ?>",
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
</script>