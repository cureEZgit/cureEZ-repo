    <link href="<?= base_url();?>/assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" />
   <div id="content">
            <div class="inner">
            <div class="row">
                    <div class="col-lg-12">
                        <h2>View Slides</h2>
<?php


 echo $msg; ?>
                    </div>
                </div>
<div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            All Album List
                        </div>
                        <p class="pull-right">
						<a href="<?= site_url('admin/gallery/create_album') ?>"><input type="button" value="Create A New Album" class="btn btn-primary"> </a></p>
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

                                    <tbody>

          <?php foreach ($galleries as $gall):
		  
		
		  ?>

		<tr class="odd gradeX">

			<td><?php echo $gall->name;?></td>


			<td><img src="<?= base_url();?>/upload/gallery/cover_pic/<?php echo $gall->cover_pic;?>" height="70px"  width="200px"  /></td>
			<td align="center"><?php echo anchor("admin/gallery/view_images/".$gall->id, 'View Images') ;?> | <?php echo anchor("admin/gallery/edit_album/".$gall->id, 'Edit') ;?> | <?php echo anchor("admin/gallery/delete_album/".$gall->id, 'Delete') ;?></td>
		</tr>
		<?php endforeach;?>
                                    </tbody>

                                </table>

                            </div>

                           

                        </div>

                    </div>

                </div>

            </div>



</div>

</div>

    <!-- END GLOBAL SCRIPTS -->

        <!-- PAGE LEVEL SCRIPTS -->

    <script src="<?= base_url();?>/assets/plugins/datatables/jquery.dataTables.js"></script>

    <script src="<?= base_url();?>/assets/plugins/datatables/dataTables.bootstrap.js"></script>

     <script>

         $(document).ready(function () {

             $('#dataTables-example').dataTable();

         });

    </script>