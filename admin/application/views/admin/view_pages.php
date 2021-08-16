    <link href="<?= base_url();?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

   <div id="content">



            <div class="inner">

            <div class="row">

                    <div class="col-lg-12">





                        <h2>Pages</h2>

<?php echo $msg; ?>





                    </div>

                </div>

            

            

<div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            All Pages List

                        </div>

                        <p class="pull-right">

						<a href="<?= site_url('admin/admin/create_page') ?>"><input type="button" value="Add Page" class="btn btn-primary"> </a></p>

						

						<div class="panel-body">

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>

                                        <tr>

                                            <th>Page Name</th>
 											<th>Url</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

          <?php foreach ($pages as $pg):?>

		<tr class="odd gradeX">

			<td><?php echo $pg->name;?></td>
<td> <?= site_url().'/'.$pg->url ; ?></td>
        
			<td><?php echo anchor("admin/admin/edit_page/".$pg->id, 'Edit') ;?> | <?php echo anchor("admin/admin/delete_page/".$pg->id, 'Delete') ;?></td>

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

    <script src="<?= base_url();?>/assets/plugins/dataTables/jquery.dataTables.js"></script>

    <script src="<?= base_url();?>/assets/plugins/dataTables/dataTables.bootstrap.js"></script>

     <script>

         $(document).ready(function () {

             $('#dataTables-example').dataTable();

         });

    </script>