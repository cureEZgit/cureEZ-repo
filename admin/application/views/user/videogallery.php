        <link href="<?php echo base_url(); ?>assets/gallery/css/gallery.css" rel="stylesheet" type="text/css">

 <!---------gallery------------>
<div id="resp">
    <div class="container">
        <section id="pagecontainer" class="" >
            <div   class="col-md-12 ">
                <h3 class="inner-heading"><?php echo "Video Gallery"; ?></h3>
                <br>
            <div class="gallery-main">
               
                <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                
                <?php foreach($video as $ab){ ?>
                <div class="col-md-4">
                <li class="photo-gallery" >
                    <a href="">
                        <iframe  src="<?php echo  $ab->video_url;  ?>" frameborder="0" allowfullscreen></iframe>
                      
                    </a>
<!--                    <h4 class="img-title"><?php  if(strlen($ab->name) >14 ){echo substr($ab->name,0,15).'...'; }else{echo $ab->name; } ?></h4>-->
                </li>
                </div>
                <?php } ?>
            </ul>
        </div>
                
                
               <div class="pull-right" ><?php echo $pagination;  ?><!--  <img class="ldr" style="position: relative;bottom: 40px;display: none;" src="<?php echo base_url('assets/user/images/loader.gif'); ?>">--></div>
                
            </div>
            </div>
        </section>
        </div>
</div>

