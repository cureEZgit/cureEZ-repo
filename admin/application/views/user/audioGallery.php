        <link href="<?php echo base_url(); ?>assets/gallery/css/gallery.css" rel="stylesheet" type="text/css">

 <!---------gallery------------>
<div id="resp">
    <div class="container">
        <section id="pagecontainer" class="" >
            <div   class="col-md-12 ">
                <h3 class="inner-heading"><?php echo "Anjali Audio"; ?></h3>
                <br>
            <div class="gallery-main">
               
                <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                
                <?php foreach($data as $ab){ ?>
                <div class="col-md-4">
                <li class="photo-gallery" >
                     <?php if((!empty($ab->file)) || !empty($ab->source)){ 
                  if($ab->file !=""){
                      $ado = base_url('upload/gallery/music/'.$ab->file);
                  }else if($ab->source != ""){
                    $ado = $ab->source;
                  }
}
                  ?>
                    
                    <a href="" target="_blank">
                  <audio style="border" src="<?php echo $ado; ?>" controls="">
                Your browser does not support the <code>audio</code> element.
                  </audio>
                      
                    </a>
    <h4 class="img-title"><?php  if(strlen($ab->caption) >14 ){echo substr($ab->caption,0,15).'...'; }else{echo $ab->caption; } ?></h4>
                </li>
                </div>
                <?php } ?>
            </ul>
        </div>
                
                
               <div class="pull-right" ><!--  <img class="ldr" style="position: relative;bottom: 40px;display: none;" src="<?php echo base_url('assets/user/images/loader.gif'); ?>">--></div>
                
            </div>
            </div>
        </section>
        </div>
</div>

