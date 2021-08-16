

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

                <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/gallery/video_gallery/'.$video->event_id)?>" ><i class="fa fa-mail-reply"></i></a>
            </div>
<?php echo validation_errors(); ?>

              <p class="text-red"><b>N.B.</b>Please Insert Youtube <b>Embeded</b> Video Link</p>

             <form  role="form" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                  <iframe width="300"  src="<?php echo $video->video_url; ?>" frameborder="0" allowfullscreen></iframe>
           <br>
                  <label>Link </label>
                  <div class="input-group">
                    <input type="text" name="videolink" value="<?php echo $video->video_url; ?>" placeholder="https://www.youtube.com/embed/samajaevent"  class="form-control" required>
                      <lable>Video Caption</lable>
                      <input type="text" name="caption" value="<?php echo $video->v_caption; ?>" placeholder=""  class="form-control" required>
                    
                  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-flat pull-left"><i class="fa fa-cloud-upload"></i></button>
              
              </div>
            </form>
          </div><!-- /.box -->
          </div><!-- /.box -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
