

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

                <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/gallery/create_book')?>" ><i class="fa fa-plus"></i></a>
                <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/gallery/book_gallery')?>" ><i class="fa fa-mail-reply"></i></a>
            </div>
<span style="color:red"><?php echo validation_errors(); ?></span>

             
              
             <form id="UploadForm"  role="form" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                    <div class="form-group">
                      <label>Caption</label>
                      <input type="text"  <?php if(!empty($audio)){ echo 'value='.$audio->caption; }  ?>  name="caption" class="form-control" placeholder="Caption" required>
                    </div>
                  
                    <div class="form-group">
                      <label>Cover Pic</label>
                      <input type="file" name="cover_pic" class="form-control" placeholder="Caption" required accept="image/*">
                    </div>
                   
                  <?php if(!empty($audio->cover_pic)){ ?>
                  <div class="form-group">
                      <img width="90px" src="<?php echo base_url('upload/gallery/book/cover_pic/'.$audio->cover_pic); ?>" >
                  </div>
                  <?php } ?>
                  
                  <div class="form-group">
                      <label>Type</label>
                  <select name="type" onchange="changeType(this.value)" class="form-control" required>
                      <option value="">Select a Type</option>
                      <option  value="link">Pdf link</option>
                      <option value="file">Upload File</option>
                  </select>
                    </div>
                  
                  <span id="input"></span> 
                  <?php if((!empty($audio->file)) || !empty($audio->source)){ 
                   if($audio->file !=""){
                      $ado = base_url('upload/gallery/book/'.$audio->file);
                  }else if($audio->source != ""){
                    $ado = $audio->source;
                  }
                  
                  ?>
                  <div class="form-group" style="border: 1px solid;">
                <iframe src="<?php echo $ado; ?>" controls="">
               
                  </iframe>
                  </div>
                  <?php } ?>
                  </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-flat pull-left"><i class="fa fa-cloud-upload"></i></button>
            
              </div>
            </form>
          </div><!-- /.box -->
          </div><!-- /.box -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<script>

    function changeType(dis){
     
        var link_field = '<div class="form-group"><label>PDF Link</label><input type="text" name="source" class="form-control"  required></div>';
        var file_field = '<div class="form-group"><label>Upload PDF File</label><input type="file" name="pdf" class="form-control" accept="image/x-eps,application/pdf"  required></div>';
        
        if(dis == 'file'){
            $('#input').html(file_field);
        }else if(dis == 'link'){
            $('#input').html(link_field); 
        }else{
           $('#input').html('');  
        }
        
    }
    
  
</script>
