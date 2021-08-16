

    <link href="<?= base_url();?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />


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
                <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/gallery/my_album/')?>" ><i class="fa fa-reply"></i></a>
            </div>
						<div class="panel-body">
<form  id="signupForm" method="post" action="<?= current_url(); ?>" enctype="multipart/form-data">



				    <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Album Name</label>
                    <div class="col-lg-8">
							<input type="text" value="<?php if(!empty($album->name)){ echo $album->name; }?>" name="caption" class="form-control" required >
                     </div>
                	</div>

 			

                 <div class="form-group">
				    <label for="text2" class="control-label col-lg-4"><br>Cover Pic</label>
                    <div class="col-lg-8">
                    <br>
					            <input type="file" name="file" class="form-control">
                   	<br/> 
                    </div>
                	</div>
    
        <?php if(!empty($album->cover_pic)){ ?>
         <div class="form-group">
				    <label for="text2" class="control-label col-lg-4"><br>Cover Pic</label>
             <div class="col-lg-8">
                    <br>
					 <img src="<?php echo base_url('images/gallery/thumb/'.$album->cover_pic);  ?>">
                   	<br/> 
                    </div>
       
        </div>
        <?php }?>
    

	     <div class="form-group">
                    <div class="col-lg-8">
					<br />

                        <input type="submit" id="tags" value="Submit" class="btn btn-primary pull-right" />

                    </div>

                </div>

	</form>

                        </div>

                  </div><!-- /.box -->
          </div><!-- /.box -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->