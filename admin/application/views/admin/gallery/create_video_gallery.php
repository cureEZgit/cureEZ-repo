

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

                <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/gallery/video_gallery')?>" ><i class="fa fa-mail-reply"></i></a>
            </div>
<?php echo validation_errors(); ?>

              <p class="text-red"><b>N.B.</b>Please Insert Youtube <b>Embeded</b> Video Link</p>

             <form id="UploadForm"  role="form" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">


           
                  <label>Link #1</label>
                  <div class="input-group">
                    <input type="text" name="videolink[]" placeholder="https://www.youtube.com/embed/Gram-Utthan"  class="form-control" required>
                      <lable>Video Caption #1</lable>
                      <input type="text" name="caption[]" placeholder=""  class="form-control" required>
                    <div class="input-group-btn">
                      <a onclick="get_start()" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>

                 


              




             <input type="hidden" name="multiple" value="multi">



                  <span id="newField"></span>
              </div>
              <!-- /.box-body -->
<!--       Progress Bar-->
       <div id="p_bar" class="hide">
           <div  class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" id="progressbar" style="width:0%">
                    <span id="statustxt"></span>
                </div>
           </div>
       </div>
       <!--       Progress Bar-->
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-flat pull-left"><i class="fa fa-cloud-upload"></i></button>
                <a onclick="get_start()" class="btn btn-info btn-flat pull-right"><i class="fa fa-plus"></i></a>
              </div>
            </form>
          </div><!-- /.box -->
          </div><!-- /.box -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<script>

    var s = 1;
function get_start()
{
s = s+1;
var id=Math.floor((Math.random() * 100) + 1);
var   $imageElement=$('<label id="l'+id+'" >link #'+s+'</label><div id="r'+id+'" class="input-group"><input type="text" name="videolink[]" placeholder="https://www.youtube.com/embed/samajaevent"  class="form-control" required><lable>Video Caption #'+s+'</lable><input type="text" name="caption[]" placeholder=""  class="form-control" required><div class="input-group-btn"><a id="'+id+'" onclick="rem(this.id)" class="btn btn-danger btn-flat"><i class="fa fa-minus"></i></a></div></span></div><div id="t'+s+'"><img src="" class="tmp'+id+'" id="tmp'+s+'" ></div>');

$("#newField").append($imageElement);
$imageElement.fadeIn(1000);

}


function rem(id)
{
$('#r'+id).remove();
$('#l'+id).remove();
$('.tmp'+id).remove();

}

</script>
