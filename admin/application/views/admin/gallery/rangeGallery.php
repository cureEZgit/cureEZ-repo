
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

                 <label><?php echo '<span class="text-blue">'.$_GET['type']."</span> of this image"; ?> </label>
                  <div class="input-group">

                      <img src="<?php echo base_url('images/gallery/'.$event->id.'/thumb/'.$imageData['imgname']); ?>" alt="User Image">
                  </div>



              <div class="box-body">

<?php if($_GET['type'] == 'next'){ ?>
                    <input type="hidden" name="date"  value="<?php echo date('Y-m-d G:i:s',strtotime($imageData['event_date'].'+1 sec')); ?>"  class="form-control" id="datetimepicker" >

             <?php }else if($_GET['type'] == 'prev'){ ?>
         <input type="hidden" name="date"  value="<?php echo date('Y-m-d G:i:s',strtotime($imageData['event_date'].'-1 sec')); ?>"  class="form-control" id="datetimepicker" >


                  <?php } ?>
                  <label>Image #1</label>
                  <div class="input-group">
                    <input type="file" name="userfile[]" onchange="displayImage(this,1);" class="form-control" required>
                      <label>Caption #1</label>
                    <input type="text" name="caption[]" placeholder="Image Caption"  class="form-control" >
                    <div class="input-group-btn">
                      <a onclick="get_start()" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>






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
var   $imageElement=$('<label id="l'+id+'" >Image #'+s+'</label><div id="r'+id+'" class="input-group"><input type="file" name="userfile[]" onchange="displayImage(this,'+s+');" class="form-control" required><label id="l'+s+'">Caption #'+s+'</label><input type="text" name="caption[]"  class="form-control" required><div class="input-group-btn"><a id="'+id+'" onclick="rem(this.id)" class="btn btn-danger btn-flat"><i class="fa fa-minus"></i></a></div></span></div><div id="t'+s+'"><img src="" class="tmp'+id+'" id="tmp'+s+'" ><hr style="border-top: 1px solid #b11c1c;"></div>');

$("#newField").append($imageElement);
$imageElement.fadeIn(1000);

}


function rem(id)
{
$('#r'+id).remove();
$('#l'+id).remove();
$('.tmp'+id).remove();

}

    function deleteImage(imageid,path,id){

if(confirm("Are You Sure?")){

    $.post('<?php echo site_url('admin/gallery/delete_gallery')?>',{imageId:imageid,path:path,},function(resp){
        if(resp == 1){
          $('#r'+id).remove();
          $('#l'+id).remove();
          $('#tmp'+id).remove();
        }
    });


}
    }



    function displayImage(input,id){

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#tmp'+id)
                    .attr('src', e.target.result)
                    .width(80);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }






</script>
