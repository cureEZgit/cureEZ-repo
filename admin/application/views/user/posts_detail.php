<div class="container">
            <section id="pagecontainer" class="" >
            <div   class="col-md-12 ">
                
                <h3 class="inner-heading"><?php echo $post->title; ?></h3>
                 <br>
                <?php if(!empty($post->cover_pic) && $post->cover_pic!=0){ ?>
                        <div class="col-md-3 blog-left">
                            
                        <img src="<?php echo base_url('upload/events/'.$post->cover_pic); ?>" class="img-responsive">
                           
                        </div>
                <?php } ?>
                <p class="blg-date"> <?php echo date('F m, Y',strtotime($post->date)); ?></p>
                
                <?php if(!empty($post->sht_desc))   ?><h4 style="font-size:14px;font-weight:bold;"><?php echo $post->sht_desc; ?></h4>
              <?php echo $post->description; ?><br>
                
           
                <br>
                <br>
            </div>
            </section>
            </div>
        