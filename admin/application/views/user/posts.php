
        <section class="blog">
            <div class="container">
                <div class="blog-description">
                    <h3><?php echo $title; ?></h3>
                    
                <?php if(empty($post)){ echo '<center><h3>No Data Available<h3></center>'; }else{ foreach($post as $pt){  ?>
                 
                    <div class="col-md-3">
                    <div class="projectBox">
                        <?php if(!empty($pt->cover_pic) && $pt->cover_pic!=0){ ?>
                        <div class="projectImg">
                            <img src="<?php echo base_url('upload/events/min_events/'.$pt->cover_pic); ?>" class="img-responsive">
                        </div>
                        <?php } ?>
                        <h3><?php echo  $pt->title; ?></h3>
                        <?php  if(!empty($pt->sht_desc)) ?><h4 style="font-size:14px;font-weight:bold;"><?php echo  $pt->sht_desc; ?></h4>
                        
                       
                        <p><?php if(strlen($pt->description) <= 600 ){ echo $pt->description; }else{ echo  strip_tags(substr($pt->description,0,600)).' ... '; 
                            
                            echo ''; }  ?></p>
                       <a class="caption-btn" href="<?php echo site_url('page/post/'.$pt->alias); ?>" > Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                    <?php } }  ?>  
                    
                    <div class="pull-right"><?php echo $pagination; ?></div>
                </div>
            </div>
        </section>