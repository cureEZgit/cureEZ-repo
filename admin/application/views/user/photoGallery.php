
        <link href="<?php echo base_url(); ?>assets/gallery/css/gallery.css" rel="stylesheet" type="text/css">


<div class="container">
            
     <section id="pagecontainer" class="" >
            <div   class="col-md-12 ">
                <h3 class="inner-heading"><?php echo "Photo gallery"; ?></h3>
                <br>
    <div class="gallery-main">
                
                <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <?php foreach($images as $img){  ?>
                <li class="photo-gallery"  data-src="<?php echo base_url('images/gallery/original/'.$img->imgname);?>" data-sub-html="<?php echo $img->caption; ?>" >
                    <a href="#">
                        <img class="img-responsive" src="<?php echo base_url('images/gallery/thumb/'.$img->imgname);?>" alt="Thumb-1">
                    </a>
                    <h4 class="img-title"><?php echo $img->caption; ?></h4>
                </li>
                <?php } ?>
                
            </ul>
        </div>
            </div>
        </div>
    </section>
</div>


<script src="<?php echo base_url(); ?>assets/gallery/galleryJS/lightgallery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gallery/galleryJS/lg-autoplay.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gallery/galleryJS/lg-fullscreen.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gallery/galleryJS/lg-zoom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/gallery/galleryJS/lg-thumbnail.min.js"></script>
        <script>
        lightGallery(document.getElementById('lightgallery'));
        </script>