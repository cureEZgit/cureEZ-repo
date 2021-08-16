
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $heading; ?>
            <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/banner/bannerSortings')?>">Sorting</a>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
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
              <h3 class="box-title" style="float:left;"><?php echo $subHeading; ?></h3>

                <a class="btn btn-success btn-flat pull-right" data-toggle="modal" data-target="#add_adv">
                  <i class="fa fa-plus"></i>
                </a>

                <!-- Add Div Popup START -->
                <div id="add_adv" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                          <font style="font-weight:normal"></font> Add Banner
                        </h4>
                      </div>
                      <div class="modal-body">
                        <form name="adv_form" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="">
                          <table class="table table-striped table-bordered" id="users_table">
                            <tbody>
                              <tr>
                                <td>Banner Title</td>
                                <td>
                                  <input type="text" name="name" class="form-control" id="name" placeholder="Banner Title" required/>
                                  <?php echo form_error('name'); ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Banner Image</td>
                                <td>
                                  <input type="file" name="image" class="form-control" required />
                                  <?php echo form_error('image'); ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Status</td>
                                <td>
                                  <input type="radio" value="1" name="status" checked>&nbsp; Active &nbsp;
                                  <input type="radio" value="0" name="status"> &nbsp; Inactive
                                </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>
                                  <input type="submit" name="add" value="ADD" class="btn btn-info btn-lg">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </form>
                      </div>
                      </div>
                    </div>

                  </div>
                  <!-- Add Div Popup END -->

            </div>

          <table class="table table-bordered table-hover table-striped ">
            <tr>
              <th>Banner Image</th>
              <th>Banner Title</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          	<?php foreach ($catlist as $cat){?>
          		<tr>
                <td>
                  <?php if($cat->image_name != '')
                  {?>
                    <img src="<?php echo base_url().'images/banners/thumb/'.$cat->image_name;?>" width="100">
                  <?php }?>
                </td>
                <td><?php echo $cat->name; ?></td>
                <td><?php if($cat->status==1)echo '<font color="green">Active</font>'; else echo '<font color="red">Inactive</font>'; ?></td>
                <td>
                  <a title="Edit" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#edit_adv<?php echo $cat->id;?>">
                    <i class="fa fa-pencil-square-o"></i>
                  </a>
                  <a onclick="return confirm('Are You Sure Delete this banner?')" href="<?php echo site_url('admin/banner/DeleteBanner/'.$cat->id); ?>" title="Delete" class="btn btn-danger btn-flat btn-sm">
                    <i class="fa fa-trash"></i>
                  </a>
                  <!-- Add Div Popup START -->
                  <div id="edit_adv<?php echo $cat->id;?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">
                            <font style="font-weight:normal"></font> Edit Banner
                          </h4>
                        </div>
                        <div class="modal-body">
                          <form name="adv_form" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $cat->id; ?>">
                            <table class="table table-striped table-bordered" id="users_table">
                              <tbody>
                                <tr>
                                  <td>Banner Title</td>
                                  <td>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Banner Title" required value="<?php echo $cat->name; ?>"/>
                                    <?php echo form_error('name'); ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Banner Image</td>
                                  <td>
                                    <?php if($cat->image_name != '')
                                    {?>
                                      <img src="<?php echo base_url().'images/banners/thumb/'.$cat->image_name;?>" width="100">
                                    <?php }?>
                                    <input type="file" name="image" class="form-control"/>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Status</td>
                                  <td>
                                    <input type="radio" value="1" name="status" checked>&nbsp; Active &nbsp;
                                    <input type="radio" value="0" name="status"> &nbsp; Inactive
                                  </td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>
                                    <input type="submit" name="add" value="SAVE" class="btn btn-info btn-lg">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </form>
                        </div>
                        </div>
                      </div>

                    </div>
                    <!-- Add Div Popup END -->
                </td>
          			<?php } ?>
          </table>

          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
