
<style>

    .users-list>li img {
    border-radius: 0%;
    overflow: hidden;
    height: 150px;
    border-radius:0%;
}
</style>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><?php echo $heading; ?></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            <div class="col-md-12">
             <div class="box-header with-border">
                 <h3 class="box-title">Gallery listing of <spn class="text-blue"><?php echo  $subHeading; ?></spn></h3>
                      <div class="box-tools pull-right">
                        <a class="btn bg-purple btn-flat pull-right" style="    margin-left: 5px;" href="<?php echo site_url('admin/gallery/my_album');?>"><i class="fa fa-mail-reply"></i></a>
                        <a  href="<?php echo site_url('admin/gallery/createGallery/'.$album->id ); ?>" class="btn btn-success" ><i class="fa fa-plus"></i></a>

                      </div>
                    </div>
                  <!-- USERS LIST -->
                  <div class="box box-danger">

                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">

                  <?php  $mmm = 1; if(!empty($data)){ foreach($data as $dt){

                  $inId = $mmm++;

                  ?>

                          <li>
                          <img src="<?php echo base_url('images/gallery/thumb/'.$dt->imgname); ?>" style="height:auto;" alt="User Image">
                          <a class="users-list-name" href="#"><?php  if(!empty($dt->caption)){ echo $dt->caption; }else{ echo "N/A";  } ?></a>
                          <span class="users-list-date">


                              <a  class="btn btn-warning btn-flat" data-toggle="modal" data-target="#add_adv<?php echo $dt->id; ?>" ><i class="fa fa-edit"></i></a>

                              <a onclick="deleteImage('<?php echo $dt->id;  ?>','<?php echo 'images/gallery/thumb/'.$dt->imgname; ?>','<?php echo $inId; ?>',this);" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>




                                  </span>
                        </li>



                          <?php }}?>


                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">

                    </div><!-- /.box-footer -->
                  </div><!--/.box -->




          <?php /*
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

                <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/category/editEvent/'.$id)?>" ><i class="fa fa-mail-reply"></i></a>

                <p class="text-red"><b>NB</b> please upload 800x600(wxh) size Image</p>
            </div>
<?php echo validation_errors(); ?>
             <form id="UploadFormt" role="form" action="<?php echo site_url('admin/gallery/galleryUp/'.$id); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">


                  <?php  $mmm = 1; if(!empty($data)){ foreach($data as $dt){

                  $inId = $mmm++;

                  ?>

                   <label id="l<?php echo $inId; ?>">Image #<?php echo $inId; ?></label>
                  <div id="r<?php echo $inId; ?>" class="input-group">
                    <input type="file" name="userfile[]" onchange="displayImage(this,'<?php echo $inId; ?>');" class="form-control"  >
                       <label id="l<?php echo $inId; ?>">Caption #<?php echo $inId; ?></label>
                       <input type="text" value="<?php echo $dt->caption; ?>" name="caption[]" placeholder="Image Caption"  class="form-control" >

                      <input type="hidden" name="galleryId[]" value="<?php echo $dt->id;  ?>" >
                    <div class="input-group-btn">
                      <a onclick="deleteImage('<?php echo $dt->id;  ?>','<?php echo 'images/gallery/'.$event->event_year.'/'.$event->id.'/thumb/'.$dt->imgname; ?>','<?php echo $inId; ?>');" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                    </div>
                  </div>
               <div><img src="<?php echo base_url('images/gallery/'.$event->event_year.'/'.$event->id.'/thumb/'.$dt->imgname)?>" id="tmp<?php echo $inId; ?>" ></div>
                 <hr style="border-top: 1px solid #b11c1c;">
                  <?php } } else{  ?>




                  <label>Image #1</label>
                  <div class="input-group">
                    <input type="file" name="userfile[]" onchange="displayImage(this,1);" class="form-control" required>
                    <input type="text" name="caption[]" placeholder="Image Caption"  class="form-control" >
                    <div class="input-group-btn">
                      <a onclick="get_start()" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>

                  <?php } ?>


                 <!--  this is for a increment value or id   -->
                   <input type="hidden" id="imId" value="<?php if(!empty($inId)){ echo $inId; }else{ echo $mmm; } ?>" >
                  <!--#########################################-->




                  <div><img src="" id="tmp1" ></div>

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
            */ ?>


          </div><!-- /.box -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



<!-- Add Div Popup START -->
<?php   if(!empty($data)){ foreach($data as $galr){


                  ?>
                <div id="add_adv<?php echo $galr->id; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                          <font style="font-weight:normal"></font> Edit Caption
                        </h4>
                      </div>
                      <div class="modal-body">
                        <form name="adv_form" action="<?php echo site_url('admin/gallery/update_caption/'.$galr->id); ?>" method="post" >
                            <center><img src="<?php echo base_url('images/gallery/thumb/'.$galr->imgname); ?>"></center>
                          <table class="table table-striped table-bordered" id="users_table">
                            <tbody>
                              <tr>
                                <td>Caption</td>
                                <td>
                                  <input type="text" name="caption" class="form-control"  value="<?php echo $galr->caption; ?>" required/>

                                </td>
                                  <input type="hidden" name="evid" value="<?php echo $album->id; ?>">
                              </tr>

                              <tr>
                                <td></td>
                                <td>
                                    <?php if($option != null){ ?>
                                    <a  href="<?php echo site_url('admin/gallery/newgallery/'.$galr->id.'/'.$album->id.'?type=prev'); ?>" class="btn btn-warning btn-sm">Add Prev</a>
                                    <?php }?>
                                    <input type="submit"  value="Update" class="btn btn-info btn-sm">
                                    <?php if($option != null){ ?>
                                    <a  href="<?php echo site_url('admin/gallery/newgallery/'.$galr->id.'/'.$album->id.'?type=next'); ?>" class="btn btn-warning btn-sm">Add Next</a>
                                    <?php } ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </form>
                      </div>
                      </div>
                    </div>

                  </div>
<?php } }?>

<script>
       function deleteImage(imageid,path,id,dis){

          
if(confirm("Are You Sure?")){

    $.post('<?php echo site_url('admin/gallery/delete_gallery')?>',{imageId:imageid,path:path,},function(resp){
        if(resp == 1){
            $(dis).parent().parent().remove();
        }
    });


}
    }


</script>
