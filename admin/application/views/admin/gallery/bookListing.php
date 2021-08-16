
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
                      <h3 class="box-title">book listing</h3>
                      <div class="box-tools pull-right">
                       
                        <a  href="<?php echo site_url('admin/gallery/create_book/'); ?>" class="btn btn-success" ><i class="fa fa-plus"></i></a>

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
                              <?php if((!empty($dt->file)) || !empty($dt->source)){ 
                  if($dt->file !=""){
                      $ado = base_url('upload/gallery/book/'.$dt->file);
                  }else if($dt->source != ""){
                    $ado = $dt->source;
                  }
                  
                  ?>
                  <div class="form-group" style="border: 1px solid;">
                      <a href="<?php echo $ado; ?>" target="_blank"> <img src="<?php echo base_url('upload/gallery/book/cover_pic/'.$dt->cover_pic); ?>" ></a>
<!--                <iframe  src="<?php echo $ado; ?>" controls=""></iframe>-->
                  </div>
                  <?php } ?>
                          <a class="users-list-name"href="<?php echo $ado; ?>" target="_blank"><?php  if(!empty($dt->caption)){ echo $dt->caption; }else{ echo "N/A";  } ?></a>
                          <span class="users-list-date">


                              <a class="btn btn-warning btn-flat"  href="<?php echo site_url('admin/gallery/edit_book/'.$dt->id); ?>" ><i class="fa fa-edit"></i></a>

                              <a onclick="deleteAudio('<?php echo $dt->id;  ?>');" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>




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
       function deleteAudio(id,link){

if(confirm("Are You Sure?")){

    $.post('<?php echo site_url('admin/gallery/delete_book_gallery')?>',{id:id},function(resp){
        if(resp == 1){
          location.reload();
         
        }
    });


    }
    }


</script>
