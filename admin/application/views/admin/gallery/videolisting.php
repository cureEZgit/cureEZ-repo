
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
                      <h3 class="box-title">Video listing</h3>
                      <div class="box-tools pull-right">
                       
                        <a  href="<?php echo site_url('admin/gallery/new_video_gallery/'); ?>" class="btn btn-success" ><i class="fa fa-plus"></i></a>

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
                              <iframe src="<?php echo $dt->video_url; ?>" alt="User Image" allowfullscreen></iframe>
                          <a class="users-list-name" href="#"><?php  if(!empty($dt->v_caption)){ echo $dt->v_caption; }else{ echo "N/A";  } ?></a>
                          <span class="users-list-date">


                              <a class="btn btn-warning btn-flat"  href="<?php echo site_url('admin/gallery/editVideo/'.$dt->id); ?>" ><i class="fa fa-edit"></i></a>

                              <a onclick="deleteVideo('<?php echo $dt->id;  ?>');" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>




                                  </span>
                        </li>



                          <?php }}?>


                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">

                    </div><!-- /.box-footer -->
                  </div><!--/.box -->





          </div><!-- /.box -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



<script>
       function deleteVideo(videoid){

if(confirm("Are You Sure?")){

    $.post('<?php echo site_url('admin/gallery/delete_video_gallery')?>',{videoId:videoid},function(resp){
        if(resp == 1){
          location.reload();
         
        }
    });


    }
    }


</script>
