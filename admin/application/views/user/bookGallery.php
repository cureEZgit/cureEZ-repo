        <link href="<?php echo base_url(); ?>assets/gallery/css/gallery.css" rel="stylesheet" type="text/css">

 <!---------gallery------------>
<div id="resp">
    <div class="container">
        <section id="pagecontainer" class="" >
            <div   class="col-md-12 ">
                <h3 class="inner-heading"><?php echo "Our Reports"; ?></h3>
                <br>
            <div class="book-glry">
               
                <div class="book-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                
                <?php foreach($data as $ab){ ?>
                <div class="col-md-3">
                <li class="photo-gallery downloads" >
                     <?php if((!empty($ab->file)) || !empty($ab->source)){ 
                  if($ab->file !=""){
                      $ado = base_url('upload/gallery/book/'.$ab->file);
                  }else if($ab->source != ""){
                    $ado = $ab->source;
                  }
}
                  ?>
                    
                    <a href="<?php echo $ado; ?>" target="_blank">
                    <img class="img-responsive" src="<?php echo base_url('upload/gallery/book/cover_pic/'.$ab->cover_pic); ?>" >
                      
                    </a>
    <!--<h4 class="img-title"><?php /*  if(strlen($ab->caption) >20 ){echo substr($ab->caption,0,21).'...'; }else{echo $ab->caption; } */ ?></h4> ---->
    <h4 class="img-title"><?php  echo $ab->caption; ?></h4>
                </li>
                </div>
                <?php } ?>
            </ul>
        </div>
                <?php  $pagination; ?>
                
               <div class="pull-right" ><!--  <img class="ldr" style="position: relative;bottom: 40px;display: none;" src="<?php echo base_url('assets/user/images/loader.gif'); ?>">--></div>
                
            </div>
            </div>
        </section>
        </div>
</div>






